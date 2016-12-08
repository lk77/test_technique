<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 */
class Produit
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
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;
    
    /**
     * @ORM\OneToMany(targetEntity="Commande_Produit", mappedBy="produit")
     */
    private $commande_produit;

    /**
     * @ORM\OneToMany(targetEntity="Categorie_Produit", mappedBy="produit")
     */
    private $categorie_produit;
    
    /**
     * @ORM\OneToMany(targetEntity="Caracteristique_Produit", mappedBy="produit")
     */
    private $caracteristique_produit;


   
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commande_produit = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorie_produit = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     *
     * @return Produit
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
     * @return Produit
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
     * Set prix
     *
     * @param float $prix
     *
     * @return Produit
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Produit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Add commandeProduit
     *
     * @param \AppBundle\Entity\Commande_Produit $commandeProduit
     *
     * @return Produit
     */
    public function addCommandeProduit(\AppBundle\Entity\Commande_Produit $commandeProduit)
    {
        $this->commande_produit[] = $commandeProduit;

        return $this;
    }

    /**
     * Remove commandeProduit
     *
     * @param \AppBundle\Entity\Commande_Produit $commandeProduit
     */
    public function removeCommandeProduit(\AppBundle\Entity\Commande_Produit $commandeProduit)
    {
        $this->commande_produit->removeElement($commandeProduit);
    }

    /**
     * Get commandeProduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandeProduit()
    {
        return $this->commande_produit;
    }

    /**
     * Add categorieProduit
     *
     * @param \AppBundle\Entity\Categorie_Produit $categorieProduit
     *
     * @return Produit
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

    /**
     * Add caracteristiqueProduit
     *
     * @param \AppBundle\Entity\Caracteristique_Produit $caracteristiqueProduit
     *
     * @return Produit
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
