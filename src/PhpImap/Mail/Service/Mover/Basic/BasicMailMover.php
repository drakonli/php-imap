<?php

namespace PhpImap\Mail\Service\Mover\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;
use PhpImap\Mail\Service\Mover\MailMoverInterface;
use PhpImap\Utility\Encoder\ImapEncoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailMover implements MailMoverInterface
{
    /**
     * @var ImapEncoderInterface
     */
    private $encoder;

    /**
     * BasicMailManager constructor.
     *
     * @param ImapEncoderInterface $encoder
     */
    public function __construct(ImapEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @inheritDoc
     */
    public function moveMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplString $mailBoxName
    ) {
        $encodedMailBoxName = (string)$this->encoder->encodeStringForImap($mailBoxName);

        return imap_mail_move($stream->getImapResource(), (int)$mail->getUid(), $encodedMailBoxName, CP_UID);
    }
}
