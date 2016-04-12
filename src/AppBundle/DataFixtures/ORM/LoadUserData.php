<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Person;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $person = new Person();
        $person->setAddress('1936 rue du front populaire');
        $person->setCity('Lille');
        $person->setEmail('jaures@gauche.fr');
        $person->setDepartment('nord');
        $person->setBirthdate(new \DateTime());
        $person->setGender(Person::GENDER_MALE);
        $person->setPhone('1936196817');
        $person->setFirstName('Jean');
        $person->setLastName('Jaures');
        $person->setPlainPassword('test');
        $person->setEnabled('true');
        $person->setUsername('jean-jean');

        $manager->persist($person);
        $manager->flush();
    }
}
