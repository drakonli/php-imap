<?php

namespace PhpImap\Mail\Service\Marker\Composed\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Service\Marker\Composed\ComposedMailMarkerInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ComposedBasicMailMarker implements ComposedMailMarkerInterface
{
    /**
     * @inheritDoc
     */
    public function markAsRead(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_setflag_full($stream->getImapResource(), (int)$uid, '\\Seen', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsAnswered(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_setflag_full($stream->getImapResource(), (int)$uid, '\\Answered', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsFlagged(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_setflag_full($stream->getImapResource(), (int)$uid, '\\Flagged', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsDeleted(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_setflag_full($stream->getImapResource(), (int)$uid, '\\Deleted', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsDrafted(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_setflag_full($stream->getImapResource(), (int)$uid, '\\Draft', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsUnread(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_clearflag_full($stream->getImapResource(), (int)$uid, '\\Seen', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsUnanswered(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_clearflag_full($stream->getImapResource(), (int)$uid, '\\Answered', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsUnflagged(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_clearflag_full($stream->getImapResource(), (int)$uid, '\\Flagged', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsUndeleted(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_clearflag_full($stream->getImapResource(), (int)$uid, '\\Deleted', ST_UID);
    }

    /**
     * @inheritDoc
     */
    public function markAsUnDrafted(ConnectionStreamInterface $stream, \SplInt $uid)
    {
        return imap_clearflag_full($stream->getImapResource(), (int)$uid, '\\Draft', ST_UID);
    }
}
