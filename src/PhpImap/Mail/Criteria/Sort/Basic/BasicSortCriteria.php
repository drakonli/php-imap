<?php

namespace PhpImap\Mail\Criteria\Sort\Basic;

use PhpImap\Mail\Criteria\Sort\SortCriteriaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicSortCriteria implements SortCriteriaInterface
{
    /**
     * @var \SplBool
     */
    private $isDescendingOrder;

    /**
     * @var \SplInt
     */
    private $sortParameter;

    /**
     * BasicSortCriteria constructor.
     *
     * @param \SplBool $isDescendingOrder
     * @param \SplInt  $sortParameter
     */
    public function __construct(\SplBool $isDescendingOrder, \SplInt $sortParameter)
    {
        $this->isDescendingOrder = $isDescendingOrder;
        $this->sortParameter = $sortParameter;
    }

    /**
     * @inheritDoc
     */
    public function isDescendingOrder()
    {
        return (bool)$this->isDescendingOrder;
    }

    /**
     * @inheritDoc
     */
    public function getSortParameter()
    {
        return $this->sortParameter;
    }
}
