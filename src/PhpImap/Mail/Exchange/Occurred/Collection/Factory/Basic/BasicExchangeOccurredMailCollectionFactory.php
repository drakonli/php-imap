<?php

namespace PhpImap\Mail\Exchange\Occurred\Collection\Factory\Basic;

use PhpImap\Mail\Exchange\Occurred\Collection\Basic\BasicExchangeOccurredMailCollection;
use PhpImap\Mail\Exchange\Occurred\Collection\Factory\ExchangeOccurredMailCollectionFactoryInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicExchangeOccurredMailCollectionFactory implements ExchangeOccurredMailCollectionFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createCollection(array $mails)
    {
        return new BasicExchangeOccurredMailCollection($mails);
    }
}
