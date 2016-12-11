<?php

namespace PhpImap\Mail\Exchange\Occurred\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ExchangeOccurredMailCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return ExchangeOccurredMailInterface
     */
    public function current();
}