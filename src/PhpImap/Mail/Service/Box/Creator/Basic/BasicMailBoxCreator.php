<?php

namespace PhpImap\Mail\Service\Box\Creator\Basic;

use PhpImap\Connection\Config\Mail\Box\Builder\MailBoxConnectionConfigBuilderInterface;
use PhpImap\Connection\Config\Mail\Box\Path\Constructor\MailBoxConnectionPathConstructorInterface;
use PhpImap\Connection\ConnectionInterface;
use PhpImap\Mail\Service\Box\Creator\MailBoxCreatorInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxCreator implements MailBoxCreatorInterface
{
    /**
     * @var MailBoxConnectionPathConstructorInterface
     */
    private $mailBoxPathConstructor;

    /**
     * @var MailBoxConnectionConfigBuilderInterface
     */
    private $mailBoxConfigBuilder;

    /**
     * BasicMailBoxCreator constructor.
     *
     * @param MailBoxConnectionPathConstructorInterface $mailBoxPathConstructor
     * @param MailBoxConnectionConfigBuilderInterface   $mailBoxConfigBuilder
     */
    public function __construct(
        MailBoxConnectionPathConstructorInterface $mailBoxPathConstructor,
        MailBoxConnectionConfigBuilderInterface $mailBoxConfigBuilder
    ) {
        $this->mailBoxPathConstructor = $mailBoxPathConstructor;
        $this->mailBoxConfigBuilder = $mailBoxConfigBuilder;
    }

    /**
     * @inheritDoc
     */
    public function createMailBox(ConnectionInterface $connection, \SplString $mailBoxName)
    {
        $connectionMailBoxConfig = $connection->getConfig()->getMailBoxConnectionConfig();

        $this->mailBoxConfigBuilder
            ->startBuilding()
            ->addFlags($connectionMailBoxConfig->getFlags())
            ->addRemoteSystemName($connectionMailBoxConfig->getRemoteSystemName())
            ->addMailBoxName($mailBoxName);

        if (true === $connectionMailBoxConfig->hasPort()) {
            $this->mailBoxConfigBuilder->addPort($connectionMailBoxConfig->getPort());
        }

        $mailBoxConfig = $this->mailBoxConfigBuilder->getMailBoxConnectionConfig();
        $mailBoxPath = $this->mailBoxPathConstructor->constructMailBoxPath($mailBoxConfig);

        return imap_createmailbox($connection->getImapStream()->getImapResource(), $mailBoxPath);
    }
}
