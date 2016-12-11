<?php

namespace PhpImap\Mail\Exchange\Participant;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailExchangeParticipantInterface
{
    /**
     * @return \SplString
     */
    public function getHost();

    /**
     * @return \SplString
     */
    public function getMailBox();

    /**
     * @return \SplString
     */
    public function getEmailAddress();

    /**
     * @return \SplString
     */
    public function getName();

    /**
     * @return bool
     */
    public function hasName();
}
