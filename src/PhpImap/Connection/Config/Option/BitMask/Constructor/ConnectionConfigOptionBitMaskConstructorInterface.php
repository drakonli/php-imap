<?php

namespace PhpImap\Connection\Config\Option\BitMask\Constructor;

use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigOptionBitMaskConstructorInterface
{
    /**
     * @param ConnectionConfigOptionCollectionInterface $options
     *
     * @return \SplInt
     */
    public function createOptionsBitMask(ConnectionConfigOptionCollectionInterface $options);
}