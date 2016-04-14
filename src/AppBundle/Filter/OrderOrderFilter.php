<?php

namespace AppBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\Filter\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class OrderOrderFilter.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class OrderOrderFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(ResourceInterface $resource, QueryBuilder $queryBuilder, Request $request)
    {
        //Order by date
        if ($orderByDate = $request->get('date', false)) {
            $queryBuilder->orderBy('o.date', 'asc' === $orderByDate ? 'ASC' : 'DESC');

            return;
        }

        //Order by default (date:desc)
        $queryBuilder->orderBy('o.date', 'DESC');
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(ResourceInterface $resource)
    {
        return [];
    }
}
