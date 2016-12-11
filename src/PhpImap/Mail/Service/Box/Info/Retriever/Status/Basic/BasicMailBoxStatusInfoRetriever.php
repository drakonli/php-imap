<?php

namespace PhpImap\Mail\Service\Box\Info\Retriever\Status\Basic;

use PhpImap\Connection\Config\Mail\Box\Builder\MailBoxConnectionConfigBuilderInterface;
use PhpImap\Connection\Config\Mail\Box\Path\Constructor\MailBoxConnectionPathConstructorInterface;
use PhpImap\Connection\ConnectionInterface;
use PhpImap\Mail\Box\Info\Status\Factory\MailBoxStatusInfoFactoryInterface;
use PhpImap\Mail\Service\Box\Info\Retriever\Status\MailBoxStatusInfoRetrieverInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxStatusInfoRetriever implements MailBoxStatusInfoRetrieverInterface
{
    const STATUS_RESULT_PROPERTY_MESSAGES_NUMBER = 'messages';
    const STATUS_RESULT_PROPERTY_RECENT_MESSAGES_NUMBER = 'recent';
    const STATUS_RESULT_PROPERTY_UNREAD_MESSAGES_NUMBER = 'unseen';
    const STATUS_RESULT_PROPERTY_NEXT_UID = 'uidnext';
    const STATUS_RESULT_PROPERTY_UID_VALIDITY = 'uidvalidity';

    /**
     * @var MailBoxConnectionPathConstructorInterface
     */
    private $mailBoxPathConstructor;

    /**
     * @var MailBoxConnectionConfigBuilderInterface
     */
    private $mailBoxConfigBuilder;

    /**
     * @var MailBoxStatusInfoFactoryInterface
     */
    private $mailBoxStatusInfoFactory;

    /**
     * BasicMailBoxStatusInfoRetriever constructor.
     *
     * @param MailBoxConnectionPathConstructorInterface $mailBoxPathConstructor
     * @param MailBoxConnectionConfigBuilderInterface   $mailBoxConfigBuilder
     * @param MailBoxStatusInfoFactoryInterface         $mailBoxStatusInfoFactory
     */
    public function __construct(
        MailBoxConnectionPathConstructorInterface $mailBoxPathConstructor,
        MailBoxConnectionConfigBuilderInterface $mailBoxConfigBuilder,
        MailBoxStatusInfoFactoryInterface $mailBoxStatusInfoFactory
    ) {
        $this->mailBoxPathConstructor = $mailBoxPathConstructor;
        $this->mailBoxConfigBuilder = $mailBoxConfigBuilder;
        $this->mailBoxStatusInfoFactory = $mailBoxStatusInfoFactory;
    }

    /**
     * @inheritDoc
     */
    public function getStatusMailBoxInfo(ConnectionInterface $connection, \SplString $mailBoxName)
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

        $statusResult = imap_status($connection->getImapStream()->getImapResource(), $mailBoxPath, SA_ALL);

        if (false === $statusResult) {
            return null;
        }

        return $this->mailBoxStatusInfoFactory->createMailBoxStatusInfo(
            new \SplInt($statusResult->{self::STATUS_RESULT_PROPERTY_MESSAGES_NUMBER}),
            new \SplInt($statusResult->{self::STATUS_RESULT_PROPERTY_RECENT_MESSAGES_NUMBER}),
            new \SplInt($statusResult->{self::STATUS_RESULT_PROPERTY_UNREAD_MESSAGES_NUMBER}),
            new \SplInt($statusResult->{self::STATUS_RESULT_PROPERTY_NEXT_UID}),
            new \SplString((string)$statusResult->{self::STATUS_RESULT_PROPERTY_UID_VALIDITY})
        );
    }
}
