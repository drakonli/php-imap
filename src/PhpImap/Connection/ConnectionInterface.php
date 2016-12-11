<?php

namespace PhpImap\Connection;

use PhpImap\Connection\Config\ConnectionConfigInterface;
use PhpImap\Connection\Stream\ConnectionStreamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionInterface
{
    /**
     * @return ConnectionConfigInterface
     */
    public function getConfig();

    /**
     * @return ConnectionStreamInterface
     */
    public function getImapStream();
}