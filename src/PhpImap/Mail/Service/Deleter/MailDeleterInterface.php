<?php

namespace PhpImap\Mail\Service\Deleter;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\Collection\ExchangeOccurredMailCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailDeleterInterface
{
    /**
     * Expunge mail marked for deletion
     *
     * @param ConnectionStreamInterface $stream
     *
     * @return bool
     */
    public function deleteMarkedMails(ConnectionStreamInterface $stream);

    /**
     * This function will mark mails for deletion and expunge the mailbox
     *
     * @param ConnectionStreamInterface               $stream
     * @param ExchangeOccurredMailCollectionInterface $mails
     *
     * @return bool
     */
    public function markAndDeleteMails(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailCollectionInterface $mails
    );
}
