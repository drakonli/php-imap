<?php

namespace PhpImap\Mail\Service\Box\Info\Retriever\Check;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Box\Info\Check\MailBoxCheckInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxCheckInfoRetrieverInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     *
     * @return MailBoxCheckInfoInterface|null
     */
    public function getCheckMailBoxInfo(ConnectionStreamInterface $stream);
}
