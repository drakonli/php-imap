<?php

namespace PhpImap\Mail\Criteria\Search\Collection\Builder\Basic;

use DateTime;
use PhpImap\Mail\Criteria\Search\Collection\Basic\BasicSearchCriteriaCollection;
use PhpImap\Mail\Criteria\Search\Collection\Builder\SearchCriteriaCollectionBuilderInterface;
use PhpImap\Mail\Criteria\Search\Factory\SearchCriteriaFactoryInterface;
use PhpImap\Mail\Criteria\Search\SearchCriteriaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicSearchCriteriaCollectionBuilder implements SearchCriteriaCollectionBuilderInterface
{
    /**
     * @var SearchCriteriaFactoryInterface
     */
    private $searchCriteriaFactory;

    /**
     * @var SearchCriteriaInterface[]|array
     */
    private $searchCriterias;

    /**
     * BasicSearchCriteriaCollectionBuilder constructor.
     *
     * @param SearchCriteriaFactoryInterface $searchCriteriaFactory
     */
    public function __construct(SearchCriteriaFactoryInterface $searchCriteriaFactory)
    {
        $this->searchCriteriaFactory = $searchCriteriaFactory;
    }

    /**
     * @inheritDoc
     */
    public function startBuilding()
    {
        $this->searchCriterias = [];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getSearchCriteriaCollection()
    {
        return new BasicSearchCriteriaCollection($this->searchCriterias);
    }

    /**
     * @inheritDoc
     */
    public function addBccCriteria(\SplString $bcc)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_BCC),
            $bcc
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addOnDateCriteria(DateTime $date)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_ON),
            new \SplString($date->format(SearchCriteriaFactoryInterface::DATE_CRITERIA_FORMAT))
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addBeforeDateCriteria(DateTime $date)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_BEFORE_DATE),
            new \SplString($date->format(SearchCriteriaFactoryInterface::DATE_CRITERIA_FORMAT))
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSinceDateCriteria(DateTime $date)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_SINCE),
            new \SplString($date->format(SearchCriteriaFactoryInterface::DATE_CRITERIA_FORMAT))
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addHasInBodyCriteria(\SplString $content)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_HAS_IN_BODY),
            $content
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addFromCriteria(\SplString $from)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_FROM),
            $from
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addKeywordCriteria(\SplString $keyword)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_KEYWORD),
            $keyword
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addWithoutKeywordCriteria(\SplString $keyword)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_KEYWORD),
            $keyword
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSubjectCriteria(\SplString $subject)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_SUBJECT),
            $subject
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addHasTextCriteria(\SplString $text)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_TEXT),
            $text
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addToCriteria(\SplString $to)
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteriaWithValue(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_WITH_VALUE_TO),
            $to
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsAnsweredCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_ANSWERED)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsDeletedCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_DELETED)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsFlaggedCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_FLAGGED)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsRecentCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_RECENT)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsSeenCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_SEEN)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsNewCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_NEW)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsOldCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_OLD)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsUnansweredCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_UNANSWERED)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsUndeletedCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_UNDELETED)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsUnflaggedCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_UNFLAGGED)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addIsUnseenCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_UNSEEN)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addFindAllCriteria()
    {
        $this->searchCriterias[] = $this->searchCriteriaFactory->createCriteria(
            new \SplString(SearchCriteriaFactoryInterface::CRITERIA_ALL)
        );

        return $this;
    }
}
