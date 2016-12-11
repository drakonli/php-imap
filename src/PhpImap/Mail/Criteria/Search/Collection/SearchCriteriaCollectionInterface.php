<?php

namespace PhpImap\Mail\Criteria\Search\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Mail\Criteria\Search\SearchCriteriaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface SearchCriteriaCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return SearchCriteriaInterface
     */
    public function current();
}