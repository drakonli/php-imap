<?php

namespace PhpImap\Mail\Criteria\Search\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Mail\Criteria\Search\Collection\SearchCriteriaCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicSearchCriteriaCollection extends AbstractBasicImmutableCollection implements SearchCriteriaCollectionInterface
{
    /**
     * BasicSearchCriteriaCollection constructor.
     *
     * @param array $searchCriterias
     */
    public function __construct(array $searchCriterias)
    {
        parent::__construct($searchCriterias);
    }
}