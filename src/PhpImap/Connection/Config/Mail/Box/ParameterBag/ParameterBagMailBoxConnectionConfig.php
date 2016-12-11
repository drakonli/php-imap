<?php

namespace PhpImap\Connection\Config\Mail\Box\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Connection\Config\Mail\Box\MailBoxConnectionConfigInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxConnectionConfig extends AbstractBasicImmutableParameterBag implements MailBoxConnectionConfigInterface
{
    const FIELD_REMOTE_SYSTEM_NAME = 'remote_system_name';
    const FIELD_PORT = 'port';
    const FIELD_MAIL_BOX_NAME = 'mail_box_name';
    const FIELD_FLAGS = 'flags';

    /**
     * @inheritDoc
     */
    public function getRemoteSystemName()
    {
        return $this->get(self::FIELD_REMOTE_SYSTEM_NAME);
    }

    /**
     * @inheritDoc
     */
    public function getPort()
    {
        return $this->get(self::FIELD_PORT);
    }

    /**
     * @inheritDoc
     */
    public function hasPort()
    {
        return $this->has(self::FIELD_PORT);
    }

    /**
     * @inheritDoc
     */
    public function getMailBoxName()
    {
        return $this->get(self::FIELD_MAIL_BOX_NAME);
    }

    /**
     * @inheritDoc
     */
    public function getFlags()
    {
        return $this->get(self::FIELD_FLAGS);
    }
}