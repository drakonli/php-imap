<?php

namespace PhpImap\Mail\Attachment\Id\Generator;

use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailAttachmentIdGeneratorInterface
{
    /**
     * @param ImapMailBodyPartStructureInterface $partStructure
     *
     * @return \SplString
     */
    public function generateByPartStructure(ImapMailBodyPartStructureInterface $partStructure);
}