<?php

namespace PhpImap\Mail\Attachment\Factory\ParameterBag;

use PhpImap\Mail\Attachment\Factory\MailAttachmentFactoryInterface;
use PhpImap\Mail\Attachment\File\Name\Generator\MailAttachmentFileNameGeneratorInterface;
use PhpImap\Mail\Attachment\File\Path\Generator\MailAttachmentFilePathGeneratorInterface;
use PhpImap\Mail\Attachment\Id\Generator\MailAttachmentIdGeneratorInterface;
use PhpImap\Mail\Attachment\ParameterBag\ParameterBagMailAttachment;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailAttachmentFactory implements MailAttachmentFactoryInterface
{
    /**
     * @var MailAttachmentFileNameGeneratorInterface
     */
    private $mailAttachmentFileNameGenerator;

    /**
     * @var MailAttachmentFilePathGeneratorInterface
     */
    private $mailAttachmentFilePathGenerator;

    /**
     * @var MailAttachmentIdGeneratorInterface
     */
    private $mailAttachmentIdGenerator;

    /**
     * ParameterBagMailAttachmentFactory constructor.
     *
     * @param MailAttachmentFileNameGeneratorInterface $mailAttachmentFileNameGenerator
     * @param MailAttachmentFilePathGeneratorInterface $mailAttachmentFilePathGenerator
     * @param MailAttachmentIdGeneratorInterface       $mailAttachmentIdGenerator
     */
    public function __construct(
        MailAttachmentFileNameGeneratorInterface $mailAttachmentFileNameGenerator,
        MailAttachmentFilePathGeneratorInterface $mailAttachmentFilePathGenerator,
        MailAttachmentIdGeneratorInterface $mailAttachmentIdGenerator
    ) {
        $this->mailAttachmentFileNameGenerator = $mailAttachmentFileNameGenerator;
        $this->mailAttachmentFilePathGenerator = $mailAttachmentFilePathGenerator;
        $this->mailAttachmentIdGenerator = $mailAttachmentIdGenerator;
    }

    /**
     * @inheritDoc
     */
    public function createAttachmentByPart(
        \SplInt $mailId,
        \SplString $content,
        ImapMailBodyPartStructureInterface $partStructure
    ) {
        $attachmentId = $this->mailAttachmentIdGenerator->generateByPartStructure($partStructure);

        $fileName = $this->mailAttachmentFileNameGenerator->generateFileName(
            $partStructure->getParameters(),
            $partStructure->getSubType(),
            $attachmentId
        );

        $filePath = $this->mailAttachmentFilePathGenerator->generatePath($mailId, $attachmentId, $fileName);

        file_put_contents($filePath, (string)$content);

        $data = [];
        $data[ParameterBagMailAttachment::FIELD_ID] = $attachmentId;
        $data[ParameterBagMailAttachment::FIELD_FILE] = new \SplFileInfo($filePath);

        if (true === $partStructure->hasDisposition()) {
            $data[ParameterBagMailAttachment::FIELD_DISPOSITION] = $partStructure->getDisposition();
        }

        return new ParameterBagMailAttachment($data);
    }
}
