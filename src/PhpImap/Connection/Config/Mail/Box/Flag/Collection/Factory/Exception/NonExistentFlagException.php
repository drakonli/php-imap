<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Collection\Factory\Exception;

use Exception;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class NonExistentFlagException extends Exception
{
    /**
     * NonExistentFlagException constructor.
     *
     * @param \SplString $flag
     */
    public function __construct(\SplString $flag)
    {
        parent::__construct(
            sprintf('Flag %s does not exist', $flag)
        );
    }
}