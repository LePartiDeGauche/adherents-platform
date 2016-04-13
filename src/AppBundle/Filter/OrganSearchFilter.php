<?php

namespace AppBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\Filter\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class OrganSearchFilter.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class OrganSearchFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(ResourceInterface $resource, QueryBuilder $queryBuilder, Request $request)
    {
        if (!($searchOrgan = $request->get('search', false))) {
            return;
        }

        $queryBuilder
            ->andWhere('o.name LIKE :search')
            ->setParameter('search', '%'.$searchOrgan.'%')
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
