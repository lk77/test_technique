<?php

namespace AdminBundle\Controller;

use JavierEguiluz\Bundle\EasyAdminBundle\Controller\AdminController as BaseAdminController;

class ProduitController extends BaseAdminController {

    protected function listProduitAction() {

        $fields = $this->entity['list']['fields'];
        $paginator = $this->findAll($this->entity['class'], $this->request->query->get('page', 1), $this->config['list']['max_results'], $this->request->query->get('sortField'), $this->request->query->get('sortDirection'), $this->entity['list']['dql_filter']);

        foreach ($paginator as $entity) {
            $entity->setImageUrl($this->getParameter('app.path.product_images') . "/" . $entity->getImageUrl());
        }

        return $this->render($this->entity['templates']['list'], array(
                    'paginator' => $paginator,
                    'fields' => $fields,
                    'delete_form_template' => $this->createDeleteForm($this->entity['name'], '__id__')->createView(),
        ));
    }

    protected function showProduitAction() {

        $id = $this->request->query->get('id');
        $easyadmin = $this->request->attributes->get('easyadmin');
        $entity = $easyadmin['item'];

        $entity->setImageUrl($this->getParameter('app.path.product_images') . "/" . $entity->getImageUrl());

        $fields = $this->entity['show']['fields'];
        $deleteForm = $this->createDeleteForm($this->entity['name'], $id);

        return $this->render($this->entity['templates']['show'], array(
                    'entity' => $entity,
                    'fields' => $fields,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    protected function editProduitAction() {

        $id = $this->request->query->get('id');
        $easyadmin = $this->request->attributes->get('easyadmin');
        $entity = $easyadmin['item'];

        if ($this->request->isXmlHttpRequest() && $property = $this->request->query->get('property')) {
            $newValue = 'true' === strtolower($this->request->query->get('newValue'));
            $fieldsMetadata = $this->entity['list']['fields'];

            if (!isset($fieldsMetadata[$property]) || 'toggle' !== $fieldsMetadata[$property]['dataType']) {
                throw new \RuntimeException(sprintf('The type of the "%s" property is not "toggle".', $property));
            }

            $this->updateEntityProperty($entity, $property, $newValue);

            return new Response((string) $newValue);
        }

        $fields = $this->entity['edit']['fields'];
        $editForm = $this->createEditForm($entity, $fields);
        $deleteForm = $this->createDeleteForm($this->entity['name'], $id);

        $editForm->handleRequest($this->request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            foreach ($entity->getCaracteristiqueP() as $caracteristique) {
                $caracteristique->setProduit($entity);
                $this->em->persist($caracteristique);
            }

            $this->em->flush();

            $refererUrl = $this->request->query->get('referer', '');

            return !empty($refererUrl) ? $this->redirect(urldecode($refererUrl)) : $this->redirect($this->generateUrl('easyadmin', array('action' => 'list', 'entity' => $this->entity['name'])));
        }

        return $this->render($this->entity['templates']['edit'], array(
                    'form' => $editForm->createView(),
                    'entity_fields' => $fields,
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

}
