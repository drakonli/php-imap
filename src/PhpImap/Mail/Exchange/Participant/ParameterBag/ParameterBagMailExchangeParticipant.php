<?php

namespace PhpImap\Mail\Exchange\Participant\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Exchange\Participant\MailExchangeParticipantInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailExchangeParticipant extends AbstractBasicImmutableParameterBag implements MailExchangeParticipantInterface
{
    const FIELD_HOST = 'host';
    const FIELD_MAIL_BOX = 'mail_box';
    const FIELD_EMAIL_ADDRESS = 'email_address';
    const FIELD_NAME = 'name';

    /**
     * @inheritDoc
     */
    public function getHost()
    {
        return $this->get(self::FIELD_HOST);
    }

    /**
     * @inheritDoc
     */
    public function getMailBox()
    {
        return $this->get(self::FIELD_MAIL_BOX);
    }

    /**
     * @inheritDoc
     */
    public function getEmailAddress()
    {
        return $this->get(self::FIELD_EMAIL_ADDRESS);
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->get(self::FIELD_NAME);
    }

    /**
     * @inheritDoc
     */
    public function hasName()
    {
        return $this->has(self::FIELD_NAME);
    }
}
