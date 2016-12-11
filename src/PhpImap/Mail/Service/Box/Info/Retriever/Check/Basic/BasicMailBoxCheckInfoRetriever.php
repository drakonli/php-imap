<?php

namespace PhpImap\Mail\Service\Box\Info\Retriever\Check\Basic;

use DateTime;
use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Box\Info\Check\Factory\MailBoxCheckInfoFactoryInterface;
use PhpImap\Mail\Service\Box\Info\Retriever\Check\MailBoxCheckInfoRetrieverInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxCheckInfoRetriever implements MailBoxCheckInfoRetrieverInterface
{
    const CHECKING_RESULT_PROPERTY_DATE = 'Date';
    const CHECKING_RESULT_PROPERTY_DRIVER = 'Driver';
    const CHECKING_RESULT_PROPERTY_MAILBOX = 'Mailbox';
    const CHECKING_RESULT_PROPERTY_MESSAGES_NUMBER = 'Nmsgs';
    const CHECKING_RESULT_PROPERTY_RECENT_MESSAGES_NUMBER = 'Recent';

    /**
     * @var MailBoxCheckInfoFactoryInterface
     */
    private $mailBoMailBoxCheckInfoFactory;

    /**
     * BasicMailBoxCheckInfoRetriever constructor.
     *
     * @param MailBoxCheckInfoFactoryInterface $mailBoMailBoxCheckInfoFactory
     */
    public function __construct(MailBoxCheckInfoFactoryInterface $mailBoMailBoxCheckInfoFactory)
    {
        $this->mailBoMailBoxCheckInfoFactory = $mailBoMailBoxCheckInfoFactory;
    }

    /**
     * @inheritDoc
     */
    public function getCheckMailBoxInfo(ConnectionStreamInterface $stream)
    {
        $checkResult = imap_check($stream->getImapResource());

        if (false === $checkResult) {
            return null;
        }

        return $this->mailBoMailBoxCheckInfoFactory->createMailBoxCheckInfo(
            new \SplString($checkResult->{self::CHECKING_RESULT_PROPERTY_DRIVER}),
            new DateTime($checkResult->{self::CHECKING_RESULT_PROPERTY_DATE}),
            new \SplString($checkResult->{self::CHECKING_RESULT_PROPERTY_MAILBOX}),
            new \SplInt($checkResult->{self::CHECKING_RESULT_PROPERTY_MESSAGES_NUMBER}),
            new \SplInt($checkResult->{self::CHECKING_RESULT_PROPERTY_RECENT_MESSAGES_NUMBER})
        );
    }
}
