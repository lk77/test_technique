<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie_Produit
 *
 * @ORM\Table(name="categorie_produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategorieProduitRepository")
 */
class Categorie_Produit
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
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="categorieP"))
     */
    private $categorie;

    /**
     * @ORM\OneToOne(targetEntity="Produit", inversedBy="categorieP"))
     */
    private $produit;

    public function __toString() {
        return $this->getCategorie() != null ? $this->getCategorie()->getTitre() : "null";
    }

    /**
     * Set categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Categorie_Produit
     */
    public function setCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Categorie_Produit
     */
    public function setProduit(\AppBundle\Entity\Produit $produit)
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * Get produit
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getProduit()
    {
        return $this->produit;
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
}
