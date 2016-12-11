<?php

namespace PhpImap\Mail\Service\Box\Quota\Retriever;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Box\Quota\MailBoxQuotaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxQuotaRetrieverInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplString                $mailBoxName
     *
     * @return MailBoxQuotaInterface|null
     */
    public function getMailBoxQuotaForCurrentUser(ConnectionStreamInterface $stream, \SplString $mailBoxName);
}
