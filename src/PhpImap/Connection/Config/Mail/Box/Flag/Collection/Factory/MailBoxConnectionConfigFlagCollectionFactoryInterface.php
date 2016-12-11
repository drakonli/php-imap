<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Collection\Factory;

use PhpImap\Connection\Config\Mail\Box\Flag\Collection\MailBoxConnectionConfigFlagCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxConnectionConfigFlagCollectionFactoryInterface
{
    /**
     * @param array $flags ["ssl", "tls", "service" => "imap", "user" => "someuser", etc.]
     *
     * @return MailBoxConnectionConfigFlagCollectionInterface
     */
    public function createFlags(array $flags);
}
