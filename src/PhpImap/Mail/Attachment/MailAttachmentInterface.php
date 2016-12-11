<?php

namespace PhpImap\Mail\Attachment;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailAttachmentInterface
{
    /**
     * @return \SplString
     */
    public function getId();

    /**
     * @return \SplString
     */
    public function getDisposition();

    /**
     * @return bool
     */
    public function hasDisposition();

    /**
     * @return \SplFileInfo
     */
    public function getFile();
}
