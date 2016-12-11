<?php

namespace PhpImap\Mail\Service\Counter;

use PhpImap\Connection\Stream\ConnectionStreamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailCounterInterface
{
    /**
     * Counts mails in current mailbox connection
     *
     * @param ConnectionStreamInterface $stream
     *
     * @return \SplInt
     */
    public function countMail(ConnectionStreamInterface $stream);
}
