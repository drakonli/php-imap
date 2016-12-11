<?php

namespace PhpImap\Mail\Service\Marker\Answered;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Service\Marker\MailMarkerInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface AnsweredMailMarkerInterface extends MailMarkerInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsAnswered(ConnectionStreamInterface $stream, \SplInt $uid);

    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $uid
     *
     * @return bool
     */
    public function markAsUnanswered(ConnectionStreamInterface $stream, \SplInt $uid);
}
