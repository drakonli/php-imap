<?php

namespace PhpImap\Mail\Exchange\Occurred\Collection\Factory;

use PhpImap\Mail\Exchange\Occurred\Collection\ExchangeOccurredMailCollectionInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ExchangeOccurredMailCollectionFactoryInterface
{
    /**
     * @param array|ExchangeOccurredMailInterface $mails
     *
     * @return ExchangeOccurredMailCollectionInterface
     */
    public function createCollection(array $mails);
}
