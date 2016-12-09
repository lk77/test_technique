<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Commande;
use AppBundle\Entity\Commande_Produit;

class LoadCommandeData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $commandes = array(
            array("2016-04-12", "livrée", 1, array(1,3,8)),
            array("2016-06-17", "livrée", 1, array(2,4,6,1)),
            array("2016-10-21", "annulée", 1, array(2,3,8,4)),
            array("2016-02-01", "livrée", 2, array(3,5,7,8)),
            array("2016-08-14", "livrée", 2, array(4,6,3)),
            array("2016-10-18", "livrée", 2, array(2,7,1)),
            array("2016-02-24", "livrée", 3, array(8,2)),
            array("2016-07-04", "livrée", 3, array(1,7,8)),
            array("2016-09-16", "annulée", 3, array(1,8)),
            array("2016-05-27", "livrée", 4, array(7,2,6)),
            array("2016-11-11", "livrée", 4, array(6,4)),
            array("2016-12-08", "en cours de livraison", 4, array(6,4,5,3)),
            array("2016-03-07", "livrée", 5, array(5,1,4)),
            array("2016-05-13", "livrée", 5, array(6,5,4)),
            array("2016-11-09", "livré", 5, array(4,5)),
            array("2016-04-04", "livrée", 6, array(4,3,5)),
            array("2016-07-17", "livrée", 6, array(4,5,3)),
            array("2016-12-21", "en préparation", 6, array(3,4,1,8,2)),
            array("2016-04-07", "livrée", 7, array(6,4,8)),
            array("2016-07-19", "livrée", 7, array(1,5,4)),
            array("2016-11-30", "annulée", 7, array(6,4,1)),
            array("2015-12-31", "livrée", 8, array(8,3,1)));
        $prix = array(20.90, 23, 49, 14.99, 22.99, 32.99, 22.99, 22.99, 21.55);
        for ($i = 0; $i < 21; $i++) {
            $commande = new Commande();
            $commande->setDate(new \DateTime($commandes[$i][0]));
            $commande->setStatut($commandes[$i][1]);
            $commande->setUtilisateur($this->getReference('utilisateur' . $commandes[$i][2]));
            $commande->setPrix(0);
            foreach($commandes[$i][3] as $produit){
                $commandeP = new Commande_Produit();
                $commandeP->setQuantite(1);
                $commandeP->setPrix($prix[$produit]);
                $commande->setPrix($commande->getPrix() + $prix[$produit]);
                $commandeP->setProduit($this->getReference('produit' . $produit));
                $commandeP->setCommande($commande);
                $commande->getCommandeP()->add($commandeP);
            }
            $manager->persist($commande);
            $manager->flush();
            $this->addReference('commande' . $i, $commande);
        }
    }

    public function getOrder() {
        return 5;
    }

}
