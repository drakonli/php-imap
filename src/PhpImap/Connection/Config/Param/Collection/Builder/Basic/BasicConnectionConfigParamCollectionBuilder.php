<?php

namespace PhpImap\Connection\Config\Param\Collection\Builder\Basic;

use PhpImap\Connection\Config\Param\Basic\BasicConnectionConfigParam;
use PhpImap\Connection\Config\Param\Collection\Basic\BasicConnectionConfigParamCollection;
use PhpImap\Connection\Config\Param\Collection\Builder\ConnectionConfigParamCollectionBuilderInterface;
use PhpImap\Connection\Config\Param\ConnectionConfigParamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionConfigParamCollectionBuilder implements ConnectionConfigParamCollectionBuilderInterface
{
    /**
     * @var array|ConnectionConfigParamInterface[]
     */
    private $params;

    /**
     * @inheritDoc
     */
    public function startBuilding()
    {
        $this->params = [];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getParams()
    {
        return new BasicConnectionConfigParamCollection($this->params);
    }

    /**
     * @inheritDoc
     */
    public function addDisableAuthenticatorParam(\SplString $authenticator)
    {
        $this->params[] = new BasicConnectionConfigParam(
            new \SplString(ConnectionConfigParamInterface::PARAM_DISABLE_AUTHENTICATOR), $authenticator
        );

        return $this;
    }
}
