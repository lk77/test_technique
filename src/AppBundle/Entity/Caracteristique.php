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
     * @ORM\OneToMany(targetEntity="Caracteristique_Produit", mappedBy="caracteristique",cascade={"persist"}))
     */
    private $caracteristiqueP;
    
    /**
     * @ORM\ManyToMany(targetEntity="Categorie", inversedBy="caracteristique",cascade={"persist"}))
     */
    private $categorie;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->caracteristiqueP = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorie = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return $this->nom;
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
     * Add caracteristiqueP
     *
     * @param \AppBundle\Entity\Caracteristique_Produit $caracteristiqueP
     *
     * @return Caracteristique
     */
    public function addCaracteristiqueP(\AppBundle\Entity\Caracteristique_Produit $caracteristiqueP)
    {
        $this->caracteristiqueP[] = $caracteristiqueP;

        return $this;
    }

    /**
     * Remove caracteristiqueP
     *
     * @param \AppBundle\Entity\Caracteristique_Produit $caracteristiqueP
     */
    public function removeCaracteristiqueP(\AppBundle\Entity\Caracteristique_Produit $caracteristiqueP)
    {
        $this->caracteristiqueP->removeElement($caracteristiqueP);
    }

    /**
     * Get caracteristiqueP
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCaracteristiqueP()
    {
        return $this->caracteristiqueP;
    }

    /**
     * Add categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Caracteristique
     */
    public function addCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie[] = $categorie;

        return $this;
    }

    /**
     * Remove categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     */
    public function removeCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie->removeElement($categorie);
    }

    /**
     * Get categorie
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
