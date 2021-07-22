<?php

namespace App\DataFixtures;

use App\Entity\ProductCategory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductCategoryFixture extends Fixture
{
    public const CATEGORIES = ['Crêpe Salée', 'Crêpe Sucrée', 'Boisson', 'Dessert'];

    public function load(ObjectManager $manager)
    {
        foreach (self::CATEGORIES as $index => $categoryName) {
            $category = new ProductCategory();
            $category->setName($categoryName);

            $manager->persist($category);
            $this->addReference('category' . $index, $category);
        }

        $manager->flush();
    }
}
