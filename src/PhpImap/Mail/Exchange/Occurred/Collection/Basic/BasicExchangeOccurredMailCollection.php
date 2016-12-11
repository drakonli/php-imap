<?php

namespace PhpImap\Mail\Exchange\Occurred\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Mail\Exchange\Occurred\Collection\ExchangeOccurredMailCollectionInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicExchangeOccurredMailCollection extends AbstractBasicImmutableCollection implements ExchangeOccurredMailCollectionInterface
{
    /**
     * BasicExchangeOccurredMailCollection constructor.
     *
     * @param array|ExchangeOccurredMailInterface[] $mails
     */
    public function __construct(array $mails)
    {
        parent::__construct($mails);
    }
}