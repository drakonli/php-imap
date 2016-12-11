<?php

namespace PhpImap\Mail\Service\Box\Info\Retriever\Complete\Basic;

use DateTime;
use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Box\Info\Complete\Factory\MailBoxCompleteInfoFactoryInterface;
use PhpImap\Mail\Service\Box\Info\Retriever\Complete\MailBoxCompleteInfoRetrieverInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxCompleteInfoRetriever implements MailBoxCompleteInfoRetrieverInterface
{
    const MAILBOX_INFO_RESULT_PROPERTY_DATE = 'Date';
    const MAILBOX_INFO_RESULT_PROPERTY_DRIVER = 'Driver';
    const MAILBOX_INFO_RESULT_PROPERTY_MAILBOX = 'Mailbox';
    const MAILBOX_INFO_RESULT_PROPERTY_MESSAGES_NUMBER = 'Nmsgs';
    const MAILBOX_INFO_RESULT_PROPERTY_UNREAD_MESSAGES_NUMBER = 'Unread';
    const MAILBOX_INFO_RESULT_PROPERTY_RECENT_MESSAGES_NUMBER = 'Recent';
    const MAILBOX_INFO_RESULT_PROPERTY_DELETED_MESSAGES_NUMBER = 'Deleted';
    const MAILBOX_INFO_RESULT_PROPERTY_MAIL_BOX_SIZE = 'Size';

    /**
     * @var MailBoxCompleteInfoFactoryInterface
     */
    private $infoFactory;

    /**
     * BasicMailBoxCompleteInfoRetriever constructor.
     *
     * @param MailBoxCompleteInfoFactoryInterface $infoFactory
     */
    public function __construct(MailBoxCompleteInfoFactoryInterface $infoFactory)
    {
        $this->infoFactory = $infoFactory;
    }

    /**
     * @inheritDoc
     */
    public function getCompleteMailBoxInfo(ConnectionStreamInterface $stream)
    {
        $mailBoxInfoResult = imap_mailboxmsginfo($stream->getImapResource());

        if (false === $mailBoxInfoResult) {
            return null;
        }

        return $this->infoFactory->createCompleteMailBoxInfo(
            new \SplString($mailBoxInfoResult->{self::MAILBOX_INFO_RESULT_PROPERTY_DRIVER}),
            new DateTime($mailBoxInfoResult->{self::MAILBOX_INFO_RESULT_PROPERTY_DATE}),
            new \SplString($mailBoxInfoResult->{self::MAILBOX_INFO_RESULT_PROPERTY_MAILBOX}),
            new \SplInt($mailBoxInfoResult->{self::MAILBOX_INFO_RESULT_PROPERTY_MESSAGES_NUMBER}),
            new \SplInt($mailBoxInfoResult->{self::MAILBOX_INFO_RESULT_PROPERTY_RECENT_MESSAGES_NUMBER}),
            new \SplInt($mailBoxInfoResult->{self::MAILBOX_INFO_RESULT_PROPERTY_UNREAD_MESSAGES_NUMBER}),
            new \SplInt($mailBoxInfoResult->{self::MAILBOX_INFO_RESULT_PROPERTY_DELETED_MESSAGES_NUMBER}),
            new \SplInt($mailBoxInfoResult->{self::MAILBOX_INFO_RESULT_PROPERTY_MAIL_BOX_SIZE})
        );
    }
}
