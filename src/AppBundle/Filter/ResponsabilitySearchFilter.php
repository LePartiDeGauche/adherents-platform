<?php

namespace AppBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\Filter\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ResponsabilitySearchFilter.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class ResponsabilitySearchFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(ResourceInterface $resource, QueryBuilder $queryBuilder, Request $request)
    {
        if (!($searchResponsability = $request->get('search', false))) {
            return;
        }

        $queryBuilder
            ->andWhere('o.name LIKE :search')
            ->setParameter('search', '%'.$searchResponsability.'%')
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
