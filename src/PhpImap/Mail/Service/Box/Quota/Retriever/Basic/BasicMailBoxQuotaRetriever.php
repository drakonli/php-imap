<?php

namespace PhpImap\Mail\Service\Box\Quota\Retriever\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Box\Quota\Factory\MailBoxQuotaFactoryInterface;
use PhpImap\Mail\Service\Box\Quota\Retriever\MailBoxQuotaRetrieverInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxQuotaRetriever implements MailBoxQuotaRetrieverInterface
{
    const QUOTA_RESULT_ROOT_FIELD = 'STORAGE';
    const QUOTA_RESULT_SUB_FIELD_USAGE = 'usage';
    const QUOTA_RESULT_SUB_FIELD_LIMIT = 'limit';

    /**
     * @var MailBoxQuotaFactoryInterface
     */
    private $quotaFactory;

    /**
     * BasicMailBoxQuotaRetriever constructor.
     *
     * @param MailBoxQuotaFactoryInterface $quotaFactory
     */
    public function __construct(MailBoxQuotaFactoryInterface $quotaFactory)
    {
        $this->quotaFactory = $quotaFactory;
    }

    /**
     * @inheritDoc
     */
    public function getMailBoxQuotaForCurrentUser(ConnectionStreamInterface $stream, \SplString $mailBoxName)
    {
        $quotaData = imap_get_quotaroot($stream->getImapResource(), (string)$mailBoxName);

        if (false === $quotaData
            || false === is_array($quotaData)
            || false === array_key_exists(self::QUOTA_RESULT_ROOT_FIELD, $quotaData)
        ) {
            return null;
        }

        return $this->quotaFactory->createQuota(
            new \SplInt($quotaData[self::QUOTA_RESULT_ROOT_FIELD][self::QUOTA_RESULT_SUB_FIELD_USAGE]),
            new \SplInt($quotaData[self::QUOTA_RESULT_ROOT_FIELD][self::QUOTA_RESULT_SUB_FIELD_LIMIT])
        );
    }
}
