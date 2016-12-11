<?php

namespace PhpImap\Connection\Config\Option\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Connection\Config\Option\ConnectionConfigOptionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigOptionCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return ConnectionConfigOptionInterface
     */
    public function current();

    /**
     * @param \SplInt $value
     *
     * @return bool
     */
    public function hasOptionWithValue(\SplInt $value);
}
