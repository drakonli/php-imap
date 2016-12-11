<?php

namespace PhpImap\Mail\Box\Info\Complete\Factory\Basic\ParameterBag;

use DateTime;
use PhpImap\Mail\Box\Info\Complete\Factory\MailBoxCompleteInfoFactoryInterface;
use PhpImap\Mail\Box\Info\Complete\ParameterBag\ParameterBagMailBoxCompleteInfo;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxCompleteInfoFactory implements MailBoxCompleteInfoFactoryInterface
{
    /**
     * @inheritDoc
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
    ) {
        $mailBoxInfo = [
            ParameterBagMailBoxCompleteInfo::FIELD_DATE => $date,
            ParameterBagMailBoxCompleteInfo::FIELD_DRIVER => $driver,
            ParameterBagMailBoxCompleteInfo::FIELD_MAILBOX_PATH => $mailBoxName,
            ParameterBagMailBoxCompleteInfo::FIELD_MESSAGE_NUMBER => $messagesNumber,
            ParameterBagMailBoxCompleteInfo::FIELD_RECENT_MESSAGE_NUMBER => $recentMessagesNumber,
            ParameterBagMailBoxCompleteInfo::FIELD_UNREAD_MESSAGE_NUMBER => $unreadMessageNumber,
            ParameterBagMailBoxCompleteInfo::FIELD_DELETED_MESSAGE_NUMBER => $deletedMessageNumber,
            ParameterBagMailBoxCompleteInfo::FIELD_MAIL_SIZE => $mailBoxSize,
        ];

        return new ParameterBagMailBoxCompleteInfo($mailBoxInfo);
    }
}
