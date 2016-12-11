<?php

namespace PhpImap\Mail\Box\Info\Complete\Factory;

use DateTime;
use PhpImap\Mail\Box\Info\Complete\MailBoxCompleteInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxCompleteInfoFactoryInterface
{
    /**
     * @param \SplString $driver
     * @param DateTime   $date
     * @param \SplString $mailBoxName
     * @param \SplInt    $messagesNumber
     * @param \SplInt    $recentMessagesNumber
     * @param \SplInt    $unreadMessageNumber
     * @param \SplInt    $deletedMessageNumber
     * @param \SplInt    $mailBoxSize
     *
     * @return MailBoxCompleteInfoInterface
     */
    public function createCompleteMailBoxInfo(
        \SplString $driver,
        DateTime $date,
        \SplString $mailBoxName,
        \SplInt $messagesNumber,
        \SplInt $recentMessagesNumber,
        \SplInt $unreadMessageNumber,
        \SplInt $deletedMessageNumber,
        \SplInt $mailBoxSize
    );
}
