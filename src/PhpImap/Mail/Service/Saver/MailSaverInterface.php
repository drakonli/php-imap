<?php

namespace PhpImap\Mail\Service\Saver;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailSaverInterface
{
    /**
     * @param ConnectionStreamInterface     $stream
     * @param ExchangeOccurredMailInterface $mail
     * @param \SplFileInfo                  $file
     *
     * @return bool
     */
    public function saveMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplFileInfo $file
    );
}
