<?php

namespace PhpImap\Mail\Attachment\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Mail\Attachment\Collection\MailAttachmentCollectionInterface;
use PhpImap\Mail\Attachment\MailAttachmentInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailAttachmentCollection extends AbstractBasicImmutableCollection implements MailAttachmentCollectionInterface
{
    /**
     * BasicMailAttachmentCollection constructor.
     *
     * @param array|MailAttachmentInterface[] $attachments
     */
    public function __construct(array $attachments)
    {
        parent::__construct($attachments);
    }
}