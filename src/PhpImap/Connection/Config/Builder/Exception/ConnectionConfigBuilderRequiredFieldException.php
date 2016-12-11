<?php

namespace PhpImap\Connection\Config\Builder\Exception;

use Exception;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ConnectionConfigBuilderRequiredFieldException extends Exception
{
    /**
     * ConnectionConfigBuilderRequiredFieldException constructor.
     *
     * @param \SplString $field
     */
    public function __construct(\SplString $field)
    {
        parent::__construct(
            sprintf('Required field %s was not passed to config', $field)
        );
    }
}
