<?php

namespace PhpImap\Mail\Exchange\Participant\Factory\ParameterBag;

use PhpImap\Mail\Exchange\Participant\Factory\MailExchangeParticipantFactoryInterface;
use PhpImap\Mail\Exchange\Participant\ParameterBag\ParameterBagMailExchangeParticipant;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailExchangeParticipantFactory implements MailExchangeParticipantFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createParticipant(\SplString $host, \SplString $mailBox)
    {
        return new ParameterBagMailExchangeParticipant(
            [
                ParameterBagMailExchangeParticipant::FIELD_HOST => $host,
                ParameterBagMailExchangeParticipant::FIELD_MAIL_BOX => $mailBox,
                ParameterBagMailExchangeParticipant::FIELD_EMAIL_ADDRESS => sprintf('%s@%s', $mailBox, $host),
            ]
        );
    }

    /**
     * @inheritDoc
     */
    public function createParticipantWithName(\SplString $host, \SplString $mailBox, \SplString $name)
    {
        return new ParameterBagMailExchangeParticipant(
            [
                ParameterBagMailExchangeParticipant::FIELD_HOST => $host,
                ParameterBagMailExchangeParticipant::FIELD_MAIL_BOX => $mailBox,
                ParameterBagMailExchangeParticipant::FIELD_EMAIL_ADDRESS => sprintf('%s@%s', $mailBox, $host),
                ParameterBagMailExchangeParticipant::FIELD_NAME => $name,
            ]
        );
    }
}