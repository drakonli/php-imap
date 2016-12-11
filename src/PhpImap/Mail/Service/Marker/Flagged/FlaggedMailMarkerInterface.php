<?php

namespace PhpImap\Mail\Service\Marker\Flagged;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Service\Marker\MailMarkerInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface FlaggedMailMarkerInterface extends MailMarkerInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsFlagged(ConnectionStreamInterface $stream, \SplInt $uid);

    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsUnflagged(ConnectionStreamInterface $stream, \SplInt $uid);
}
