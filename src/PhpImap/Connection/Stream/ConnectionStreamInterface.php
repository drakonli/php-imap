<?php

namespace PhpImap\Connection\Stream;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionStreamInterface
{
    /**
     * @return resource
     */
    public function getImapResource();
}