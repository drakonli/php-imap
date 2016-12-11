<?php

namespace PhpImap\Mail\Attachment\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Mail\Attachment\MailAttachmentInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailAttachmentCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return MailAttachmentInterface
     */
    public function current();
}