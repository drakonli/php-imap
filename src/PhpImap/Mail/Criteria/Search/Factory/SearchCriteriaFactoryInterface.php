<?php

namespace PhpImap\Mail\Criteria\Search\Factory;

use PhpImap\Mail\Criteria\Search\SearchCriteriaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface SearchCriteriaFactoryInterface
{
    const DATE_CRITERIA_FORMAT = 'Y-m-d';

    const CRITERIA_ALL = 'ALL';
    const CRITERIA_ANSWERED = 'ANSWERED';
    const CRITERIA_DELETED = 'DELETED';
    const CRITERIA_FLAGGED = 'FLAGGED';
    const CRITERIA_NEW = 'NEW';
    const CRITERIA_OLD = 'OLD';
    const CRITERIA_RECENT = 'RECENT';
    const CRITERIA_SEEN = 'SEEN';
    const CRITERIA_UNANSWERED = 'UNANSWERED';
    const CRITERIA_UNDELETED = 'UNDELETED';
    const CRITERIA_UNFLAGGED = 'UNFLAGGED';
    const CRITERIA_UNSEEN = 'UNSEEN';

    const CRITERIA_WITH_VALUE_BCC = 'BCC';
    const CRITERIA_WITH_VALUE_BEFORE_DATE = 'BEFORE';
    const CRITERIA_WITH_VALUE_HAS_IN_BODY = 'BODY';
    const CRITERIA_WITH_VALUE_CC = 'CC';
    const CRITERIA_WITH_VALUE_FROM = 'FROM';
    const CRITERIA_WITH_VALUE_KEYWORD = 'KEYWORD';
    const CRITERIA_WITH_VALUE_ON = 'ON';
    const CRITERIA_WITH_VALUE_SINCE = 'SINCE';
    const CRITERIA_WITH_VALUE_SUBJECT = 'SUBJECT';
    const CRITERIA_WITH_VALUE_TEXT = 'TEXT';
    const CRITERIA_WITH_VALUE_TO = 'TO';
    const CRITERIA_WITH_VALUE_UN_KEYWORD = 'UNKEYWORD';

    /**
     * @param \SplString $name
     *
     * @return SearchCriteriaInterface
     */
    public function createCriteria(\SplString $name);

    /**
     * @param \SplString $name
     * @param \SplString $value
     *
     * @return SearchCriteriaInterface
     */
    public function createCriteriaWithValue(\SplString $name, \SplString $value);
}