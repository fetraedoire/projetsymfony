<?php

namespace App\DataFixtures;

use App\Entity\Banque;
use Faker;
use App\Entity\User;
use App\Entity\Cheque;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Faker\Factory::create('fr_FR');
        $users = [];
        for ($i = 0; $i < 5; $i++) {
            $user = new User();
            $user->setEmail($faker->email)
                ->setUsername($faker->name)
                ->setPassword($faker->password());
            $manager->persist($user);
            $users[] = $user;
        }
        $banques = [];
        for ($i = 0; $i < 15; $i++) {
            $banque = new Banque();
            $banque->setBni($faker->name)
                ->setBfv($faker->name)
                ->setBoa($faker->name);
            $manager->persist($banque);
            $banques[] = $banque;
        }
        for ($i = 0; $i < 15; $i++) {
            $cheque = new Cheque();
            $cheque->setCreatedAt(new \DateTime())
                ->setNumber($faker->randomDigitNot(1000))
                ->setPrice($faker->randomNumber(2))
                ->setDescription($faker->text(1600))
                ->setBanque($banques[$faker->numberBetween(0, 14)])
                ->setUser($users[$faker->numberBetween(0, 4)]);
            $manager->persist($cheque);
        }
        $manager->flush();
    }
}
