<?php

namespace PhpImap\Mail\Attachment\File\Name\Decoder;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface AttachmentFileNameDecoderInterface
{
    /**
     * @param \SplString $fileName
     *
     * @return \SplString
     */
    public function decodeAttachmentFileName(\SplString $fileName);
}