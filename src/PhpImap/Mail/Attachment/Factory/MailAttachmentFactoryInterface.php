<?php

namespace PhpImap\Mail\Attachment\Factory;

use PhpImap\Mail\Attachment\MailAttachmentInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailAttachmentFactoryInterface
{
    /**
     * @param \SplInt                            $mailId
     * @param \SplString                         $content
     * @param ImapMailBodyPartStructureInterface $partStructure
     *
     * @return MailAttachmentInterface
     */
    public function createAttachmentByPart(
        \SplInt $mailId,
        \SplString $content,
        ImapMailBodyPartStructureInterface $partStructure
    );
}