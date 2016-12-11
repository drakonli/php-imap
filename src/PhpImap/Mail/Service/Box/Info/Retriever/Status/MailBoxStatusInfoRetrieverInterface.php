<?php

namespace PhpImap\Mail\Service\Box\Info\Retriever\Status;

use PhpImap\Connection\ConnectionInterface;
use PhpImap\Mail\Box\Info\Status\MailBoxStatusInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxStatusInfoRetrieverInterface
{
    /**
     * @param ConnectionInterface $connection
     * @param \SplString          $mailBoxName
     *
     * @return MailBoxStatusInfoInterface|null
     */
    public function getStatusMailBoxInfo(ConnectionInterface $connection, \SplString $mailBoxName);
}
