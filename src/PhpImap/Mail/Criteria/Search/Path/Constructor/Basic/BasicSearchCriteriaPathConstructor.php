<?php

namespace PhpImap\Mail\Criteria\Search\Path\Constructor\Basic;

use PhpImap\Mail\Criteria\Search\Collection\SearchCriteriaCollectionInterface;
use PhpImap\Mail\Criteria\Search\Path\Constructor\SearchCriteriaPathConstructorInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicSearchCriteriaPathConstructor implements SearchCriteriaPathConstructorInterface
{
    /**
     * @inheritDoc
     */
    public function createPath(SearchCriteriaCollectionInterface $searchCriteriaCollection)
    {
        $path = '';

        foreach ($searchCriteriaCollection as $searchCriteria) {
            $path .= sprintf('%s ', $searchCriteria->getKey());

            if (false === $searchCriteria->criteriaHasValue()) {
                continue;
            }

            $path .= sprintf('"%s" ', $searchCriteria->getValue());
        }

        return rtrim($path);
    }
}
