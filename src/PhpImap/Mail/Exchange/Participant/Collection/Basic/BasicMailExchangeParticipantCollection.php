<?php

namespace PhpImap\Mail\Exchange\Participant\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Mail\Exchange\Participant\Collection\MailExchangeParticipantCollectionInterface;
use PhpImap\Mail\Exchange\Participant\MailExchangeParticipantInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailExchangeParticipantCollection extends AbstractBasicImmutableCollection implements MailExchangeParticipantCollectionInterface
{
    /**
     * BasicMailExchangeParticipantCollection constructor.
     *
     * @param array|MailExchangeParticipantInterface[] $participants
     */
    public function __construct(array $participants)
    {
        parent::__construct($participants);
    }
}