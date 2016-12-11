<?php

namespace PhpImap\Mail\Criteria\Sort\Factory\Basic;

use PhpImap\Mail\Criteria\Sort\Basic\BasicSortCriteria;
use PhpImap\Mail\Criteria\Sort\Factory\SortCriteriaFactoryInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicSortCriteriaFactory implements SortCriteriaFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createMessageDateCriteria(\SplBool $isDescendingOrder)
    {
        return new BasicSortCriteria($isDescendingOrder, SORTDATE);
    }

    /**
     * @inheritDoc
     */
    public function createArrivalDateCriteria(\SplBool $isDescendingOrder)
    {
        return new BasicSortCriteria($isDescendingOrder, SORTARRIVAL);
    }

    /**
     * @inheritDoc
     */
    public function createSenderAddressCriteria(\SplBool $isDescendingOrder)
    {
        return new BasicSortCriteria($isDescendingOrder, SORTFROM);
    }

    /**
     * @inheritDoc
     */
    public function createSubjectCriteria(\SplBool $isDescendingOrder)
    {
        return new BasicSortCriteria($isDescendingOrder, SORTSUBJECT);
    }

    /**
     * @inheritDoc
     */
    public function createReceiverCriteria(\SplBool $isDescendingOrder)
    {
        return new BasicSortCriteria($isDescendingOrder, SORTTO);
    }

    /**
     * @inheritDoc
     */
    public function createCopyAddressCriteria(\SplBool $isDescendingOrder)
    {
        return new BasicSortCriteria($isDescendingOrder, SORTCC);
    }

    /**
     * @inheritDoc
     */
    public function createMessageSizeCriteria(\SplBool $isDescendingOrder)
    {
        return new BasicSortCriteria($isDescendingOrder, SORTSIZE);
    }
}