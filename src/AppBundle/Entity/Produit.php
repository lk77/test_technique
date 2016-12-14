<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProduitRepository")
 * @Vich\Uploadable
 */
class Produit {

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
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $imageUrl;

    /**
     * @Vich\UploadableField(mapping="product_images", fileNameProperty="imageUrl")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $updatedAt;

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
     * @ORM\OneToMany(targetEntity="Commande_Produit", mappedBy="produit",cascade={"persist","remove"},orphanRemoval=true))
     */
    private $commandeP;

    /**
     * @ORM\OneToMany(targetEntity="Categorie_Produit", mappedBy="produit",cascade={"persist","remove"},orphanRemoval=true))
     */
    private $categorieP;

    /**
     * @ORM\OneToMany(targetEntity="Caracteristique_Produit", mappedBy="produit",cascade={"persist","remove"},orphanRemoval=true))
     */
    private $caracteristiqueP;

    /**
     * Constructor
     */
    public function __construct() {
        $this->commandeP = new \Doctrine\Common\Collections\ArrayCollection();
        $this->categorieP = new \Doctrine\Common\Collections\ArrayCollection();
        $this->caracteristiqueP = new \Doctrine\Common\Collections\ArrayCollection();
        $this->updatedAt = new \DateTime('now');
    }

    public function __toString() {
        return $this->titre;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Produit
     */
    public function setTitre($titre) {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre() {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Produit
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    public function setImageFile(File $image = null) {
        $this->imageFile = $image;

        if ($image) {
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile() {
        return $this->imageFile;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Produit
     */
    public function setPrix($prix) {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix() {
        return $this->prix;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return Produit
     */
    public function setQuantite($quantite) {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer
     */
    public function getQuantite() {
        return $this->quantite;
    }

    /**
     * Add commandeP
     *
     * @param \AppBundle\Entity\Commande_Produit $commandeP
     *
     * @return Produit
     */
    public function addCommandeP(\AppBundle\Entity\Commande_Produit $commandeP) {
        $this->commandeP[] = $commandeP;

        return $this;
    }

    /**
     * Remove commandeP
     *
     * @param \AppBundle\Entity\Commande_Produit $commandeP
     */
    public function removeCommandeP(\AppBundle\Entity\Commande_Produit $commandeP) {
        $this->commandeP->removeElement($commandeP);
    }

    /**
     * Get commandeP
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandeP() {
        return $this->commandeP;
    }
    
    /**
     * Add CategorieP
     *
     * @param \AppBundle\Entity\Commande_Produit $CategorieP
     *
     * @return Produit
     */
    public function addCategorieP(\AppBundle\Entity\Categorie_Produit $categorieP) {
        $this->categorieP[] = $categorieP;

        return $this;
    }

    /**
     * Remove categorieP
     *
     * @param \AppBundle\Entity\Categorie_Produit $CategorieP
     */
    public function removeCategorieP(\AppBundle\Entity\Categorie_Produit $categorieP) {
        $this->categorieP->removeElement($categorieP);
    }

    /**
     * Add categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     *
     * @return Produit
     */
    public function addCategorie(\AppBundle\Entity\Categorie $categorie = null) {
        $categorieP = new Categorie_Produit();
        $categorieP->setProduit($this);
        $categorieP->setCategorie($categorie);
        $this->categorieP[] = $categorieP;

        return $this;
    }
    
    /**
     * Remove categorie
     *
     * @param \AppBundle\Entity\Categorie $categorie
     */
    public function removeCategorie(\AppBundle\Entity\Categorie $categorie)
    {
        foreach($this->categorieP as $categorieP){
            if($categorieP->getCategorie()->getId() == $categorie->getId()){
                $this->categorieP->removeElement($categorieP);
            }
        }
    }

    /**
     * Get categorieP
     *
     * @return \AppBundle\Entity\Categorie
     */
    public function getCategorieP() {
        return $this->categorieP;
    }

    /**
     * Add caracteristiqueP
     *
     * @param \AppBundle\Entity\Caracteristique_Produit $caracteristiqueP
     *
     * @return Produit
     */
    public function addCaracteristiqueP(\AppBundle\Entity\Caracteristique_Produit $caracteristiqueP) {
        $this->caracteristiqueP[] = $caracteristiqueP;

        return $this;
    }

    /**
     * Remove caracteristiqueP
     *
     * @param \AppBundle\Entity\Caracteristique_Produit $caracteristiqueP
     */
    public function removeCaracteristiqueP(\AppBundle\Entity\Caracteristique_Produit $caracteristiqueP) {
        $this->caracteristiqueP->removeElement($caracteristiqueP);
    }

    /**
     * Get caracteristiqueP
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCaracteristiqueP() {
        return $this->caracteristiqueP;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Produit
     */
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt() {
        return $this->updatedAt;
    }

}
