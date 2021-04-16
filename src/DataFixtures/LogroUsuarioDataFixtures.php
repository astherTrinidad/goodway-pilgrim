<?php

namespace App\DataFixtures;

use App\Entity\LogroUsuario;
use App\DataFixtures\UserDataFixtures;
use App\DataFixtures\LogroDataFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class LogroUsuarioDataFixtures extends Fixture implements DependentFixtureInterface
{           
    $date1 = date('2020-05-01');
    /*public const DATE2 = new DateTime("2015-10-01");
    public const DATE3 = new DateTime("2019-06-23");
    public const DATE4 = new DateTime("2018-12-30");*/
    
    public function load(ObjectManager $manager)
    {   
        $dateNew = date('2020-05-01');
        dump($dateNew);
        die;
        //patriciaS
        $logroUsuario = new LogroUsuario();       
        $logroUsuario->setDate(date("Y-M-D", strtotime(DATE1)));
        $logroUsuario->setUser($this->getReference(UserDataFixtures::USUARIO . 1));        
        $logroUsuario->setAchievement($this->getReference(LogroDataFixtures::LOGRO . 7));
        $manager->persist($logroUsuario);
        $manager->flush();

        $logroUsuario1 = new LogroUsuario();       
        $logroUsuario1->setDate(self::DATE1);
        $logroUsuario1->setUser($this->getReference(UserDataFixtures::USUARIO . 1));        
        $logroUsuario1->setAchievement($this->getReference(LogroDataFixtures::LOGRO . 3));
        $manager->persist($logroUsuario1);
        $manager->flush();

        $logroUsuario2 = new LogroUsuario();       
        $logroUsuario2->setDate(self::DATE3);
        $logroUsuario2->setUser($this->getReference(UserDataFixtures::USUARIO . 1));        
        $logroUsuario2->setAchievement($this->getReference(LogroDataFixtures::LOGRO . 5));
        $manager->persist($logroUsuario2);
        $manager->flush();

        //Irene no tiene
        //Asther
        $logroUsuario3 = new LogroUsuario();       
        $logroUsuario3->setDate(self::DATE4);
        $logroUsuario3->setUser($this->getReference(UserDataFixtures::USUARIO . 3));        
        $logroUsuario3->setAchievement($this->getReference(LogroDataFixtures::LOGRO . 1));
        $manager->persist($logroUsuario3);
        $manager->flush();

        $logroUsuario4 = new LogroUsuario();       
        $logroUsuario4->setDate(self::DATE4);
        $logroUsuario4->setUser($this->getReference(UserDataFixtures::USUARIO . 3));        
        $logroUsuario4->setAchievement($this->getReference(LogroDataFixtures::LOGRO . 6));
        $manager->persist($logroUsuario4);
        $manager->flush();

        //Sara
        $logroUsuario5 = new LogroUsuario();       
        $logroUsuario5->setDate(self::DATE2);
        $logroUsuario5->setUser($this->getReference(UserDataFixtures::USUARIO . 4));        
        $logroUsuario5->setAchievement($this->getReference(LogroDataFixtures::LOGRO . 2));
        $manager->persist($logroUsuario5);
        $manager->flush();

        //Javi
        $logroUsuario6 = new LogroUsuario();       
        $logroUsuario6->setDate(self::DATE1);
        $logroUsuario6->setUser($this->getReference(UserDataFixtures::USUARIO . 5));        
        $logroUsuario6->setAchievement($this->getReference(LogroDataFixtures::LOGRO . 4));
        $manager->persist($logroUsuario6);
        $manager->flush(); 

        $logroUsuario7 = new LogroUsuario();       
        $logroUsuario7->setDate(self::DATE3);
        $logroUsuario7->setUser($this->getReference(UserDataFixtures::USUARIO . 5));        
        $logroUsuario7->setAchievement($this->getReference(LogroDataFixtures::LOGRO . 1));
        $manager->persist($logroUsuario7);
        $manager->flush(); 

    }

    public function getDependencies()
    {
        return [                
            LogroDataFixtures::class,
            UserDataFixtures::class
        ];
    }
}

