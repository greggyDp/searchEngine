<?php

namespace App\DataFixtures;

use App\Entity\Users;
use App\Entity\UsersAbout;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $testCase1 = (new Users())
            ->setId(1000)
            ->setPassword('dummy1')
            ->setEmail('user@domain.com')
            ->setLastVisit(new \DateTime())
            ->setRole(Users::TEST_ROLE)
        ;
        $testCase2 = (new Users())
            ->setPassword('dummy2')
            ->setEmail('dummy2@mail.com')
            ->setLastVisit(new \DateTime())
            ->setRole(Users::TEST_ROLE)
        ;
        $manager->persist($testCase1);
        $manager->persist($testCase2);
        $manager->flush();


        $aboutCase1 = (new UsersAbout())
            ->setUser($testCase1)
            ->setItem(UsersAbout::ENUM_ITEM_COUNTRY)
            ->setValue('Russia')
            ->setUpDate(new \DateTime())
        ;
        $aboutCase2 = (new UsersAbout())
            ->setUser($testCase2)
            ->setItem(UsersAbout::ENUM_ITEM_COUNTRY)
            ->setValue('Ukraine')
            ->setUpDate(new \DateTime())
        ;
        $aboutCase3 = (new UsersAbout())
            ->setUser($testCase1)
            ->setItem(UsersAbout::ENUM_ITEM_STATE)
            ->setValue('disabled')
            ->setUpDate(new \DateTime())
        ;
        $aboutCase4 = (new UsersAbout())
            ->setUser($testCase1)
            ->setItem(UsersAbout::ENUM_ITEM_GAVATAR)
            ->setValue('')
            ->setUpDate(new \DateTime())
        ;
        $aboutCase5 = (new UsersAbout())
            ->setUser($testCase1)
            ->setItem(UsersAbout::ENUM_ITEM_FIRSTNAME)
            ->setValue('')
            ->setUpDate(new \DateTime())
        ;
        $manager->persist($aboutCase1);
        $manager->persist($aboutCase2);
        $manager->persist($aboutCase3);
        $manager->persist($aboutCase4);
        $manager->persist($aboutCase5);
        $manager->flush();
    }
}