<?php

namespace PhpImap\Mail\Service\Copier\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;
use PhpImap\Mail\Service\Copier\MailCopierInterface;
use PhpImap\Utility\Encoder\ImapEncoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailCopier implements MailCopierInterface
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
    public function copyMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplString $mailBoxName
    ) {
        $encodedMailBoxName = (string)$this->encoder->encodeStringForImap($mailBoxName);

        return imap_mail_copy($stream->getImapResource(), (int)$mail->getUid(), $encodedMailBoxName, CP_UID);
    }
}
