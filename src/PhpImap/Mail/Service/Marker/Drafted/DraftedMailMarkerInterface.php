<?php

namespace PhpImap\Mail\Service\Marker\Drafted;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Service\Marker\MailMarkerInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface DraftedMailMarkerInterface extends MailMarkerInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsDrafted(ConnectionStreamInterface $stream, \SplInt $uid);

    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsUnDrafted(ConnectionStreamInterface $stream, \SplInt $uid);
}
