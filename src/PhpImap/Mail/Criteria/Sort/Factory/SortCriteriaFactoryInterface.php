<?php

namespace PhpImap\Mail\Criteria\Sort\Factory;

use PhpImap\Mail\Criteria\Sort\SortCriteriaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface SortCriteriaFactoryInterface
{
    /**
     * @param \SplBool $isDescendingOrder
     *
     * @return SortCriteriaInterface
     */
    public function createMessageDateCriteria(\SplBool $isDescendingOrder);

    /**
     * @param \SplBool $isDescendingOrder
     *
     * @return SortCriteriaInterface
     */
    public function createArrivalDateCriteria(\SplBool $isDescendingOrder);

    /**
     * @param \SplBool $isDescendingOrder
     *
     * @return SortCriteriaInterface
     */
    public function createSenderAddressCriteria(\SplBool $isDescendingOrder);

    /**
     * @param \SplBool $isDescendingOrder
     *
     * @return SortCriteriaInterface
     */
    public function createSubjectCriteria(\SplBool $isDescendingOrder);

    /**
     * @param \SplBool $isDescendingOrder
     *
     * @return SortCriteriaInterface
     */
    public function createReceiverCriteria(\SplBool $isDescendingOrder);

    /**
     * @param \SplBool $isDescendingOrder
     *
     * @return SortCriteriaInterface
     */
    public function createCopyAddressCriteria(\SplBool $isDescendingOrder);

    /**
     * @param \SplBool $isDescendingOrder
     *
     * @return SortCriteriaInterface
     */
    public function createMessageSizeCriteria(\SplBool $isDescendingOrder);
}