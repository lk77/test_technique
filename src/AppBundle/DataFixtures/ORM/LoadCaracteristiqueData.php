<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Caracteristique;

class LoadCaracteristiqueData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $nom = array("isbn", "isan", "auteur", "réalisateur", "acteurs", "parution", "sortie", "pages", "durée");
        $format = array("string", "string", "string", "string", "array", "date", "date", "integer", "integer");
        for ($i = 0; $i < 9; $i++) {
            $caracteristique = new Caracteristique();
            $caracteristique->setNom($nom[$i]);
            $caracteristique->setFormat($format[$i]);
            $manager->persist($caracteristique);
            $manager->flush();
            $this->addReference('caracteristique'.$i, $caracteristique);
        }
    }

    public function getOrder() {
        return 1;
    }

}