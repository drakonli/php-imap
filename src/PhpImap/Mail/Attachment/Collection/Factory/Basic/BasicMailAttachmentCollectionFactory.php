<?php

namespace PhpImap\Mail\Attachment\Collection\Factory\Basic;

use PhpImap\Mail\Attachment\Collection\Basic\BasicMailAttachmentCollection;
use PhpImap\Mail\Attachment\Collection\Factory\MailAttachmentCollectionFactoryInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailAttachmentCollectionFactory implements MailAttachmentCollectionFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createCollection(array $attachments)
    {
        return new BasicMailAttachmentCollection($attachments);
    }
}