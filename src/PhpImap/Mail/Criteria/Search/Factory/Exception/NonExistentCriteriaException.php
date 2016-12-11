<?php

namespace PhpImap\Mail\Criteria\Search\Factory\Exception;

use Exception;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class NonExistentCriteriaException extends Exception
{
    /**
     * NonExistentCriteriaException constructor.
     *
     * @param \SplString $name
     */
    public function __construct(\SplString $name)
    {
        parent::__construct(
            sprintf('Tried to create a criteria with non-valid name: %s', $name)
        );
    }
}