<?php

namespace PhpImap\Mail\Box\Info\Status\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Box\Info\Status\MailBoxStatusInfoInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxStatusInfo extends AbstractBasicImmutableParameterBag implements MailBoxStatusInfoInterface
{
    const FIELD_MESSAGE_NUMBER = 'message_number';
    const FIELD_RECENT_MESSAGE_NUMBER = 'recent_message_number';
    const FIELD_UNREAD_MESSAGE_NUMBER = 'unread_message_number';
    const FIELD_NEXT_UID = 'next_uid';
    const FIELD_UID_VALIDITY_HASH = 'uid_validity_hash';

    /**
     * @inheritDoc
     */
    public function getNextUid()
    {
        return $this->get(self::FIELD_NEXT_UID);
    }

    /**
     * @inheritDoc
     */
    public function getUidValidityHash()
    {
        return $this->get(self::FIELD_UID_VALIDITY_HASH);
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
