<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristique_Produit
 *
 * @ORM\Table(name="caracteristique_produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Caracteristique_ProduitRepository")
 */
class Caracteristique_Produit
{
    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Caracteristique", inversedBy="caracteristique_produit")
     */
    private $caracteristique;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="caracteristique_produit")
     */
    private $produit;
    
    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=255)
     */
    private $valeur;

    /**
     * Set valeur
     *
     * @param string $valeur
     *
     * @return Caracteristique_Produit
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set caracteristique
     *
     * @param \AppBundle\Entity\Caracteristique $caracteristique
     *
     * @return Caracteristique_Produit
     */
    public function setCaracteristique(\AppBundle\Entity\Caracteristique $caracteristique)
    {
        $this->caracteristique = $caracteristique;

        return $this;
    }

    /**
     * Get caracteristique
     *
     * @return \AppBundle\Entity\Caracteristique
     */
    public function getCaracteristique()
    {
        return $this->caracteristique;
    }

    /**
     * Set produit
     *
     * @param \AppBundle\Entity\Produit $produit
     *
     * @return Caracteristique_Produit
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
