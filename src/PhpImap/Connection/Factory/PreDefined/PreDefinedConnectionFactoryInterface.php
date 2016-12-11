<?php

namespace PhpImap\Connection\Factory\PreDefined;

use PhpImap\Connection\ConnectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface PreDefinedConnectionFactoryInterface
{
    /**
     * @return ConnectionInterface
     */
    public function createConnection();
}
