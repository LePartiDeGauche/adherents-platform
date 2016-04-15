<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Payment;
use AppBundle\Entity\Person;
use Doctrine\Common\Collections\ArrayCollection;
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
            __DIR__.'/fixtures/product.yml',
            __DIR__.'/fixtures/payment.yml',
            __DIR__.'/fixtures/order.yml',
            __DIR__.'/fixtures/category.yml',
            __DIR__.'/fixtures/blog_posting.yml',
            __DIR__.'/fixtures/event.yml',
            __DIR__.'/fixtures/registration.yml',
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
     * @return string
     */
    public function paymentMethod()
    {
        $methods = array(
            Payment::METHOD_CHECK,
            Payment::METHOD_CASH,
            Payment::METHOD_UNIQUE_DEBIT,
            Payment::METHOD_REGULAR_DEBIT,
            Payment::METHOD_TRANSFER,
        );

        return $methods[array_rand($methods)];
    }
    
    /**
     * @return array
     */
    public function orderPayments()
    {
        $payments = new ArrayCollection();
        $max = rand(1, 2);

        for($i=0; $i<$max; $i++) {
            $payments->add('@payment*');
        }

        return $payments;
    }
}
