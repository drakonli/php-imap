<?php

namespace PhpImap\Mail\Criteria\Search\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Criteria\Search\SearchCriteriaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagSearchCriteria extends AbstractBasicImmutableParameterBag implements SearchCriteriaInterface
{
    const FIELD_KEY = 'key';
    const FIELD_VALUE = 'value';

    /**
     * @inheritDoc
     */
    public function getKey()
    {
        return $this->get(self::FIELD_KEY);
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->get(self::FIELD_VALUE);
    }

    /**
     * @inheritDoc
     */
    public function criteriaHasValue()
    {
        return $this->has(self::FIELD_VALUE);
    }
}
