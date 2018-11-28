<?php

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $commentdoudou = new Comment();
        $commentdoudou->setContent("J'ai vu une personne ramasser le doudou, elle portait un chemisier rouge avec des basquettes blanches");
        $commentdoudou->setUser($this->getReference('user-pierre'));
        $commentdoudou->setTraobject($this->getReference('traobject-bambi'));
        $manager->persist($commentdoudou);

        $commentdoudou2 = new Comment();
        $commentdoudou2->setContent("Merci je vais essayer de voir avec le centre commercial :)");
        $commentdoudou2->setUser($this->getReference('user-lucie'));
        $commentdoudou2->setTraobject($this->getReference('traobject-bambi'));
        $manager->persist($commentdoudou2);

        $commentdoudou3 = new Comment();
        $commentdoudou3->setContent("De rien :p");
        $commentdoudou3->setUser($this->getReference('user-pierre'));
        $commentdoudou3->setTraobject($this->getReference('traobject-bambi'));
        $manager->persist($commentdoudou3);

        $commentbmw = new Comment();
        $commentbmw->setContent("Wsh qq1 la vu ?!");
        $commentbmw->setUser($this->getReference('user-francois'));
        $commentbmw->setTraobject($this->getReference('traobject-bmw'));
        $manager->persist($commentdoudou);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return[TraobjectFixtures::class , UserFixtures::class];
    }
}
