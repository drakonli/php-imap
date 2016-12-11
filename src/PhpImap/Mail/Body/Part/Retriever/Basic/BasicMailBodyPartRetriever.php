<?php

namespace PhpImap\Mail\Body\Part\Retriever\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Body\Decoder\ImapMailBodyDecoderInterface;
use PhpImap\Mail\Body\Part\Retriever\MailBodyPartRetrieverInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBodyPartRetriever implements MailBodyPartRetrieverInterface
{
    const BODY_FETCHING_OPTIONS = FT_UID | FT_PEEK;

    /**
     * @var ImapMailBodyDecoderInterface
     */
    private $bodyDecoder;

    /**
     * BasicMailBodyPartRetriever constructor.
     *
     * @param ImapMailBodyDecoderInterface $bodyDecoder
     */
    public function __construct(ImapMailBodyDecoderInterface $bodyDecoder)
    {
        $this->bodyDecoder = $bodyDecoder;
    }

    /**
     * @inheritDoc
     */
    public function retrievePartBody(
        \SplInt $mailId,
        ConnectionStreamInterface $stream,
        ImapMailBodyPartStructureInterface $partStructure
    ) {
        $number = $partStructure->getNumber();

        $data = 0 !== (int)$number ?
            imap_fetchbody(
                $stream->getImapResource(),
                (int)$mailId,
                $number,
                self::BODY_FETCHING_OPTIONS
            )
            : imap_body($stream->getImapResource(), (int)$mailId, self::BODY_FETCHING_OPTIONS);

        $decodedData = $this->bodyDecoder->decodeBody($partStructure->getEncoding(), new \SplString($data));

        return $decodedData;
    }
}
