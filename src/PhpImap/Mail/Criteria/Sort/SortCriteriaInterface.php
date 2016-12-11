<?php

namespace PhpImap\Mail\Criteria\Sort;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface SortCriteriaInterface
{
    /**
     * @return bool
     */
    public function isDescendingOrder();

    /**
     * @return \SplInt
     */
    public function getSortParameter();
}
