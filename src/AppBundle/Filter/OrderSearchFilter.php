<?php

namespace AppBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Dunglas\ApiBundle\Api\ResourceInterface;
use Dunglas\ApiBundle\Doctrine\Orm\Filter\FilterInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class OrderSearchFilter.
 *
 * @author Clément Talleu <clement@les-tilleuls.coop>
 */
class OrderSearchFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(ResourceInterface $resource, QueryBuilder $queryBuilder, Request $request)
    {
        if ($searchMember = $request->get('member', false)) {
            $queryBuilder
                ->join('o.member', 'm')
                ->where('m.lastName LIKE :member')
                ->setParameter('member', '%'.$searchMember.'%')
            ;
        }

        if ($searchPayer = $request->get('payer', false)) {
            $queryBuilder
                ->join('o.payer', 'p')
                ->andWhere('p.lastName LIKE :search')
                ->setParameter('search', '%'.$searchPayer.'%')
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
