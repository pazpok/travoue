<?php

namespace App\DataFixtures;

use App\Entity\Traobject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $bambi = new Traobject();
        $bambi->setTitle('Doudou bambi perdu Alma');
        $bambi->setCategory($this->getReference('category-doudou'));
        $bambi->setState($this->getReference('state-perdu'));
        $bambi->setUser($this->getReference('user-pierre'));
        $bambi->setCounty($this->getReference('county-35'));
        $bambi->setPicture('https://images-na.ssl-images-amazon.com/images/I/51-yvdUMMDL._SY355_.jpg');
        $bambi->setDescription('Doudou bambi perdu à Alma le 24/11, ma fille pleure tout le temps ...');
        $bambi->setEventAt(new \DateTime());
        $bambi->setCity('Rennes');
        $bambi->setCreatedAt(new \DateTime());
        $manager->persist($bambi);
        $this->addReference('traobject-bambi', $bambi);

        $bmw = new Traobject();
        $bmw->setTitle('BMW tuning perdu');
        $bmw->setCategory($this->getReference('category-voiture'));
        $bmw->setState($this->getReference('state-perdu'));
        $bmw->setUser($this->getReference('user-francois'));
        $bmw->setCounty($this->getReference('county-29'));
        $bmw->setPicture('https://cloud10.todocoleccion.online/coches-a-escala/tc/2015/05/02/13/49150862.jpg');
        $bmw->setDescription('G perdu mon BMW a Brest pdt un rasso sur le por jcroi on mla vaulé mé jsui pa sur');
        $bmw->setEventAt(new \DateTime());
        $bmw->setCity('Brest');
        $bmw->setCreatedAt(new \DateTime());
        $manager->persist($bmw);
        $this->addReference('traobject-bmw', $bmw);

        $clef = new Traobject();
        $clef->setTitle('Clé de garage');
        $clef->setCategory($this->getReference('category-cle'));
        $clef->setState($this->getReference('state-perdu'));
        $clef->setUser($this->getReference('user-pierre'));
        $clef->setCounty($this->getReference('county-35'));
        $clef->setPicture('');
        $clef->setDescription('Perdu sur la route entre Beaulieu et Colombier vers 4h du matin ...');
        $clef->setEventAt(new \DateTime());
        $clef->setCity('Rennes');
        $clef->setCreatedAt(new \DateTime());
        $manager->persist($clef);
        $this->addReference('traobject-clef', $clef);

        $cb = new Traobject();
        $cb->setTitle('Carte bancaire');
        $cb->setCategory($this->getReference('category-portefeuille'));
        $cb->setState($this->getReference('state-perdu'));
        $cb->setUser($this->getReference('user-pazpok'));
        $cb->setCounty($this->getReference('county-56'));
        $cb->setPicture('Carnac');
        $cb->setDescription('Carte bancaire perdu le long de la plage pendant une balade à Poney');
        $cb->setEventAt(new \DateTime());
        $cb->setCity('Carnac');
        $cb->setCreatedAt(new \DateTime());
        $manager->persist($cb);
        $this->addReference('traobject-cb', $cb);

        $pikachu = new Traobject();
        $pikachu->setTitle('Doudou pikachu intermarché rostrenen');
        $pikachu->setCategory($this->getReference('category-doudou'));
        $pikachu->setState($this->getReference('state-trouve'));
        $pikachu->setUser($this->getReference('user-pazpok'));
        $pikachu->setCounty($this->getReference('county-22'));
        $pikachu->setPicture('https://cdn3.pokemoncarte.com/2200-large_default/peluche-pokemon-peluche-pokemon-pikachu-25-cm-avec-casquette-20-ans.jpg');
        $pikachu->setDescription('Doudou pikachu perdu à Intermarché Rostrenen le 15/11, ma fille pleure tout le temps ...');
        $pikachu->setEventAt(new \DateTime());
        $pikachu->setCity('Rostrenen');
        $pikachu->setCreatedAt(new \DateTime());
        $manager->persist($pikachu);
        $this->addReference('traobject-pikachu', $pikachu);

        $carteid = new Traobject();
        $carteid->setTitle('Carte identité perdu lorient');
        $carteid->setCategory($this->getReference('category-portefeuille'));
        $carteid->setState($this->getReference('state-trouve'));
        $carteid->setUser($this->getReference('user-francois'));
        $carteid->setCounty($this->getReference('county-56'));
        $carteid->setPicture('');
        $carteid->setDescription('Sorti de fête foraine, en rentrant à la maison je m\'aperçoie que ma carte à disparu, si quelqu`un la retrouve merci de me contacter');
        $carteid->setEventAt(new \DateTime());
        $carteid->setCity('Lorient');
        $carteid->setCreatedAt(new \DateTime());
        $manager->persist($carteid);
        $this->addReference('traobject-carteid', $carteid);

        $clefm = new Traobject();
        $clefm->setTitle('Clé de maison');
        $clefm->setCategory($this->getReference('category-cle'));
        $clefm->setState($this->getReference('state-trouve'));
        $clefm->setUser($this->getReference('user-pierre'));
        $clefm->setCounty($this->getReference('county-35'));
        $clefm->setPicture('https://pmcdn.priceminister.com/photo/900494340.jpg');
        $clefm->setDescription('Clé de maison avec porte clés didl(voir photo)');
        $clefm->setEventAt(new \DateTime());
        $clefm->setCity('Saint Malo');
        $clefm->setCreatedAt(new \DateTime());
        $manager->persist($clefm);
        $this->addReference('traobject-clefm', $clefm);

        $potechap = new Traobject();
        $potechap->setTitle('Pot d\'échappement 206');
        $potechap->setCategory($this->getReference('category-voiture'));
        $potechap->setState($this->getReference('state-trouve'));
        $potechap->setUser($this->getReference('user-lucie'));
        $potechap->setCounty($this->getReference('county-56'));
        $potechap->setPicture('');
        $potechap->setDescription('Le pot d\'échappement de ma 206 est parti en faisant saint brieuc rostrenen pour aller au cinéma');
        $potechap->setEventAt(new \DateTime());
        $potechap->setCity('Callac');
        $potechap->setCreatedAt(new \DateTime());
        $manager->persist($potechap);
        $this->addReference('traobject-potechap', $potechap);

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
        return[CategoryFixtures::class, StateFixtures::class, UserFixtures::class, CountyFixtures::class];
    }
}
