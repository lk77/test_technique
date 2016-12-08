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
     * @var string
     *
     * @ORM\Column(name="image_url", type="text")
     */
    private $image_url;

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
     * @ORM\OneToMany(targetEntity="Commande_Produit", mappedBy="produit",cascade={"persist"}))
     */
    private $commandeP;

    /**
     * @ORM\OneToMany(targetEntity="Categorie_Produit", mappedBy="produit",cascade={"persist"}))
     */
    private $categorieP;
    
    /**
     * @ORM\OneToMany(targetEntity="Caracteristique_Produit", mappedBy="produit",cascade={"persist"}))
     */
    private $caracteristiqueP;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commandeP = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorieP = new \Doctrine\Common\Collections\ArrayCollection();
        $this->caracteristiqueP = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Produit
     */
    public function setImageUrl($imageUrl)
    {
        $this->image_url = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->image_url;
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
     * Add commandeP
     *
     * @param \AppBundle\Entity\Commande_Produit $commandeP
     *
     * @return Produit
     */
    public function addCommandeP(\AppBundle\Entity\Commande_Produit $commandeP)
    {
        $this->commandeP[] = $commandeP;

        return $this;
    }

    /**
     * Remove commandeP
     *
     * @param \AppBundle\Entity\Commande_Produit $commandeP
     */
    public function removeCommandeP(\AppBundle\Entity\Commande_Produit $commandeP)
    {
        $this->commandeP->removeElement($commandeP);
    }

    /**
     * Get commandeP
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandeP()
    {
        return $this->commandeP;
    }

    /**
     * Add categorieP
     *
     * @param \AppBundle\Entity\Categorie_Produit $categorieP
     *
     * @return Produit
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
     * Add caracteristiqueP
     *
     * @param \AppBundle\Entity\Caracteristique_Produit $caracteristiqueP
     *
     * @return Produit
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
}
