<?php

namespace PhpImap\Connection\Config\Mail\Box;

use PhpImap\Connection\Config\Mail\Box\Flag\Collection\MailBoxConnectionConfigFlagCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxConnectionConfigInterface
{
    /**
     * Example: mail.somedomain.com
     *
     * @return \SplString
     */
    public function getRemoteSystemName();

    /**
     * @return \SplInt
     */
    public function getPort();

    /**
     * @return bool
     */
    public function hasPort();

    /**
     * Example: INBOX, OUTBOX, etc.
     *
     * @return \SplString
     */
    public function getMailBoxName();

    /**
     * Example: /ssl/imap/etc.
     *
     * @return MailBoxConnectionConfigFlagCollectionInterface
     */
    public function getFlags();
}
