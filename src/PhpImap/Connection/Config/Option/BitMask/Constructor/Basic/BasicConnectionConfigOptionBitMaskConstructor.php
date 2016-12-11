<?php

namespace PhpImap\Connection\Config\Option\BitMask\Constructor\Basic;

use PhpImap\Connection\Config\Option\BitMask\Constructor\ConnectionConfigOptionBitMaskConstructorInterface;
use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionConfigOptionBitMaskConstructor implements ConnectionConfigOptionBitMaskConstructorInterface
{
    /**
     * @inheritDoc
     */
    public function createOptionsBitMask(ConnectionConfigOptionCollectionInterface $options)
    {
        $optionsBitMask = 0;

        foreach ($options as $option) {
            $optionsBitMask |= $option->getValue();
        }

        return new \SplInt($optionsBitMask);
    }
}