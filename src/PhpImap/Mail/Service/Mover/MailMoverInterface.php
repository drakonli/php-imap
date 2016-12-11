<?php

namespace PhpImap\Mail\Service\Mover;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailMoverInterface
{
    /**
     * @param ConnectionStreamInterface     $stream
     * @param ExchangeOccurredMailInterface $mail
     * @param \SplString                    $mailBoxName
     *
     * @return bool
     */
    public function moveMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplString $mailBoxName
    );
}
