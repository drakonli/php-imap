<?php

namespace PhpImap\Mail\Exchange\Occurred\Builder;

use DateTime;
use drakonli\PhpUtils\Builder\BuilderInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;
use PhpImap\Mail\Body\Part\Structure\Parameter\Collection\ImapMailBodyPartStructureParameterCollectionInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;
use stdClass;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ExchangeOccurredMailBuilderInterface extends BuilderInterface
{
    /**
     * @return ExchangeOccurredMailInterface
     */
    public function getMail();

    /**
     * @param \SplInt $uid
     *
     * @return self
     */
    public function buildUid(\SplInt $uid);

    /**
     * @param DateTime $date
     *
     * @return self
     */
    public function buildDate(DateTime $date);

    /**
     * @param \SplString $messageId
     *
     * @return self
     */
    public function buildMessageId(\SplString $messageId);

    /**
     * @param array $senders
     *
     * @return self
     */
    public function buildSenders(array $senders);

    /**
     * @param stdClass $parsedHeaders
     *
     * @return self
     */
    public function buildParsedHeaders(stdClass $parsedHeaders);

    /**
     * @param \SplString $rawHeaders
     *
     * @return self
     */
    public function buildRawHeaders(\SplString $rawHeaders);

    /**
     * @param array $receivers
     *
     * @return self
     */
    public function buildReceivers(array $receivers);

    /**
     * @param \SplString $subject
     *
     * @return self
     */
    public function buildSubject(\SplString $subject);

    /**
     * @param array $cc
     *
     * @return self
     */
    public function buildCc(array $cc);

    /**
     * @param array $bcc
     *
     * @return self
     */
    public function buildBcc(array $bcc);

    /**
     * @param array $replyTo
     *
     * @return self
     */
    public function buildReplyTo(array $replyTo);

    /**
     * @param ImapMailBodyPartStructureInterface $partStructure
     * @param \SplString                         $decodedBody
     * @param \SplInt                            $mailId
     *
     * @return self
     */
    public function buildAttachment(
        ImapMailBodyPartStructureInterface $partStructure,
        \SplString $decodedBody,
        \SplInt $mailId
    );

    /**
     * @param ImapMailBodyPartStructureParameterCollectionInterface $partParameters
     * @param \SplString                                            $decodedBody
     *
     * @return self
     */
    public function buildHtmlContent(
        ImapMailBodyPartStructureParameterCollectionInterface $partParameters,
        \SplString $decodedBody
    );

    /**
     * @param ImapMailBodyPartStructureParameterCollectionInterface $partParameters
     * @param \SplInt                                               $primaryBodyType
     * @param \SplString                                            $decodedBody
     *
     * @return self
     */
    public function buildPlainContent(
        ImapMailBodyPartStructureParameterCollectionInterface $partParameters,
        \SplInt $primaryBodyType,
        \SplString $decodedBody
    );
}
