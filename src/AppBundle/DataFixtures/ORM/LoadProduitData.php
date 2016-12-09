<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Produit;
use AppBundle\Entity\Caracteristique_Produit;
use AppBundle\Entity\Categorie_Produit;

class LoadProduitData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $titre = array(
            "Demain les chats",
            "Le dompteur de lions",
            "Le Canard Enchaîné, 100 ans : Un siècle d'artistes et de dessins",
            "Star Wars : Le Réveil de la Force",
            "Jason Bourne",
            "Game of Thrones - Saison 6",
            "Captain America : Civil War", 
            "Independence Day : Resurgence",
            "Les 8 salopards",
        );
        $caracteristiques = array(
            array(0 => "978-2226392053", 2 => "Bernard Werber", 5 => "2016-09-28", 7 => 320),
            array(0 => "978-2330064020", 2 => "Camilla Läckberg", 5 => "2016-05-11", 7 => 392),
            array(0 => "978-2021283143", 2 => "Laurent Martin", 5 => "2016-10-27", 7 => 614),
            array(1 => "B019IJ0MEM", 3 => "J.J. Abrams", 4 => "Harrison Ford, Daisy Ridley", 6 => "2016-04-16", 8 => 130),
            array(1 => "B01KJYV8FM", 3 => "Paul Greengrass", 4 => "Matt Damon, Tommy Lee Jones", 6 => "2016-12-10", 8 => 123),
            array(1 => "B01IPVSLOC", 3 => "Jeremy Podeswa", 4 => "Peter Dinklage, Nikolaj Coster-Waldau", 6 => "2016-11-14", 8 => 520),
            array(1 => "B01HH9Y5P2", 3 => "Joe Russo, Anthony Russo", 4 => "Chris Evans, Robert Downey Jr.", 6 => "2016-10-05", 8 => 147),
            array(1 => "B01ITVJU98", 3 => "Roland Emmerich", 4 => "Liam Hemsworth, Jeff Goldblum ", 6 => "2016-11-23", 8 => 119),
            array(1 => "B01A6TKTQ4", 3 => "Quentin Tarantino", 4 => "Samuel L. Jackson, Kurt Russell", 6 => "2016-05-25", 8 => 161)
        );
        $categorie = array(0,0,0,1,1,1,2,2,2);
        $description = array(
            "Pythagore, chat de laboratoire appareillé pour se connecter avec les ordinateurs enseigne à Bastet, jeune chatte Montmartroise, à communiquer avec les humains pour tenter de leur faire prendre conscience de la violence de leur société.",
            "C'est le mois de janvier et un froid glacial s'est emparé de Fjällbacka. Une fille à demi nue, surgie de la forêt enneigée, est percutée par une voiture. Lorsque Patrik Hedström et ses collègues sont prévenus, la jeune fille a déjà été identifiée",
            "Le Canard Enchaîné naît en pleine Guerre mondiale, dans un climat de propagande et de bourrage de crâne : tout le monde prétend dire la vérité, il affiche son choix de mentir… Difficile de faire rire dans une période tragique, mais il y réussit pleinement, avec son art de l'antiphrase, de la satire et de la dérision. ",
            "Dans une galaxie lointaine, très lointaine, un nouvel épisode de la saga Star Wars, 30 ans après les événements du Retour du Jedi. ",
            "La traque de Jason Bourne par les services secrets américains se poursuit. Des îles Canaries à Londres en passant par Las Vegas... ",
            "Il y a très longtemps, à une époque oubliée, une force a détruit l'équilibre des saisons. Dans un pays où l'été peut durer plusieurs années et l'hiver toute une vie, des forces sinistres et surnaturelles se pressent aux portes du Royaume des Sept Couronnes",
            "Steve Rogers est désormais à la tête des Avengers, dont la mission est de protéger l'humanité. À la suite d'une de leurs interventions qui a causé d'importants dégâts collatéraux, le gouvernement décide de mettre en place un organisme de commandement et de supervision. ",
            "Nous avons toujours su qu'ils reviendraient. La terre est menacée par une catastrophe d’une ampleur inimaginable. Pour la protéger, toutes les nations ont collaboré autour d’un programme de défense colossal exploitant la technologie extraterrestre récupérée.",
            "Quelques années après la Guerre de Sécession, le chasseur de primes John Ruth, dit Le Bourreau, fait route vers Red Rock, où il conduit sa prisonnière Daisy Domergue se faire pendre. Sur leur route, ils rencontrent le Major Marquis Warren, un ancien soldat lui aussi devenu chasseur de primes, et Chris Mannix, le nouveau shérif de Red Rock.",);
        $image_url = array(
            "demain_les_chats.jpg",
            "le_dompteur_de_lions.jpg",
            "le_canard_enchaine.jpg",
            "star_wars_le_reveil_de_la_force.jpg",
            "jason_bourne_2016.jpg",
            "game_of_thrones_s6.jpg",
            "captain_america_civil_war.jpg",
            "independence_day_resurgence.jpg",
            "les_huit_salopards.jpg");
        $prix = array(20.90, 23, 49, 14.99, 22.99, 32.99, 22.99, 22.99, 21.55);
        $quantite = array(16, 21, 150, 9, 15, 35, 17, 12, 29);
        for ($i = 0; $i < 9; $i++) {
            $produit = new Produit();
            $produit->setTitre($titre[$i]);
            $produit->setDescription($description[$i]);
            $produit->setImageUrl($image_url[$i]);
            $produit->setPrix($prix[$i]);
            $produit->setQuantite($quantite[$i]);
            foreach ($caracteristiques[$i] as $id => $caracteristique) {
                $caracteristiqueP = new Caracteristique_Produit();
                $caracteristiqueP->setProduit($produit);
                $caracteristiqueP->setCaracteristique($this->getReference('caracteristique' . $id));
                $caracteristiqueP->setValeur($caracteristique);
                $produit->addCaracteristiqueP($caracteristiqueP);
            }
            $produit->setCategorieP($this->getReference('categorie' . $categorie[$i]));
            
            $manager->persist($produit);
            $manager->flush();
            $this->addReference('produit' . $i, $produit);
        }
    }

    public function getOrder() {
        return 4;
    }

}
