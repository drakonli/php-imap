<?php

namespace PhpImap\Connection\Config\Param\Collection\Factory\Exception;

use Exception;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class NonExistentParamException extends Exception
{
    /**
     * BasicConnectionConfigParamCollectionFactoryNonExistentParamException constructor.
     *
     * @param \SplString $paramName
     */
    public function __construct(\SplString $paramName)
    {
        parent::__construct(
            sprintf('Param %s does not exist', $paramName)
        );
    }
}