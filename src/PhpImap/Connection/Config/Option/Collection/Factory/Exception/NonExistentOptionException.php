<?php

namespace PhpImap\Connection\Config\Option\Collection\Factory\Exception;

use Exception;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class NonExistentOptionException extends Exception
{
    /**
     * NonExistentOptionException constructor.
     *
     * @param \SplString $option
     */
    public function __construct(\SplString $option)
    {
        parent::__construct(
            sprintf('Option with value %s does not exist', $option)
        );
    }
}
