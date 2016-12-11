<?php

namespace PhpImap\Mail\Exchange\Participant\Collection\Factory\Basic;

use PhpImap\Mail\Exchange\Participant\Collection\Basic\BasicMailExchangeParticipantCollection;
use PhpImap\Mail\Exchange\Participant\Collection\Factory\MailExchangeParticipantCollectionFactoryInterface;
use PhpImap\Mail\Exchange\Participant\Factory\MailExchangeParticipantFactoryInterface;
use PhpImap\Mail\Header\Decoder\ImapHeaderDecoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailExchangeParticipantCollectionFactory implements MailExchangeParticipantCollectionFactoryInterface
{
    /**
     * @var \PhpImap\Mail\Header\Decoder\ImapHeaderDecoderInterface
     */
    private $imapHeaderDecoder;

    /**
     * @var MailExchangeParticipantFactoryInterface
     */
    private $participantFactory;

    /**
     * BasicMailExchangeParticipantCollectionFactory constructor.
     *
     * @param \PhpImap\Mail\Header\Decoder\ImapHeaderDecoderInterface $imapHeaderDecoder
     * @param MailExchangeParticipantFactoryInterface                 $participantFactory
     */
    public function __construct(
        ImapHeaderDecoderInterface $imapHeaderDecoder,
        MailExchangeParticipantFactoryInterface $participantFactory
    ) {
        $this->imapHeaderDecoder = $imapHeaderDecoder;
        $this->participantFactory = $participantFactory;
    }

    /**
     * @inheritDoc
     */
    public function createCollection(array $participants)
    {
        return new BasicMailExchangeParticipantCollection($participants);
    }

    /**
     * @inheritDoc
     */
    public function createCollectionByImapHeaders(array $participantHeaders)
    {
        $participants = [];

        foreach ($participantHeaders as $participantHeader) {
            if (true === isset($participantHeader->personal)) {
                $name = $this->imapHeaderDecoder->decodeToString(new \SplString($participantHeader->personal));

                $participants[] = $this->participantFactory->createParticipantWithName(
                    new \SplString($participantHeader->host),
                    new \SplString($participantHeader->mailbox),
                    new \SplString($name)
                );

                continue;
            }

            $participants[] = $this->participantFactory->createParticipant(
                new \SplString($participantHeader->host),
                new \SplString($participantHeader->mailbox)
            );
        }

        return $this->createCollection($participants);
    }
}