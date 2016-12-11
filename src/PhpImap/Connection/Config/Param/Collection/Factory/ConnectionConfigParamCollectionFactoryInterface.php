<?php

namespace PhpImap\Connection\Config\Param\Collection\Factory;

use PhpImap\Connection\Config\Param\Collection\ConnectionConfigParamCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigParamCollectionFactoryInterface
{
    /**
     * @param array $params
     * Example: ["DISABLE_AUTHENTICATOR" => "GSSAPI"]
     *
     * @return ConnectionConfigParamCollectionInterface
     */
    public function createParamCollection(array $params);
}
