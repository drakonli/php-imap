<?php

namespace PhpImap\Mail\Criteria\Search\Factory\ParameterBag;

use PhpImap\Mail\Criteria\Search\Factory\Exception\NonExistentCriteriaException;
use PhpImap\Mail\Criteria\Search\Factory\SearchCriteriaFactoryInterface;
use PhpImap\Mail\Criteria\Search\ParameterBag\ParameterBagSearchCriteria;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagSearchCriteriaFactory implements SearchCriteriaFactoryInterface
{
    /**
     * @var array
     */
    private $possibleCriterias = [
        self::CRITERIA_ALL,
        self::CRITERIA_ANSWERED,
        self::CRITERIA_DELETED,
        self::CRITERIA_FLAGGED,
        self::CRITERIA_NEW,
        self::CRITERIA_OLD,
        self::CRITERIA_RECENT,
        self::CRITERIA_SEEN,
        self::CRITERIA_UNANSWERED,
        self::CRITERIA_UNDELETED,
        self::CRITERIA_UNFLAGGED,
        self::CRITERIA_UNSEEN,
    ];

    /**
     * @var array
     */
    private $possibleCriteriasWithValue = [
        self::CRITERIA_WITH_VALUE_BCC,
        self::CRITERIA_WITH_VALUE_BEFORE_DATE,
        self::CRITERIA_WITH_VALUE_HAS_IN_BODY,
        self::CRITERIA_WITH_VALUE_CC,
        self::CRITERIA_WITH_VALUE_FROM,
        self::CRITERIA_WITH_VALUE_KEYWORD,
        self::CRITERIA_WITH_VALUE_ON,
        self::CRITERIA_WITH_VALUE_SINCE,
        self::CRITERIA_WITH_VALUE_SUBJECT,
        self::CRITERIA_WITH_VALUE_TEXT,
        self::CRITERIA_WITH_VALUE_TO,
        self::CRITERIA_WITH_VALUE_UN_KEYWORD,
    ];

    /**
     * @inheritDoc
     */
    public function createCriteria(\SplString $name)
    {
        if (false === in_array($name, $this->possibleCriterias)) {
            throw new NonExistentCriteriaException($name);
        }

        return new ParameterBagSearchCriteria(
            [
                ParameterBagSearchCriteria::FIELD_KEY => $name,
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function createCriteriaWithValue(\SplString $name, \SplString $value)
    {
        if (false === in_array($name, $this->possibleCriteriasWithValue)) {
            throw new NonExistentCriteriaException($name);
        }

        return new ParameterBagSearchCriteria(
            [
                ParameterBagSearchCriteria::FIELD_KEY => $name,
                ParameterBagSearchCriteria::FIELD_VALUE => $value,
            ]
        );
    }
}