<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Caracteristique_Produit
 *
 * @ORM\Table(name="caracteristique_produit")
 * @ORM\Entity()
 */
class Caracteristique_Produit
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
     * @ORM\ManyToOne(targetEntity="Caracteristique", inversedBy="caracteristiqueP")
     */
    private $caracteristique;

    /**
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="caracteristiqueP")
     */
    private $produit;
    
    /**
     * @var string
     *
     * @ORM\Column(name="valeur", type="string", length=255)
     */
    private $valeur;

    public function __toString() {
        return $this->getCaracteristique() != null ? $this->getCaracteristique()->getNom() : "null";
    }

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
