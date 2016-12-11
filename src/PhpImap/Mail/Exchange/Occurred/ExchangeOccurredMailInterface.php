<?php

namespace PhpImap\Mail\Exchange\Occurred;

use DateTime;
use PhpImap\Mail\Exchange\Participant\Collection\MailExchangeParticipantCollectionInterface;
use PhpImap\Mail\MailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ExchangeOccurredMailInterface extends MailInterface
{
    /**
     * @return \SplInt
     */
    public function getUid();

    /**
     * @return DateTime
     */
    public function getDate();

    /**
     * @var \SplString
     */
    public function getMessageId();

    /**
     * @return bool
     */
    public function hasMessageId();

    /**
     * @return MailExchangeParticipantCollectionInterface
     */
    public function getSenders();

    /**
     * @return \stdClass
     */
    public function getParsedHeaders();

    /**
     * @return \SplString
     */
    public function getRawHeaders();
}
