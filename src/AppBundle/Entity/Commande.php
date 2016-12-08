<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommandeRepository")
 */
class Commande
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;
    
    /**
     * @ORM\OneToMany(targetEntity="Commande_Produit", mappedBy="commande",cascade={"persist"}))
     */
    private $commandeP;
    
    /**
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="commande",cascade={"persist"}))
     */
    private $utilisateur; 
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commandeP = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commande
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set prix
     *
     * @param float $prix
     *
     * @return Commande
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
     * Set statut
     *
     * @param string $statut
     *
     * @return Commande
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Add commandeP
     *
     * @param \AppBundle\Entity\Commande_Produit $commandeP
     *
     * @return Commande
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
     * Set utilisateur
     *
     * @param \AppBundle\Entity\Utilisateur $utilisateur
     *
     * @return Commande
     */
    public function setUtilisateur(\AppBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \AppBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
