<?php

namespace PhpImap\Mail\Service\Copier;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailCopierInterface
{
    /**
     * @param ConnectionStreamInterface     $stream
     * @param ExchangeOccurredMailInterface $mail
     * @param \SplString                    $mailBoxName
     *
     * @return bool
     */
    public function copyMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplString $mailBoxName
    );
}
