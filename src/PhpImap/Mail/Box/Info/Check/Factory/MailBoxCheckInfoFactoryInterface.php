<?php

namespace PhpImap\Mail\Box\Info\Check\Factory;

use DateTime;
use PhpImap\Mail\Box\Info\Check\MailBoxCheckInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxCheckInfoFactoryInterface
{
    /**
     * @param \SplString $driver
     * @param DateTime   $date
     * @param \SplString $mailBoxName
     * @param \SplInt    $messagesNumber
     * @param \SplInt    $recentMessagesNumber
     *
     * @return MailBoxCheckInfoInterface
     */
    public function createMailBoxCheckInfo(
        \SplString $driver,
        DateTime $date,
        \SplString $mailBoxName,
        \SplInt $messagesNumber,
        \SplInt $recentMessagesNumber
    );
}
