<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setId(1)
            ->setname('Axel')
            ->setLastname('Wolfs')
            ->setAbout('')
            ->setInfoskill('')
            ->setEmail('wolfs.axelw@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('$2y$13$1eC2cai5oZiz1a.OBPMy2u.hZ1M8M1lWjZoNmnsRiRcD1GnOL1tvC')
            ->setImageName("https://picsum.photos/1000/350");

        $manager->persist($user);
        $manager->flush();

        $manager->flush();
    }
}
