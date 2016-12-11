<?php

namespace PhpImap\Mail\Attachment\File\Name\Generator;

use PhpImap\Mail\Body\Part\Structure\Parameter\Collection\ImapMailBodyPartStructureParameterCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailAttachmentFileNameGeneratorInterface
{
    /**
     * @param ImapMailBodyPartStructureParameterCollectionInterface $parameters
     * @param \SplString                                            $subType
     * @param \SplString                                            $attachmentId
     *
     * @return \SplString
     */
    public function generateFileName(
        ImapMailBodyPartStructureParameterCollectionInterface $parameters,
        \SplString $subType,
        \SplString $attachmentId
    );
}