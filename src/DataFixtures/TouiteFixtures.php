<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Touite;

class TouiteFixtures //extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $touite = new Touite();
            $touite->setContent("<p>Contenu</p>")
                ->setCreatedAt(new \DateTime());

            $manager->persist($touite);
        }

        $manager->flush();
    }
}
