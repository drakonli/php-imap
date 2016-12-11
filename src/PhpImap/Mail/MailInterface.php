<?php

namespace PhpImap\Mail;

use PhpImap\Mail\Attachment\Collection\MailAttachmentCollectionInterface;
use PhpImap\Mail\Exchange\Participant\Collection\MailExchangeParticipantCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailInterface
{
    /**
     * @return \SplString
     */
    public function getPlainTextContent();

    /**
     * @return \SplString
     */
    public function getHtmlContent();

    /**
     * @return bool
     */
    public function hasHtmlContent();

    /**
     * @return MailAttachmentCollectionInterface
     */
    public function getAttachments();

    /**
     * @return MailExchangeParticipantCollectionInterface
     */
    public function getReceivers();

    /**
     * @return \SplString
     */
    public function getSubject();

    /**
     * @return bool
     */
    public function hasSubject();

    /**
     * @return MailExchangeParticipantCollectionInterface
     */
    public function getCc();

    /**
     * @return MailExchangeParticipantCollectionInterface
     */
    public function getBcc();

    /**
     * @return MailExchangeParticipantCollectionInterface
     */
    public function getReplyTo();
}
