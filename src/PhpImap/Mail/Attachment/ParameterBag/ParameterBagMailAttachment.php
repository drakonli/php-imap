<?php

namespace PhpImap\Mail\Attachment\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Attachment\MailAttachmentInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailAttachment extends AbstractBasicImmutableParameterBag implements MailAttachmentInterface
{
    const FIELD_ID = 'id';
    const FIELD_DISPOSITION = 'disposition';
    const FIELD_FILE = 'file';

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->get(self::FIELD_ID);
    }

    /**
     * @inheritDoc
     */
    public function getDisposition()
    {
        return $this->get(self::FIELD_DISPOSITION);
    }

    /**
     * @inheritDoc
     */
    public function hasDisposition()
    {
        return $this->has(self::FIELD_DISPOSITION);
    }

    /**
     * @inheritDoc
     */
    public function getFile()
    {
        return $this->get(self::FIELD_FILE);
    }
}
