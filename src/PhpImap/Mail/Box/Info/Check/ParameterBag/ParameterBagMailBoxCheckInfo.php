<?php

namespace PhpImap\Mail\Box\Info\Check\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Box\Info\Check\MailBoxCheckInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxCheckInfo extends AbstractBasicImmutableParameterBag implements MailBoxCheckInfoInterface
{
    const FIELD_DATE = 'date';
    const FIELD_DRIVER = 'driver';
    const FIELD_MAILBOX_PATH = 'mail_box_path';
    const FIELD_MESSAGE_NUMBER = 'message_number';
    const FIELD_RECENT_MESSAGE_NUMBER = 'recent_message_number';

    /**
     * @inheritDoc
     */
    public function getDate()
    {
        return $this->get(self::FIELD_DATE);
    }

    /**
     * @inheritDoc
     */
    public function getDriver()
    {
        return $this->get(self::FIELD_DRIVER);
    }

    /**
     * @inheritDoc
     */
    public function getMailBoxPath()
    {
        return $this->get(self::FIELD_MAILBOX_PATH);
    }

    /**
     * @inheritDoc
     */
    public function getMessageNumber()
    {
        return $this->get(self::FIELD_MESSAGE_NUMBER);
    }

    /**
     * @inheritDoc
     */
    public function getRecentMessageNumber()
    {
        return $this->get(self::FIELD_RECENT_MESSAGE_NUMBER);
    }
}
