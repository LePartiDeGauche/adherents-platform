<?php

namespace AppBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\Filter\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ResponsabilityOrderFilter.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class ResponsabilityOrderFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(ResourceInterface $resource, QueryBuilder $queryBuilder, Request $request)
    {
        //Order by name
        if ($orderByResponsability = $request->get('name', false)) {
            $queryBuilder->orderBy('o.name', 'asc' === $orderByResponsability ? 'ASC' : 'DESC');

            return;
        }

        //Order by default (date:desc)
        $queryBuilder->orderBy('o.name', 'ASC');
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(ResourceInterface $resource)
    {
        return [];
    }
}
