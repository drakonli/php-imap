<?php

namespace PhpImap\Mail\Attachment\File\Name\Decoder\Basic;

use drakonli\PhpUtils\Encoding\Converter\EncodingConverterInterface;
use drakonli\PhpUtils\Url\UrlHelperInterface;
use PhpImap\Mail\Attachment\File\Name\Decoder\AttachmentFileNameDecoderInterface;
use PhpImap\Mail\Header\Decoder\ImapHeaderDecoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicAttachmentFileNameDecoder implements AttachmentFileNameDecoderInterface
{
    /**
     * @var string
     */
    private $serverEncoding;

    /**
     * @var \PhpImap\Mail\Header\Decoder\ImapHeaderDecoderInterface
     */
    private $imapHeaderDecoder;

    /**
     * @var UrlHelperInterface
     */
    private $urlHelper;

    /**
     * @var EncodingConverterInterface
     */
    private $encodingConverter;

    /**
     * BasicAttachmentFileNameDecoder constructor.
     *
     * @param string                                                  $serverEncoding
     * @param \PhpImap\Mail\Header\Decoder\ImapHeaderDecoderInterface $imapHeaderDecoder
     * @param UrlHelperInterface                                      $urlHelper
     * @param EncodingConverterInterface                              $encodingConverter
     */
    public function __construct(
        $serverEncoding,
        ImapHeaderDecoderInterface $imapHeaderDecoder,
        UrlHelperInterface $urlHelper,
        EncodingConverterInterface $encodingConverter
    ) {
        $this->serverEncoding = $serverEncoding;
        $this->imapHeaderDecoder = $imapHeaderDecoder;
        $this->urlHelper = $urlHelper;
        $this->encodingConverter = $encodingConverter;
    }

    /**
     * @inheritDoc
     */
    public function decodeAttachmentFileName(\SplString $fileName)
    {
        $fileName = $this->imapHeaderDecoder->decodeToString($fileName);
        $fileName = $this->decodeRFC2231($fileName);

        return $fileName;
    }

    /**
     * @param \SplString $string
     *
     * @return \SplString
     */
    private function decodeRFC2231(\SplString $string)
    {
        if (1 !== preg_match("/^(.*?)'.*?'(.*?)$/", $string, $matches)) {
            return $string;
        }

        $encoding = $matches[1];
        $data = $matches[2];

        if (false === $this->urlHelper->isUrlEncoded($data)) {
            return $string;
        }

        $string = $this->encodingConverter->convertStringEncoding(
            urldecode($data),
            $encoding,
            $this->serverEncoding
        );

        return new \SplString($string);
    }
}