<?php

namespace PhpImap\Mail\Service\Deleter\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\Collection\ExchangeOccurredMailCollectionInterface;
use PhpImap\Mail\Service\Deleter\MailDeleterInterface;
use PhpImap\Mail\Service\Marker\Deleted\DeletedMailMarkerInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailDeleter implements MailDeleterInterface
{
    /**
     * @var DeletedMailMarkerInterface
     */
    private $deletedMailMarker;

    /**
     * BasicMailDeleter constructor.
     *
     * @param DeletedMailMarkerInterface $deletedMailMarker
     */
    public function __construct(DeletedMailMarkerInterface $deletedMailMarker)
    {
        $this->deletedMailMarker = $deletedMailMarker;
    }

    /**
     * @inheritDoc
     */
    public function deleteMarkedMails(ConnectionStreamInterface $stream)
    {
        return imap_expunge($stream->getImapResource());
    }

    /**
     * @inheritDoc
     */
    public function markAndDeleteMails(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailCollectionInterface $mails
    ) {
        foreach ($mails as $mail) {
            $this->deletedMailMarker->markAsDeleted($stream, $mail->getUid());
        }

        return imap_expunge($stream->getImapResource());
    }
}
