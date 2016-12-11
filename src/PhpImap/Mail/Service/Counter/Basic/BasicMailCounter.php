<?php

namespace PhpImap\Mail\Service\Counter\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Service\Counter\MailCounterInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailCounter implements MailCounterInterface
{
    /**
     * @inheritDoc
     */
    public function countMail(ConnectionStreamInterface $stream)
    {
        return imap_num_msg($stream->getImapResource());
    }
}
