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
     * @ORM\OneToMany(targetEntity="Categorie_Produit", mappedBy="categorie")
     */
    private $categorie_produit;


    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categorie_produit = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add categorieProduit
     *
     * @param \AppBundle\Entity\Categorie_Produit $categorieProduit
     *
     * @return Categorie
     */
    public function addCategorieProduit(\AppBundle\Entity\Categorie_Produit $categorieProduit)
    {
        $this->categorie_produit[] = $categorieProduit;

        return $this;
    }

    /**
     * Remove categorieProduit
     *
     * @param \AppBundle\Entity\Categorie_Produit $categorieProduit
     */
    public function removeCategorieProduit(\AppBundle\Entity\Categorie_Produit $categorieProduit)
    {
        $this->categorie_produit->removeElement($categorieProduit);
    }

    /**
     * Get categorieProduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategorieProduit()
    {
        return $this->categorie_produit;
    }
}
