<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Produit controller.
 *
 * @Route("/")
 */
class ProduitController extends Controller {

    /**
     * Lists all produit entities.
     *
     * @Route("/", name="produit_index")
     * @Method("GET")
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('AppBundle:Produit')->findAll();
        $categories = $em->getRepository('AppBundle:Categorie')->findAll();
        $config = $this->container->getParameter("app.config");

        return $this->render('@AppBundle/produit/index.html.twig', array(
                    'produits' => $produits,
                    'categories' => $categories,
                    'categorie_id' => null,
                    'menu' => $config['menu']
        ));
    }
    
    /**
     * Search for produit entites
     *
     * @Route("/produit/ajax/{search}", name="produit_ajax")
     * @Method("GET")
     */
    public function ajaxAction($search) {
        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('AppBundle:Produit')->findByTitre($search);
        $categories = $em->getRepository('AppBundle:Categorie')->findAll();
        $config = $this->container->getParameter("app.config");

        return $this->render('@AppBundle/produit/index.html.twig', array(
                    'produits' => $produits,
                    'categories' => $categories,
                    'categorie_id' => null,
                    'menu' => $config['menu']
        ));
    }

    /**
     * @Route("/produit/categorie/{id}", name="produit_categorie")
     * @Method("GET")
     */
    public function categorieAction($id) {

        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('AppBundle:Produit')->findByCategorie($id);
        $categories = $em->getRepository('AppBundle:Categorie')->findAll();
        $config = $this->container->getParameter("app.config");

        return $this->render('@AppBundle/produit/index.html.twig', array(
                    'produits' => $produits,
                    'categories' => $categories,
                    'categorie_id' => $id,
                    'menu' => $config['menu']
        ));
    }

    /**
     * Finds and displays a produit entity.
     *
     * @Route("/produit/{id}", name="produit_show")
     * @Method("GET")
     */
    public function showAction(Produit $produit) {

        $config = $this->container->getParameter("app.config");
        
        return $this->render('@AppBundle/produit/show.html.twig', array(
                    'produit' => $produit,
                    'menu' => $config['menu']
        ));
    }

}
