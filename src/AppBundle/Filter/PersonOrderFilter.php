<?php

namespace AppBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\Filter\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PersonOrderFilter.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class PersonOrderFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(ResourceInterface $resource, QueryBuilder $queryBuilder, Request $request)
    {
        //Order by name
        if ($orderByPerson = $request->get('person', false)) {
            $queryBuilder->orderBy('o.lastName', 'asc' === $orderByPerson ? 'ASC' : 'DESC');

            return;
        }

        //Order by default (date:desc)
        $queryBuilder->orderBy('o.lastName', 'ASC');
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription(ResourceInterface $resource)
    {
        return [];
    }
}