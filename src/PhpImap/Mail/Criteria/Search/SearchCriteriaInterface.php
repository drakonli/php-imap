<?php

namespace PhpImap\Mail\Criteria\Search;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface SearchCriteriaInterface
{
    /**
     * @return \SplString
     */
    public function getKey();

    /**
     * @return \SplString
     */
    public function getValue();

    /**
     * @return bool
     */
    public function criteriaHasValue();
}
