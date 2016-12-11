<?php

namespace PhpImap\Utility\Decoder\Basic;

use PhpImap\Utility\Decoder\ImapDecoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapDecoder implements ImapDecoderInterface
{
    const IMAP_ENCODING = 'UTF7-IMAP';

    /**
     * @var string
     */
    private $serverEncoding;

    /**
     * BasicImapDecoder constructor.
     *
     * @param string $serverEncoding
     */
    public function __construct($serverEncoding)
    {
        $this->serverEncoding = $serverEncoding;
    }

    /**
     * @inheritDoc
     */
    public function decodeStringForImap(\SplString $string)
    {
        if (function_exists('mb_convert_encoding')) {
            $resultString = mb_convert_encoding($string, $this->serverEncoding, self::IMAP_ENCODING);
        } else {
            $resultString = imap_utf7_decode($string);
        }

        return $resultString;
    }
}
