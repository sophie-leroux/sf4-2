<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // Instanciation de Faker
        $faker = Factory::create('fr_FR');

        // Creation de 3 catégories de produits
        for($i = 0; $i < 3; $i++) {
            $category = new Category();
            $category->setName($faker->realText(15));

            $manager->persist($category);
            // Définir une référence pour la récupérer dans d'autres fixtures
            $reference = 'category_' .$i;
            $this->addReference($reference, $category);
        }

        $manager->flush();
    }
}
