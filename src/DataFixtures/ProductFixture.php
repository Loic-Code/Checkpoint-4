<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProductFixture extends Fixture implements DependentFixtureInterface
{
    public const PRODUCTS = [
        [
            'name' => 'Produit',
            'description' => 'Steak, merguez, sauce bbq, mais, tomate, poivron',
            'picture' => 'https://images.unsplash.com/photo-1584278860047-22db9ff82bed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
        ],

        [
            'name' => 'Produit',
            'description' => 'Steak, merguez, sauce bbq, mais, tomate, poivron',
            'picture' => 'https://images.unsplash.com/photo-1584278860047-22db9ff82bed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
        ],

        [
            'name' => 'Produit',
            'description' => 'Steak, merguez, sauce bbq, mais, tomate, poivron',
            'picture' => 'https://images.unsplash.com/photo-1584278860047-22db9ff82bed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
        ],

        [
            'name' => 'Produit',
            'description' => 'Steak, merguez, sauce bbq, mais, tomate, poivron',
            'picture' => 'https://images.unsplash.com/photo-1584278860047-22db9ff82bed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
        ],

        [
            'name' => 'Produit',
            'description' => 'Steak, merguez, sauce bbq, mais, tomate, poivron',
            'picture' => 'https://images.unsplash.com/photo-1584278860047-22db9ff82bed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
        ],

        [
            'name' => 'Produit',
            'description' => 'Steak, merguez, sauce bbq, mais, tomate, poivron',
            'picture' => 'https://images.unsplash.com/photo-1584278860047-22db9ff82bed?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80',
        ],
    ];


    public function load(ObjectManager $manager)
    {
        foreach (self::PRODUCTS as $productData) {
            $product = new Product();
            $product->setName($productData['name']);
            $product->setDescription($productData['description']);
            $product->setPicture($productData['picture']);
            $product->setCategory($this->getReference('category' . rand(0, count(ProductCategoryFixture::CATEGORIES) - 1)));
            $manager->persist($product);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductCategoryFixture::class,
        ];
    }
}
