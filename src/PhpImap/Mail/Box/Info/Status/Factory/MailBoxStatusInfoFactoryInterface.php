<?php

namespace PhpImap\Mail\Box\Info\Status\Factory;

use PhpImap\Mail\Box\Info\Status\MailBoxStatusInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxStatusInfoFactoryInterface
{
    /**
     * @param \SplInt    $messagesNumber
     * @param \SplInt    $recentMessagesNumber
     * @param \SplInt    $unreadMessageNumber
     * @param \SplInt    $nextUid
     * @param \SplString $uidValidityHash
     *
     * @return MailBoxStatusInfoInterface
     */
    public function createMailBoxStatusInfo(
        \SplInt $messagesNumber,
        \SplInt $recentMessagesNumber,
        \SplInt $unreadMessageNumber,
        \SplInt $nextUid,
        \SplString $uidValidityHash
    );
}
