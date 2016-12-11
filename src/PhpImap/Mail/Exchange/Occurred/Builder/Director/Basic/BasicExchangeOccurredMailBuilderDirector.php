<?php

namespace PhpImap\Mail\Exchange\Occurred\Builder\Director\Basic;

use DateTime;
use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Body\Part\Retriever\MailBodyPartRetrieverInterface;
use PhpImap\Mail\Body\Part\Structure\Collection\Factory\ImapMailBodyPartStructureCollectionFactoryInterface;
use PhpImap\Mail\Body\Part\Structure\Helper\ImapMailBodyPartStructureHelperInterface;
use PhpImap\Mail\Exchange\Occurred\Builder\Director\ExchangeOccurredMailBuilderDirectorInterface;
use PhpImap\Mail\Exchange\Occurred\Builder\ExchangeOccurredMailBuilderInterface;
use PhpImap\Mail\Header\Decoder\ImapHeaderDecoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicExchangeOccurredMailBuilderDirector implements ExchangeOccurredMailBuilderDirectorInterface
{
    const DATE_FORMAT = 'Y-m-d H:i:s';

    /**
     * @var ImapMailBodyPartStructureCollectionFactoryInterface
     */
    private $partStructureCollectionFactory;

    /**
     * @var ImapHeaderDecoderInterface
     */
    private $imapHeaderDecoder;

    /**
     * @var ImapMailBodyPartStructureHelperInterface
     */
    private $partHelper;

    /**
     * @var MailBodyPartRetrieverInterface
     */
    private $mailBodyPartRetriever;

    /**
     * BasicExchangeOccurredMailBuilderDirector constructor.
     *
     * @param ImapMailBodyPartStructureCollectionFactoryInterface $partStructureCollectionFactory
     * @param ImapHeaderDecoderInterface                          $imapHeaderDecoder
     * @param ImapMailBodyPartStructureHelperInterface            $partHelper
     * @param MailBodyPartRetrieverInterface                      $mailBodyPartRetriever
     */
    public function __construct(
        ImapMailBodyPartStructureCollectionFactoryInterface $partStructureCollectionFactory,
        ImapHeaderDecoderInterface $imapHeaderDecoder,
        ImapMailBodyPartStructureHelperInterface $partHelper,
        MailBodyPartRetrieverInterface $mailBodyPartRetriever
    ) {
        $this->partStructureCollectionFactory = $partStructureCollectionFactory;
        $this->imapHeaderDecoder = $imapHeaderDecoder;
        $this->partHelper = $partHelper;
        $this->mailBodyPartRetriever = $mailBodyPartRetriever;
    }

    /**
     * @inheritDoc
     */
    public function buildMail(
        ExchangeOccurredMailBuilderInterface $builder,
        \SplInt $mailId,
        ConnectionStreamInterface $stream
    ) {
        $headersRaw = imap_fetchheader($stream->getImapResource(), (int)$mailId, FT_UID);
        $head = imap_rfc822_parse_headers($headersRaw);
        $mailStructure = imap_fetchstructure($stream->getImapResource(), (int)$mailId, FT_UID);

        $time = true === isset($head->date) ? strtotime(preg_replace('/\(.*?\)/', '', $head->date)) : time();
        $dateTime = (new DateTime())->setTimestamp($time);
        $from = true === isset($head->from) ? $head->from : [];
        $to = true === isset($head->to) ? $head->to : [];
        $cc = true === isset($head->cc) ? $head->cc : [];
        $bcc = true === isset($head->bcc) ? $head->bcc : [];
        $replyTo = true === isset($head->reply_to) ? $head->reply_to : [];

        $builder
            ->startBuilding()
            ->buildUid($mailId)
            ->buildDate($dateTime)
            ->buildRawHeaders(new \SplString($headersRaw))
            ->buildParsedHeaders($head)
            ->buildSenders($from)
            ->buildReceivers($to)
            ->buildCc($cc)
            ->buildBcc($bcc)
            ->buildReplyTo($replyTo);

        if (true === isset($head->message_id)) {
            $builder->buildMessageId(new \SplString($head->message_id));
        }

        if (true === isset($head->subject)) {
            $builder->buildSubject($this->imapHeaderDecoder->decodeToString(new \SplString($head->subject)));
        }

        $parts = $this->partStructureCollectionFactory->createPartCollectionByStructure($mailStructure);

        foreach ($parts as $part) {
            if (true === $this->partHelper->isAttachmentPart($part)) {
                $bodyPartContent = $this->mailBodyPartRetriever->retrievePartBody($mailId, $stream, $part);

                $builder->buildAttachment($part, $bodyPartContent, $mailId);

                continue;
            }

            if (true === $this->partHelper->isHtmlContentPart($part)) {
                $bodyPartContent = $this->mailBodyPartRetriever->retrievePartBody($mailId, $stream, $part);

                $builder->buildHtmlContent($part->getParameters(), $bodyPartContent);

                continue;
            }

            if (true === $this->partHelper->isPlainContentPart($part)) {
                $bodyPartContent = $this->mailBodyPartRetriever->retrievePartBody($mailId, $stream, $part);

                $builder->buildPlainContent(
                    $part->getParameters(),
                    $part->getPrimaryBodyType(),
                    $bodyPartContent
                );

                continue;
            }
        }

        return $builder->getMail();
    }
}
