<?php

namespace AppBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\Filter\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonWomenFilter.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class PersonGenderFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(ResourceInterface $resource, QueryBuilder $queryBuilder, Request $request)
    {
        if ($gender = $request->get('gender', false)) {
            $queryBuilder
                ->andWhere('o.gender = :gender')
                ->setParameter('gender', $gender)
            ;

        }
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(ResourceInterface $resource)
    {
        return [];
    }
}
