<?php

namespace PhpImap\Mail\Attachment\Collection\Factory;

use PhpImap\Mail\Attachment\Collection\MailAttachmentCollectionInterface;
use PhpImap\Mail\Attachment\MailAttachmentInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailAttachmentCollectionFactoryInterface
{
    /**
     * @param array|MailAttachmentInterface[] $attachments
     *
     * @return MailAttachmentCollectionInterface
     */
    public function createCollection(array $attachments);
}