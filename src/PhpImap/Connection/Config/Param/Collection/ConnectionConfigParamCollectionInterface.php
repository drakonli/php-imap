<?php

namespace PhpImap\Connection\Config\Param\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Connection\Config\Param\ConnectionConfigParamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigParamCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return ConnectionConfigParamInterface
     */
    public function current();

    /**
     * @param \SplString $name
     *
     * @return bool
     */
    public function hasParamWithName(\SplString $name);
}
