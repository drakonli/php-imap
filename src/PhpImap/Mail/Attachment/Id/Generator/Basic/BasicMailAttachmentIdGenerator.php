<?php

namespace PhpImap\Mail\Attachment\Id\Generator\Basic;

use PhpImap\Mail\Attachment\Id\Generator\MailAttachmentIdGeneratorInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailAttachmentIdGenerator implements MailAttachmentIdGeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function generateByPartStructure(ImapMailBodyPartStructureInterface $partStructure)
    {
        $attachmentId = $partStructure->hasId() ? trim((string)$partStructure->getId(), " <>") : mt_rand().mt_rand();

        return new \SplString($attachmentId);
    }
}