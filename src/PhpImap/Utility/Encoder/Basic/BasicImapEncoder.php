<?php

namespace PhpImap\Utility\Encoder\Basic;

use PhpImap\Utility\Encoder\ImapEncoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapEncoder implements ImapEncoderInterface
{
    const IMAP_ENCODING = 'UTF7-IMAP';

    /**
     * @var string
     */
    private $serverEncoding;

    /**
     * BasicImapEncoder constructor.
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
    public function encodeStringForImap(\SplString $string)
    {
        if (function_exists('mb_convert_encoding')) {
            $resultString = mb_convert_encoding((string)$string, self::IMAP_ENCODING, $this->serverEncoding);
        } else {
            $resultString = imap_utf7_encode((string)$string);
        }

        return new \SplString($resultString);
    }
}
