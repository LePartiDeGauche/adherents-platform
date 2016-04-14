<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\EncasementDetail;
use AppBundle\Entity\Person;
use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class LoadUserData extends DataFixtureLoader
{
    /**
     * {@inheritdoc}
     */
    protected function getFixtures()
    {
        return  array(
            __DIR__.'/fixtures/organ.yml',
            __DIR__.'/fixtures/person.yml',
            __DIR__.'/fixtures/status.yml',
            __DIR__.'/fixtures/responsability.yml',
            __DIR__.'/fixtures/encasement.yml',
        );
    }

    /**
     * @return string
     */
    public function gender()
    {
        $genders = array(
            Person::GENDER_MALE,
            Person::GENDER_FEMALE,
            Person::GENDER_NONE,
        );

        return $genders[array_rand($genders)];
    }

    /**
     * @return string
     */
    public function phone($mobile = false)
    {
        $firstNumbers = array('01', '02', '03', '04', '05', '08', '09');
        if ($mobile) {
            $firstNumbers = array('06', '07');
        }

        $number = $firstNumbers[array_rand($firstNumbers)];

        for ($i = 0; $i < 8; ++$i) {
            $number .= rand(0, 9);
        }

        return $number;
    }

    /**
     * @return string
     */
    public function randomRelation($type, $max)
    {
        return '@'.$type.rand(1, $max);
    }

    /**
     * @return array
     */
    public function paymentMethod()
    {
        $methods = array(
            EncasementDetail::METHOD_CHECK,
            EncasementDetail::METHOD_CASH,
            EncasementDetail::METHOD_UNIQUE_DEBIT,
            EncasementDetail::METHOD_REGULAR_DEBIT,
            EncasementDetail::METHOD_TRANSFER,
        );

        return $methods[array_rand($methods)];
    }
}
