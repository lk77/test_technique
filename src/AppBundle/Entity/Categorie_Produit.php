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
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Categorie", inversedBy="categorieP"))
     */
    private $categorie;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="categorieP"))
     */
    private $produit;


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
}
