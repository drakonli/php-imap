<?php

namespace PhpImap\Mail\Exchange\Occurred\Builder\Director;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\Builder\ExchangeOccurredMailBuilderInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ExchangeOccurredMailBuilderDirectorInterface
{
    /**
     * @param ExchangeOccurredMailBuilderInterface $builder
     * @param \SplInt                              $mailId
     * @param ConnectionStreamInterface            $stream
     *
     * @return ExchangeOccurredMailInterface
     */
    public function buildMail(
        ExchangeOccurredMailBuilderInterface $builder,
        \SplInt $mailId,
        ConnectionStreamInterface $stream
    );
}