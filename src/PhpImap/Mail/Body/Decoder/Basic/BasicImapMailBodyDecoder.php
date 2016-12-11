<?php

namespace PhpImap\Mail\Body\Decoder\Basic;

use PhpImap\Mail\Body\Decoder\ImapMailBodyDecoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapMailBodyDecoder implements ImapMailBodyDecoderInterface
{
    /**
     * @inheritDoc
     */
    public function decodeBody(\SplInt $encoding, \SplString $body)
    {
        $data = (string)$body;

        switch ($encoding) {
            case ENC8BIT:
                $data = imap_utf8($data);
                break;
            case ENCBINARY:
                $data = trim(imap_binary($data));
                break;
            case ENCBASE64:
                $data = preg_replace('~[^a-zA-Z0-9+=/]+~s', '', $data);
                $data = imap_base64($data);
                break;
            case ENCQUOTEDPRINTABLE:
                $data = quoted_printable_decode($data);
                break;
        }

        return new \SplString($data);
    }
}
