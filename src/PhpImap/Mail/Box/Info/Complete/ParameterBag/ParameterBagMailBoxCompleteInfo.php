<?php

namespace PhpImap\Mail\Box\Info\Complete\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Box\Info\Complete\MailBoxCompleteInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxCompleteInfo extends AbstractBasicImmutableParameterBag implements MailBoxCompleteInfoInterface
{
    const FIELD_DATE = 'date';
    const FIELD_DRIVER = 'driver';
    const FIELD_MAILBOX_PATH = 'mail_box_path';
    const FIELD_MAIL_SIZE = 'mail_box_size';
    const FIELD_MESSAGE_NUMBER = 'message_number';
    const FIELD_RECENT_MESSAGE_NUMBER = 'recent_message_number';
    const FIELD_UNREAD_MESSAGE_NUMBER = 'unread_message_number';
    const FIELD_DELETED_MESSAGE_NUMBER = 'deleted_message_number';

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
    public function getDeletedMessageNumber()
    {
        return $this->get(self::FIELD_DELETED_MESSAGE_NUMBER);
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
        return $this->get(self::FIELD_DATE);
    }

    /**
     * @inheritDoc
     */
    public function getMailBoxSize()
    {
        return $this->get(self::FIELD_MAIL_SIZE);
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

    /**
     * @inheritDoc
     */
    public function getUnreadMessageNumber()
    {
        return $this->get(self::FIELD_UNREAD_MESSAGE_NUMBER);
    }
}
