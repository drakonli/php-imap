<?php

namespace PhpImap\Connection\Basic;

use PhpImap\Connection\Config\ConnectionConfigInterface;
use PhpImap\Connection\Config\Option\ConnectionConfigOptionInterface;
use PhpImap\Connection\ConnectionInterface;
use PhpImap\Connection\Stream\ConnectionStreamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnection implements ConnectionInterface
{
    /**
     * @var ConnectionConfigInterface
     */
    private $config;

    /**
     * @var ConnectionStreamInterface
     */
    private $imapStream;

    /**
     * BasicConnection constructor.
     *
     * @param ConnectionConfigInterface $config
     * @param ConnectionStreamInterface $imapStream
     */
    public function __construct(ConnectionConfigInterface $config, ConnectionStreamInterface $imapStream)
    {
        $this->config = $config;
        $this->imapStream = $imapStream;
    }

    public function __destruct()
    {
        if (null === $this->imapStream || false === is_resource($this->imapStream->getImapResource())) {
            return;
        }

        $expunge = $this->config->getOptions()->hasOptionWithValue(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_DELETE_MAIL_MARKED_FOR_DELETION_UPON_DISCONNECT)
        );

        $options = true === $expunge ?
            ConnectionConfigOptionInterface::OPTION_DELETE_MAIL_MARKED_FOR_DELETION_UPON_DISCONNECT : 0;

        imap_close($this->imapStream->getImapResource(), $options);
    }

    /**
     * @inheritDoc
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @inheritDoc
     */
    public function getImapStream()
    {
        return $this->imapStream;
    }
}
