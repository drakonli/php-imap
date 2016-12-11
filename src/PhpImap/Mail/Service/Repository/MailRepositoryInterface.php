<?php

namespace PhpImap\Mail\Service\Repository;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Criteria\Search\Collection\SearchCriteriaCollectionInterface;
use PhpImap\Mail\Criteria\Sort\SortCriteriaInterface;
use PhpImap\Mail\Exchange\Occurred\Collection\ExchangeOccurredMailCollectionInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailRepositoryInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $id
     *
     * @return ExchangeOccurredMailInterface|null
     */
    public function findById(ConnectionStreamInterface $stream, \SplInt $id);

    /**
     * @param ConnectionStreamInterface         $stream
     * @param SearchCriteriaCollectionInterface $searchCriteria
     * @param \SplInt                           $startWith
     * @param \SplInt                           $maxResults
     *
     * @return ExchangeOccurredMailCollectionInterface
     */
    public function find(
        ConnectionStreamInterface $stream,
        SearchCriteriaCollectionInterface $searchCriteria,
        \SplInt $startWith,
        \SplInt $maxResults
    );

    /**
     * @param ConnectionStreamInterface         $stream
     * @param SortCriteriaInterface             $sortCriteria
     * @param SearchCriteriaCollectionInterface $searchCriteria
     * @param \SplInt                           $startWith
     * @param \SplInt                           $maxResults
     *
     * @return ExchangeOccurredMailCollectionInterface
     */
    public function findAndSort(
        ConnectionStreamInterface $stream,
        SortCriteriaInterface $sortCriteria,
        SearchCriteriaCollectionInterface $searchCriteria,
        \SplInt $startWith,
        \SplInt $maxResults
    );
}
