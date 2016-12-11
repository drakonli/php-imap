<?php

namespace PhpImap\Connection\Config\Param\Collection\Factory\Basic;

use PhpImap\Connection\Config\Param\Basic\BasicConnectionConfigParam;
use PhpImap\Connection\Config\Param\Collection\Basic\BasicConnectionConfigParamCollection;
use PhpImap\Connection\Config\Param\Collection\Factory\ConnectionConfigParamCollectionFactoryInterface;
use PhpImap\Connection\Config\Param\Collection\Factory\Exception\NonExistentParamException;
use PhpImap\Connection\Config\Param\ConnectionConfigParamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionConfigParamCollectionFactory implements ConnectionConfigParamCollectionFactoryInterface
{
    /**
     * @var array
     */
    private $possibleParams = [ConnectionConfigParamInterface::PARAM_DISABLE_AUTHENTICATOR];

    /**
     * @inheritDoc
     */
    public function createParamCollection(array $params)
    {
        $paramObjects = [];

        foreach ($params as $paramName => $paramValue) {
            if (false === in_array($paramName, $this->possibleParams)) {
                throw new NonExistentParamException(new \SplString($paramName));
            }

            $paramObjects[] = new BasicConnectionConfigParam(
                new \SplString($paramName), new \SplString($paramValue)
            );
        }

        return new BasicConnectionConfigParamCollection($paramObjects);
    }
}
