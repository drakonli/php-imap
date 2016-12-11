<?php

namespace PhpImap\Mail\Service\Marker\Deleted;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Service\Marker\MailMarkerInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface DeletedMailMarkerInterface extends MailMarkerInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsDeleted(ConnectionStreamInterface $stream, \SplInt $uid);

    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsUndeleted(ConnectionStreamInterface $stream, \SplInt $uid);
}
