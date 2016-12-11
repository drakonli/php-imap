<?php

namespace PhpImap\Mail\Service\Box\Creator;

use PhpImap\Connection\ConnectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxCreatorInterface
{
    /**
     * Create a mailbox for current user.
     * Name of the mailbox should be divided by point if you want to create a subMailbox inside an existing mailbox
     *
     * MailBoxName Example: INBOX, INBOX.SUB_MAILBOX_NAME, ROOT_BOX.SUB_BOX.ANOTHER_SUB_BOX
     *
     *
     * @param ConnectionInterface $connection
     * @param \SplString          $mailBoxName
     *
     * @return bool
     */
    public function createMailBox(ConnectionInterface $connection, \SplString $mailBoxName);
}
