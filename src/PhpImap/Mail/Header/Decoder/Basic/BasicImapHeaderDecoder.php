<?php

namespace PhpImap\Mail\Header\Decoder\Basic;

use drakonli\PhpUtils\Encoding\Converter\EncodingConverterInterface;
use PhpImap\Mail\Header\Decoder\ImapHeaderDecoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapHeaderDecoder implements ImapHeaderDecoderInterface
{
    const IMAP_HEADER_DEFAULT_CHARSET = 'iso-8859-1';
    const IMAP_HEADER_FOR_DEFAULT_CHARSET = 'default';

    /**
     * @var string
     */
    private $serverEncoding;

    /**
     * @var EncodingConverterInterface
     */
    private $encodingConverter;

    /**
     * BasicImapHeaderDecoder constructor.
     *
     * @param string                     $serverEncoding
     * @param EncodingConverterInterface $encodingConverter
     */
    public function __construct($serverEncoding, EncodingConverterInterface $encodingConverter)
    {
        $this->serverEncoding = $serverEncoding;
        $this->encodingConverter = $encodingConverter;
    }

    /**
     * @inheritDoc
     */
    public function decodeToString(\SplString $header)
    {
        $decoded = '';

        $elements = imap_mime_header_decode($header);

        for ($i = 0; $i < count($elements); $i++) {

            if ($elements[$i]->charset == self::IMAP_HEADER_FOR_DEFAULT_CHARSET) {
                $elements[$i]->charset = self::IMAP_HEADER_DEFAULT_CHARSET;
            }

            $decoded .= $this->encodingConverter->convertStringEncoding(
                $elements[$i]->text,
                $elements[$i]->charset,
                $this->serverEncoding
            );
        }

        return new \SplString($decoded);
    }
}
