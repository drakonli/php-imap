<?php

namespace PhpImap\Mail\Service\Marker\Read;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Service\Marker\MailMarkerInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ReadMailMarkerInterface extends MailMarkerInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsRead(ConnectionStreamInterface $stream, \SplInt $uid);

    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsUnRead(ConnectionStreamInterface $stream, \SplInt $uid);
}
