<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateur")
 */
class Utilisateur extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255,options={"default":"inconnu"})
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255,options={"default":"inconnu"})
     */
    private $prenom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255,options={"default":"inconnu"})
     */
    private $adresse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=255,options={"default":"inconnu"})
     */
    private $ville;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer",options={"default":"0"})
     */
    private $code_postal;
    
    /**
     * @ORM\OneToMany(targetEntity="Commande", mappedBy="utilisateur")
     */
    private $commande;

    
    
    public function __construct()
    {
        parent::__construct();
        //Permet l'ajout d'utilisateurs en ligne de commande
        $this->nom = 'inconnu';
        $this->prenom = 'inconnu';
        $this->adresse = 'inconnu';
        $this->ville = 'inconnu';
        $this->code_postal = 0;
        
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Utilisateur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Utilisateur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return Utilisateur
     */
    public function setCodePostal($codePostal)
    {
        $this->code_postal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * Add commande
     *
     * @param \AppBundle\Entity\Commande $commande
     *
     * @return Utilisateur
     */
    public function addCommande(\AppBundle\Entity\Commande $commande)
    {
        $this->commande[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \AppBundle\Entity\Commande $commande
     */
    public function removeCommande(\AppBundle\Entity\Commande $commande)
    {
        $this->commande->removeElement($commande);
    }

    /**
     * Get commande
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommande()
    {
        return $this->commande;
    }
}
