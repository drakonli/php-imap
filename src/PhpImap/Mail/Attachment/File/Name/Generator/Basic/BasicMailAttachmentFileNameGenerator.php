<?php

namespace PhpImap\Mail\Attachment\File\Name\Generator\Basic;

use PhpImap\Mail\Attachment\File\Name\Decoder\AttachmentFileNameDecoderInterface;
use PhpImap\Mail\Attachment\File\Name\Generator\MailAttachmentFileNameGeneratorInterface;
use PhpImap\Mail\Body\Part\Structure\Parameter\Collection\ImapMailBodyPartStructureParameterCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailAttachmentFileNameGenerator implements MailAttachmentFileNameGeneratorInterface
{
    /**
     * @var AttachmentFileNameDecoderInterface
     */
    private $attachmentsFileNameDecoder;

    /**
     * BasicMailAttachmentFileNameGenerator constructor.
     *
     * @param AttachmentFileNameDecoderInterface $attachmentsFileNameDecoder
     */
    public function __construct(AttachmentFileNameDecoderInterface $attachmentsFileNameDecoder)
    {
        $this->attachmentsFileNameDecoder = $attachmentsFileNameDecoder;
    }

    /**
     * @inheritDoc
     */
    public function generateFileName(
        ImapMailBodyPartStructureParameterCollectionInterface $parameters,
        \SplString $subType,
        \SplString $attachmentId
    ) {
        $hasFileNameParameter = $parameters->hasParameterWithAttribute(new \SplString('filename'));
        $hasNameParameter = $parameters->hasParameterWithAttribute(new \SplString('name'));
        $hasFileNameOrNameParameter = $hasFileNameParameter || $hasNameParameter;

        if (false === $hasFileNameOrNameParameter) {
            $fileName = sprintf('%s.%s', $attachmentId, strtolower($subType));

            return new \SplString($fileName);
        }

        $fileName = true === $hasFileNameParameter ?
            $parameters->getParameterByAttribute(new \SplString('filename'))
            : $parameters->getParameterByAttribute(new \SplString('name'));

        $fileName = $this->attachmentsFileNameDecoder->decodeAttachmentFileName(
            new \SplString($fileName->getValue())
        );

        return new \SplString($fileName);
    }
}
