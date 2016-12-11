<?php

namespace PhpImap\Mail\Exchange\Occurred\Builder\ParameterBag;

use DateTime;
use drakonli\PhpUtils\Encoding\Converter\EncodingConverterInterface;
use PhpImap\Mail\Attachment\Collection\Factory\MailAttachmentCollectionFactoryInterface;
use PhpImap\Mail\Attachment\Factory\MailAttachmentFactoryInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;
use PhpImap\Mail\Body\Part\Structure\Parameter\Collection\ImapMailBodyPartStructureParameterCollectionInterface;
use PhpImap\Mail\Exchange\Occurred\Builder\ExchangeOccurredMailBuilderInterface;
use PhpImap\Mail\Exchange\Occurred\ParameterBag\ParameterBagExchangeOccurredMail;
use PhpImap\Mail\Exchange\Participant\Collection\Factory\MailExchangeParticipantCollectionFactoryInterface;
use stdClass;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagExchangeOccurredMailBuilder implements ExchangeOccurredMailBuilderInterface
{
    /**
     * @var array
     */
    private $mailData;

    /**
     * @var string
     */
    private $serverEncoding;

    /**
     * @var MailExchangeParticipantCollectionFactoryInterface
     */
    private $participantCollectionFactory;

    /**
     * @var EncodingConverterInterface
     */
    private $encodingConverter;

    /**
     * @var MailAttachmentFactoryInterface
     */
    private $mailAttachmentFactory;

    /**
     * @var MailAttachmentCollectionFactoryInterface
     */
    private $mailAttachmentCollectionFactory;

    /**
     * ParameterBagExchangeOccurredMailBuilder constructor.
     *
     * @param string                                            $serverEncoding
     * @param MailExchangeParticipantCollectionFactoryInterface $participantCollectionFactory
     * @param EncodingConverterInterface                        $encodingConverter
     * @param MailAttachmentFactoryInterface                    $mailAttachmentFactory
     * @param MailAttachmentCollectionFactoryInterface          $mailAttachmentCollectionFactory
     */
    public function __construct(
        $serverEncoding,
        MailExchangeParticipantCollectionFactoryInterface $participantCollectionFactory,
        EncodingConverterInterface $encodingConverter,
        MailAttachmentFactoryInterface $mailAttachmentFactory,
        MailAttachmentCollectionFactoryInterface $mailAttachmentCollectionFactory
    ) {
        $this->serverEncoding = $serverEncoding;
        $this->participantCollectionFactory = $participantCollectionFactory;
        $this->encodingConverter = $encodingConverter;
        $this->mailAttachmentFactory = $mailAttachmentFactory;
        $this->mailAttachmentCollectionFactory = $mailAttachmentCollectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function startBuilding()
    {
        $this->mailData = [];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getMail()
    {
        if (true === array_key_exists(ParameterBagExchangeOccurredMail::FIELD_HTML_CONTENT, $this->mailData)) {
            $htmlContent = $this->mailData[ParameterBagExchangeOccurredMail::FIELD_HTML_CONTENT];

            $this->mailData[ParameterBagExchangeOccurredMail::FIELD_HTML_CONTENT] = new \SplString($htmlContent);
        }

        if (true === array_key_exists(ParameterBagExchangeOccurredMail::FIELD_PLAIN_TEXT_CONTENT, $this->mailData)) {
            $plainText = $this->mailData[ParameterBagExchangeOccurredMail::FIELD_PLAIN_TEXT_CONTENT];

            $this->mailData[ParameterBagExchangeOccurredMail::FIELD_PLAIN_TEXT_CONTENT] = new \SplString($plainText);
        }

        if (true === array_key_exists(ParameterBagExchangeOccurredMail::FIELD_ATTACHMENTS, $this->mailData)) {
            $attachments = $this->mailData[ParameterBagExchangeOccurredMail::FIELD_ATTACHMENTS];

            $this->mailData[ParameterBagExchangeOccurredMail::FIELD_ATTACHMENTS] =
                $this->mailAttachmentCollectionFactory->createCollection($attachments);
        }

        return new ParameterBagExchangeOccurredMail($this->mailData);
    }

    /**
     * @inheritDoc
     */
    public function buildUid(\SplInt $uid)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_UID] = $uid;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildDate(DateTime $date)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_DATE] = $date;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildMessageId(\SplString $messageId)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_MESSAGE_ID] = $messageId;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildParsedHeaders(stdClass $parsedHeaders)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_PARSED_HEADERS] = $parsedHeaders;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildRawHeaders(\SplString $rawHeaders)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_RAW_HEADERS] = $rawHeaders;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildSubject(\SplString $subject)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_SUBJECT] = $subject;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildSenders(array $senders)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_SENDERS] =
            $this->participantCollectionFactory->createCollectionByImapHeaders($senders);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildReceivers(array $receivers)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_RECEIVERS] =
            $this->participantCollectionFactory->createCollectionByImapHeaders($receivers);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildCc(array $cc)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_CC] =
            $this->participantCollectionFactory->createCollectionByImapHeaders($cc);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildBcc(array $bcc)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_BCC] =
            $this->participantCollectionFactory->createCollectionByImapHeaders($bcc);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildReplyTo(array $replyTo)
    {
        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_REPLY_TO] =
            $this->participantCollectionFactory->createCollectionByImapHeaders($replyTo);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildAttachment(
        ImapMailBodyPartStructureInterface $partStructure,
        \SplString $decodedBody,
        \SplInt $mailId
    ) {
        $attachment = $this->mailAttachmentFactory->createAttachmentByPart($mailId, $decodedBody, $partStructure);

        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_ATTACHMENTS][] = $attachment;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildHtmlContent(
        ImapMailBodyPartStructureParameterCollectionInterface $partParameters,
        \SplString $decodedBody
    ) {
        if (true === empty($decodedBody)) {
            return $this;
        }

        $partHasCharset = $partParameters->hasParameterWithAttribute(new \SplString('charset'));

        if (true === $partHasCharset) {
            $charSet = $partParameters
                ->getParameterByAttribute(new \SplString('charset'))
                ->getValue();

            $decodedBody = $this->encodingConverter->convertStringEncoding(
                (string)$decodedBody,
                $charSet,
                $this->serverEncoding
            );
        }

        if (false === array_key_exists(ParameterBagExchangeOccurredMail::FIELD_HTML_CONTENT, $this->mailData)) {
            $this->mailData[ParameterBagExchangeOccurredMail::FIELD_HTML_CONTENT] = '';
        }

        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_HTML_CONTENT] .= (string)$decodedBody;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function buildPlainContent(
        ImapMailBodyPartStructureParameterCollectionInterface $partParameters,
        \SplInt $primaryBodyType,
        \SplString $decodedBody
    ) {
        if (true === empty($decodedBody)) {
            return $this;
        }

        $partHasCharset = $partParameters->hasParameterWithAttribute(new \SplString('charset'));

        if (true === $partHasCharset) {
            $charSet = $partParameters
                ->getParameterByAttribute(new \SplString('charset'))
                ->getValue();

            $decodedBody = $this->encodingConverter->convertStringEncoding(
                (string)$decodedBody,
                $charSet,
                $this->serverEncoding
            );
        }

        if (TYPEMESSAGE === $primaryBodyType) {
            $decodedBody = trim((string)$decodedBody);
        }

        if (false === array_key_exists(ParameterBagExchangeOccurredMail::FIELD_PLAIN_TEXT_CONTENT, $this->mailData)) {
            $this->mailData[ParameterBagExchangeOccurredMail::FIELD_PLAIN_TEXT_CONTENT] = '';
        }

        $this->mailData[ParameterBagExchangeOccurredMail::FIELD_PLAIN_TEXT_CONTENT] .= (string)$decodedBody;

        return $this;
    }
}
