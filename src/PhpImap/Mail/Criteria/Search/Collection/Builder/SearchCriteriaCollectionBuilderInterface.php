<?php

namespace PhpImap\Mail\Criteria\Search\Collection\Builder;

use DateTime;
use drakonli\PhpUtils\Builder\BuilderInterface;
use PhpImap\Mail\Criteria\Search\Collection\SearchCriteriaCollectionInterface;

/**
 * Adding multiple criterias of one type works like "and" operator. There is no "or" operator in IMAP.
 *
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface SearchCriteriaCollectionBuilderInterface extends BuilderInterface
{
    /**
     * @return SearchCriteriaCollectionInterface
     */
    public function getSearchCriteriaCollection();

    /**
     * @return self
     */
    public function addFindAllCriteria();

    /**
     * @param \SplString $bcc
     *
     * @return self
     */
    public function addBccCriteria(\SplString $bcc);

    /**
     * @param DateTime $date
     *
     * @return self
     */
    public function addOnDateCriteria(DateTime $date);

    /**
     * @param DateTime $date
     *
     * @return self
     */
    public function addBeforeDateCriteria(DateTime $date);

    /**
     * @param DateTime $date
     *
     * @return self
     */
    public function addSinceDateCriteria(DateTime $date);

    /**
     * @param \SplString $content
     *
     * @return self
     */
    public function addHasInBodyCriteria(\SplString $content);

    /**
     * @param \SplString $from
     *
     * @return self
     */
    public function addFromCriteria(\SplString $from);

    /**
     * @param \SplString $keyword
     *
     * @return self
     */
    public function addKeywordCriteria(\SplString $keyword);

    /**
     * @param \SplString $keyword
     *
     * @return self
     */
    public function addWithoutKeywordCriteria(\SplString $keyword);

    /**
     * @param \SplString $subject
     *
     * @return self
     */
    public function addSubjectCriteria(\SplString $subject);

    /**
     * @param \SplString $text
     *
     * @return self
     */
    public function addHasTextCriteria(\SplString $text);

    /**
     * @param \SplString $to
     *
     * @return self
     */
    public function addToCriteria(\SplString $to);

    /**
     * @return self
     */
    public function addIsAnsweredCriteria();

    /**
     * @return self
     */
    public function addIsDeletedCriteria();

    /**
     * @return self
     */
    public function addIsFlaggedCriteria();

    /**
     * @return self
     */
    public function addIsRecentCriteria();

    /**
     * @return self
     */
    public function addIsSeenCriteria();

    /**
     * @return self
     */
    public function addIsNewCriteria();

    /**
     * @return self
     */
    public function addIsOldCriteria();

    /**
     * @return self
     */
    public function addIsUnansweredCriteria();

    /**
     * @return self
     */
    public function addIsUndeletedCriteria();

    /**
     * @return self
     */
    public function addIsUnflaggedCriteria();

    /**
     * @return self
     */
    public function addIsUnseenCriteria();
}
