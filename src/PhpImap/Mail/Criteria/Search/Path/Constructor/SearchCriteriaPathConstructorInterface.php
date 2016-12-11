<?php

namespace PhpImap\Mail\Criteria\Search\Path\Constructor;

use PhpImap\Mail\Criteria\Search\Collection\SearchCriteriaCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface SearchCriteriaPathConstructorInterface
{
    /**
     * @param SearchCriteriaCollectionInterface $searchCriteriaCollection
     *
     * @return \SplString
     */
    public function createPath(SearchCriteriaCollectionInterface $searchCriteriaCollection);
}