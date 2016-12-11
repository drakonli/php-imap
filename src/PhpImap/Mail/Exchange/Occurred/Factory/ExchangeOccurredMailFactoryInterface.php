<?php

namespace PhpImap\Mail\Exchange\Occurred\Factory;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ExchangeOccurredMailFactoryInterface
{
    /**
     * @param ConnectionStreamInterface $stream
     * @param \SplInt                   $mailId
     *
     * @return ExchangeOccurredMailInterface
     */
    public function createMail(ConnectionStreamInterface $stream, \SplInt $mailId);
}