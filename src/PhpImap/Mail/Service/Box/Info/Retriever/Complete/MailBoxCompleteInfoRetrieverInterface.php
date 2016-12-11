<?php

namespace PhpImap\Mail\Service\Box\Info\Retriever\Complete;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Box\Info\Complete\MailBoxCompleteInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxCompleteInfoRetrieverInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     *
     * This method could be very slow depending on implementation
     *
     * @return MailBoxCompleteInfoInterface|null
     */
    public function getCompleteMailBoxInfo(ConnectionStreamInterface $stream);
}
