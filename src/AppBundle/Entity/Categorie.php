<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieRepository")
 */
class Categorie
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    
    /**
     * @ORM\OneToMany(targetEntity="Categorie_Produit", mappedBy="categorie",cascade={"persist"}))
     */
    private $categorieP;
    
    /**
     * @ORM\ManyToMany(targetEntity="Caracteristique", mappedBy="categorie",cascade={"persist"}))
     */
    private $caracteristique;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorieP = new \Doctrine\Common\Collections\ArrayCollection();
        $this->caracteristique = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    public function __toString() {
        return $this->titre;
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Categorie
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Categorie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Add categorieP
     *
     * @param \AppBundle\Entity\Categorie_Produit $categorieP
     *
     * @return Categorie
     */
    public function addCategorieP(\AppBundle\Entity\Categorie_Produit $categorieP)
    {
        $this->categorieP[] = $categorieP;

        return $this;
    }

    /**
     * Remove categorieP
     *
     * @param \AppBundle\Entity\Categorie_Produit $categorieP
     */
    public function removeCategorieP(\AppBundle\Entity\Categorie_Produit $categorieP)
    {
        $this->categorieP->removeElement($categorieP);
    }

    /**
     * Get categorieP
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorieP()
    {
        return $this->categorieP;
    }

    /**
     * Add caracteristique
     *
     * @param \AppBundle\Entity\Caracteristique $caracteristique
     *
     * @return Categorie
     */
    public function addCaracteristique(\AppBundle\Entity\Caracteristique $caracteristique)
    {
        $this->caracteristique[] = $caracteristique;

        return $this;
    }

    /**
     * Remove caracteristique
     *
     * @param \AppBundle\Entity\Caracteristique $caracteristique
     */
    public function removeCaracteristique(\AppBundle\Entity\Caracteristique $caracteristique)
    {
        $this->caracteristique->removeElement($caracteristique);
    }

    /**
     * Get caracteristique
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCaracteristique()
    {
        return $this->caracteristique;
    }
}
