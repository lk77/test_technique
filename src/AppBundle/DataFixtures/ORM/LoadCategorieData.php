<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Categorie;

class LoadCategorieData extends AbstractFixture implements OrderedFixtureInterface {

    public function load(ObjectManager $manager) {
        $titre = array("livre", "dvd", "blu-ray");
        $description = array("Livres papiers ou électroniques","Films sur DVD","Films sur blu-ray");
        $caracteristiques = array(array(0,2,5,7,8),array(1,3,4,6,8),array(1,3,4,6,8));
        for ($i = 0; $i < 3; $i++) {
            $categorie = new Categorie();
            $categorie->setTitre($titre[$i]);
            $categorie->setDescription($description[$i]);
            foreach($caracteristiques[$i] as $caracteristique){
                $categorie->addCaracteristique($this->getReference('caracteristique'.$caracteristique));
            }
            $manager->persist($categorie);
            $manager->flush();
            $this->addReference('categorie'.$i, $categorie);
        }
    }

    public function getOrder() {
        return 2;
    }

}