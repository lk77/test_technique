<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Caracteristique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Caracteristique controller.
 *
 * @Route("/caracteristique")
 */
class CaracteristiqueController extends Controller
{
    /**
     * Lists all caracteristique entities.
     *
     * @Route("/", name="caracteristique_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $caracteristiques = $em->getRepository('AppBundle:Caracteristique')->findAll();

        return $this->render('caracteristique/index.html.twig', array(
            'caracteristiques' => $caracteristiques,
        ));
    }

    /**
     * Finds and displays a caracteristique entity.
     *
     * @Route("/{id}", name="caracteristique_show")
     * @Method("GET")
     */
    public function showAction(Caracteristique $caracteristique)
    {

        return $this->render('caracteristique/show.html.twig', array(
            'caracteristique' => $caracteristique,
        ));
    }
}
