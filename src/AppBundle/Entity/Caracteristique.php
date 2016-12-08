<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristique
 *
 * @ORM\Table(name="caracteristique")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CaracteristiqueRepository")
 */
class Caracteristique
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     */
    private $format;
    
    /**
     * @ORM\OneToMany(targetEntity="Caracteristique_Produit", mappedBy="caracteristique")
     */
    private $caracteristique_produit;


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->caracteristique_produit = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Caracteristique
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Caracteristique
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Add caracteristiqueProduit
     *
     * @param \AppBundle\Entity\Caracteristique_Produit $caracteristiqueProduit
     *
     * @return Caracteristique
     */
    public function addCaracteristiqueProduit(\AppBundle\Entity\Caracteristique_Produit $caracteristiqueProduit)
    {
        $this->caracteristique_produit[] = $caracteristiqueProduit;

        return $this;
    }

    /**
     * Remove caracteristiqueProduit
     *
     * @param \AppBundle\Entity\Caracteristique_Produit $caracteristiqueProduit
     */
    public function removeCaracteristiqueProduit(\AppBundle\Entity\Caracteristique_Produit $caracteristiqueProduit)
    {
        $this->caracteristique_produit->removeElement($caracteristiqueProduit);
    }

    /**
     * Get caracteristiqueProduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCaracteristiqueProduit()
    {
        return $this->caracteristique_produit;
    }
}
