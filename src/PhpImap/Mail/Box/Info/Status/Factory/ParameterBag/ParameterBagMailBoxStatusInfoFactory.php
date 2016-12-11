<?php

namespace PhpImap\Mail\Box\Info\Status\Factory\ParameterBag;

use PhpImap\Mail\Box\Info\Status\Factory\MailBoxStatusInfoFactoryInterface;
use PhpImap\Mail\Box\Info\Status\ParameterBag\ParameterBagMailBoxStatusInfo;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxStatusInfoFactory implements MailBoxStatusInfoFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createMailBoxStatusInfo(
        \SplInt $messagesNumber,
        \SplInt $recentMessagesNumber,
        \SplInt $unreadMessageNumber,
        \SplInt $nextUid,
        \SplString $uidValidityHash
    ) {
        $infoData = [
            ParameterBagMailBoxStatusInfo::FIELD_MESSAGE_NUMBER => $messagesNumber,
            ParameterBagMailBoxStatusInfo::FIELD_RECENT_MESSAGE_NUMBER => $recentMessagesNumber,
            ParameterBagMailBoxStatusInfo::FIELD_UNREAD_MESSAGE_NUMBER => $unreadMessageNumber,
            ParameterBagMailBoxStatusInfo::FIELD_NEXT_UID => $nextUid,
            ParameterBagMailBoxStatusInfo::FIELD_UID_VALIDITY_HASH => $uidValidityHash,
        ];

        return new ParameterBagMailBoxStatusInfo($infoData);
    }
}
