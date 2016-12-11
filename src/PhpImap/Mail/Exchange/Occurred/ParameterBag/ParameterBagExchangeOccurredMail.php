<?php

namespace PhpImap\Mail\Exchange\Occurred\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagExchangeOccurredMail extends AbstractBasicImmutableParameterBag implements ExchangeOccurredMailInterface
{
    const FIELD_RAW_HEADERS = 'raw_headers';
    const FIELD_PLAIN_TEXT_CONTENT = 'plain_text_content';
    const FIELD_HTML_CONTENT = 'html_content';
    const FIELD_ATTACHMENTS = 'attachments';
    const FIELD_PARSED_HEADERS = 'parsed_headers';
    const FIELD_SUBJECT = 'subject';
    const FIELD_RECEIVERS = 'receiver';
    const FIELD_CC = 'cc';
    const FIELD_BCC = 'bcc';
    const FIELD_REPLY_TO = 'reply_to';
    const FIELD_UID = 'uid';
    const FIELD_MESSAGE_ID = 'message_id';
    const FIELD_DATE = 'date';
    const FIELD_SENDERS = 'sender';

    /**
     * @inheritDoc
     */
    public function getPlainTextContent()
    {
        return $this->get(self::FIELD_PLAIN_TEXT_CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function getHtmlContent()
    {
        return $this->get(self::FIELD_HTML_CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function hasHtmlContent()
    {
        return $this->has(self::FIELD_HTML_CONTENT);
    }

    /**
     * @inheritDoc
     */
    public function getAttachments()
    {
        return $this->get(self::FIELD_ATTACHMENTS);
    }

    /**
     * @inheritDoc
     */
    public function getParsedHeaders()
    {
        return $this->get(self::FIELD_PARSED_HEADERS);
    }

    /**
     * @inheritDoc
     */
    public function getRawHeaders()
    {
        return $this->get(self::FIELD_RAW_HEADERS);
    }

    /**
     * @inheritDoc
     */
    public function getSubject()
    {
        return $this->get(self::FIELD_SUBJECT);
    }

    /**
     * @inheritDoc
     */
    public function hasSubject()
    {
        return $this->has(self::FIELD_SUBJECT);
    }

    /**
     * @inheritDoc
     */
    public function getSenders()
    {
        return $this->get(self::FIELD_SENDERS);
    }

    /**
     * @inheritDoc
     */
    public function getReceivers()
    {
        return $this->get(self::FIELD_RECEIVERS);
    }

    /**
     * @inheritDoc
     */
    public function getCc()
    {
        return $this->get(self::FIELD_CC);
    }

    /**
     * @inheritDoc
     */
    public function getBcc()
    {
        return $this->get(self::FIELD_BCC);
    }

    /**
     * @inheritDoc
     */
    public function getReplyTo()
    {
        return $this->get(self::FIELD_REPLY_TO);
    }

    /**
     * @inheritDoc
     */
    public function getUid()
    {
        return $this->get(self::FIELD_UID);
    }

    /**
     * @inheritDoc
     */
    public function getDate()
    {
        return $this->get(self::FIELD_DATE);
    }

    /**
     * @inheritDoc
     */
    public function getMessageId()
    {
        return $this->get(self::FIELD_MESSAGE_ID);
    }

    /**
     * @inheritDoc
     */
    public function hasMessageId()
    {
        return $this->has(self::FIELD_MESSAGE_ID);
    }
}
