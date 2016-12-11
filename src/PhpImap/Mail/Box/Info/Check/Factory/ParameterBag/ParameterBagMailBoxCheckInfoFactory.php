<?php

namespace PhpImap\Mail\Box\Info\Check\Factory\ParameterBag;

use DateTime;
use PhpImap\Mail\Box\Info\Check\Factory\MailBoxCheckInfoFactoryInterface;
use PhpImap\Mail\Box\Info\Check\ParameterBag\ParameterBagMailBoxCheckInfo;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxCheckInfoFactory implements MailBoxCheckInfoFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createMailBoxCheckInfo(
        \SplString $driver,
        DateTime $date,
        \SplString $mailBoxName,
        \SplInt $messagesNumber,
        \SplInt $recentMessagesNumber
    ) {
        $checkInfoData = [
            ParameterBagMailBoxCheckInfo::FIELD_DATE => $date,
            ParameterBagMailBoxCheckInfo::FIELD_DRIVER => $driver,
            ParameterBagMailBoxCheckInfo::FIELD_MAILBOX_PATH => $mailBoxName,
            ParameterBagMailBoxCheckInfo::FIELD_MESSAGE_NUMBER => $messagesNumber,
            ParameterBagMailBoxCheckInfo::FIELD_RECENT_MESSAGE_NUMBER => $recentMessagesNumber,
        ];

        return new ParameterBagMailBoxCheckInfo($checkInfoData);
    }
}
