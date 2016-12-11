<?php

namespace PhpImap\Mail\Exchange\Participant\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Mail\Exchange\Participant\MailExchangeParticipantInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailExchangeParticipantCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return MailExchangeParticipantInterface
     */
    public function current();
}