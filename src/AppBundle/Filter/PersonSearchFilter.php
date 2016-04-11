<?php

namespace AppBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\Filter\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonSearchFilter.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class PersonSearchFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(ResourceInterface $resource, QueryBuilder $queryBuilder, Request $request)
    {
        if (!($searchUser = $request->get('search', false))) {
            return;
        }

        $queryBuilder
            ->andWhere('o.lastName LIKE :search OR o.firstName LIKE :search OR o.email LIKE :search ')
            ->setParameter('search', '%'.$searchUser.'%')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(ResourceInterface $resource)
    {
        return [];
    }
}
