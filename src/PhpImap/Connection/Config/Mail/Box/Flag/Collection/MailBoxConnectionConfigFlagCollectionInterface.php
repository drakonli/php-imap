<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\MailBoxConnectionConfigFlagInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxConnectionConfigFlagCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return MailBoxConnectionConfigFlagInterface
     */
    public function current();

    /**
     * @param \SplString $name
     *
     * @return bool
     */
    public function hasFlagWithName(\SplString $name);
}
