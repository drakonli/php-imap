<?php

namespace PhpImap\Mail\Attachment\File\Path\Generator;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailAttachmentFilePathGeneratorInterface
{
    /**
     * @param \SplInt    $mailId
     * @param \SplString $attachmentId
     * @param \SplString $fileName
     *
     * @return \SplString
     */
    public function generatePath(\SplInt $mailId, \SplString $attachmentId, \SplString $fileName);
}