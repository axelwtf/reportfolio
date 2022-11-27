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
            ->setAbout(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et rhoncus nisl. Morbi sodales ligula a bibendum pretium. Fusce vulputate ornare ultricies. Duis id sollicitudin neque. Vivamus nec lorem vel orci imperdiet feugiat in id ex. Phasellus leo leo, lacinia in cursus quis, fringilla dictum elit. Nunc non mauris tempor, porttitor nulla vitae, hendrerit orci. In sed malesuada neque. Sed lacinia massa id lorem pharetra, sit amet placerat libero molestie. Sed sem quam, egestas sit amet tortor sed, semper ornare ex. Quisque efficitur neque vel facilisis egestas. Donec iaculis sapien lectus, id blandit quam venenatis vitae. Integer vitae dignissim nulla. Nam congue turpis eget est luctus, et pretium magna tincidunt. Maecenas aliquam commodo nisl, quis elementum nisl luctus bibendum. Maecenas finibus quis tellus at scelerisque. Aenean ante justo, fringilla in molestie sed, sodales blandit dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.')
            ->setEmail('wolfs.axelw@gmail.com')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('$2y$13$1eC2cai5oZiz1a.OBPMy2u.hZ1M8M1lWjZoNmnsRiRcD1GnOL1tvC')
            ->setImageName("https://picsum.photos/1000/350");

        $manager->persist($user);
        $manager->flush();

        $manager->flush();
    }
}
