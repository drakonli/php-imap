<?php

namespace PhpImap\Connection\Config\Mail\Box\Builder\Exception;

use Exception;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class MailBoxConnectionConfigBuilderRequiredFieldException extends Exception
{
    /**
     * MailBoxConnectionConfigBuilderRequiredFieldException constructor.
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
