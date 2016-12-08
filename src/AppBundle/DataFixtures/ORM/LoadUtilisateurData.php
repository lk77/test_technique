<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUtilisateurData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $utilisateurs = array(
            array("c.parizau","123456","c.parizau@gmail.com", "Baptiste", "Parizeau", "6, rue de Penthièvre", "29000", "QUIMPER"),
            array("a.mouet","4646","a.mouet@orange.fr", "Apolline", "Mouet", "88, rue Gontier-Patin", "34300", "AGDE"),
            array("la_montagne97","6731", "la_montagne97@laposte.net","Nadine", "Lamontagne", "52, Avenue Millies Lacroix", "97610", "DZAOUDZI"),
            array("menard75","pass64", "menard75@hotmail.fr", "Gaspar", "Ménard", "56, Place de la Madeleine", "75011", "PARIS"),
            array("amelie","6546", "amelie@laposte.net", "Amélie", "Duval", "15, place Stanislas", "54100", "NANCY"),
            array("c.vertefeuille","41116", "c.vertefeuille@laposte.net","Christine", "Vertefeuille", "80, Rue du Limas", "21200", "BEAUNE"),
            array("camille.savard","871", "camille.savard@gmail.com","Camille", "Savard", "78, rue Gouin de Beauchesne", "93400", "SAINT-OUEN"),
            array("l.thibault","wordpass89", "l.thibault@gmail.com","Lea", "Thibault", "89, rue Porte d'Orange", "81100", "CASTRES"));
        for ($i = 0; $i < 7; $i++) {
            $reflector = new \ReflectionClass('AppBundle\Entity\Utilisateur');
            $utilisateur = $reflector->newInstanceArgs($utilisateurs[$i]);
            $manager->persist($utilisateur);
            $manager->flush();
            $this->addReference('utilisateur' . $i, $utilisateur);
        }
    }

    public function getOrder() {
        return 1;
    }

}
