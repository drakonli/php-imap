<?php

namespace PhpImap\Connection\Stream\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionStream implements ConnectionStreamInterface
{
    /**
     * @var resource
     */
    private $imapResource;

    /**
     * BasicConnectionStream constructor.
     *
     * @param resource $imapResource
     */
    public function __construct($imapResource)
    {
        $this->imapResource = $imapResource;
    }

    /**
     * @inheritDoc
     */
    public function getImapResource()
    {
        return $this->imapResource;
    }
}