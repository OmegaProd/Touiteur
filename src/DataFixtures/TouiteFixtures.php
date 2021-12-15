<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Touite;
use Faker;

class TouiteFixtures //extends Fixture
{

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        //Créer 3 catégories fakées
        for ($i = 1; $i <= 3; $i++) {
            $category = new Category();
            $category->setTitle($faker->sentence())
                ->setDescription($faker->paragraph());

            $manager->persist($category);

            for ($j = 1; $j <= mt_rand(4, 6); $j++) {
                $touite = new Touite();

                $content = '<p>' . join($faker->paragraphs(5), '</p><p>') . '</p>';

                $touite->setContent($faker->paragraph())
                    ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                    ->setCategories($category);

                $manager->persist($touite);

                for ($k = 1; $k <= mt_rand(4, 10); $k++) {
                    $comment = new Comment();

                    $days = (new \DateTime())->diff($touite->getCreatedAt())->days;

                    $comment->setAuthor($faker->name)
                        ->setContent($content)
                        ->setCreatedAt($faker->dateTimeBetween('-' . $days . 'days'))
                        ->setTouite($touite);

                    $manager->persist($comment);
                }
            }
        }

        $manager->flush();
    }
}
