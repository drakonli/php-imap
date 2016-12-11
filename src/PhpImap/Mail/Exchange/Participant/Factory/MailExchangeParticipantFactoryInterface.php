<?php

namespace PhpImap\Mail\Exchange\Participant\Factory;

use PhpImap\Mail\Exchange\Participant\MailExchangeParticipantInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailExchangeParticipantFactoryInterface
{
    /**
     * @param \SplString $host
     * @param \SplString $mailBox
     *
     * @return MailExchangeParticipantInterface
     */
    public function createParticipant(\SplString $host, \SplString $mailBox);

    /**
     * @param \SplString $host
     * @param \SplString $mailBox
     * @param \SplString $name
     *
     * @return MailExchangeParticipantInterface
     */
    public function createParticipantWithName(\SplString $host, \SplString $mailBox, \SplString $name);
}