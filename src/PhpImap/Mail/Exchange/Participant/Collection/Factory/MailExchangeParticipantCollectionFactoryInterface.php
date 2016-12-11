<?php

namespace PhpImap\Mail\Exchange\Participant\Collection\Factory;

use PhpImap\Mail\Exchange\Participant\Collection\MailExchangeParticipantCollectionInterface;
use PhpImap\Mail\Exchange\Participant\MailExchangeParticipantInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailExchangeParticipantCollectionFactoryInterface
{
    /**
     * @param array|MailExchangeParticipantInterface[] $participants
     *
     * @return MailExchangeParticipantCollectionInterface
     */
    public function createCollection(array $participants);

    /**
     * @param array $participantHeaders
     *
     * @return MailExchangeParticipantCollectionInterface
     */
    public function createCollectionByImapHeaders(array $participantHeaders);
}