<?php

namespace PhpImap\Connection\Config\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Connection\Config\ConnectionConfigInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagConnectionConfig extends AbstractBasicImmutableParameterBag implements ConnectionConfigInterface
{
    const FIELD_MAILBOX_CONNECTION_CONFIG = 'mailbox_connection_config';
    const FIELD_USERNAME = 'username';
    const FIELD_PASSWORD = 'password';
    const FIELD_CONNECTION_RETRIES = 'connection_retries';
    const FIELD_PARAMS = 'params';
    const FIELD_OPTIONS = 'options';

    /**
     * @inheritDoc
     */
    public function getMailBoxConnectionConfig()
    {
        return $this->get(self::FIELD_MAILBOX_CONNECTION_CONFIG);
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->get(self::FIELD_USERNAME);
    }

    /**
     * @inheritDoc
     */
    public function getPassword()
    {
        return $this->get(self::FIELD_PASSWORD);
    }

    /**
     * @inheritDoc
     */
    public function getConnectionRetries()
    {
        return $this->get(self::FIELD_CONNECTION_RETRIES);
    }

    /**
     * @inheritDoc
     */
    public function getParams()
    {
        return $this->get(self::FIELD_PARAMS);
    }

    /**
     * @inheritDoc
     */
    public function getOptions()
    {
        return $this->get(self::FIELD_OPTIONS);
    }
}