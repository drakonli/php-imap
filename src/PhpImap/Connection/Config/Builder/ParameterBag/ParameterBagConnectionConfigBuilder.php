<?php

namespace PhpImap\Connection\Config\Builder\ParameterBag;

use PhpImap\Connection\Config\Builder\ConnectionConfigBuilderInterface;
use PhpImap\Connection\Config\Builder\Exception\ConnectionConfigBuilderRequiredFieldException;
use PhpImap\Connection\Config\Mail\Box\MailBoxConnectionConfigInterface;
use PhpImap\Connection\Config\Option\Collection\Basic\BasicConnectionConfigOptionCollection;
use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;
use PhpImap\Connection\Config\Param\Collection\Basic\BasicConnectionConfigParamCollection;
use PhpImap\Connection\Config\Param\Collection\ConnectionConfigParamCollectionInterface;
use PhpImap\Connection\Config\ParameterBag\ParameterBagConnectionConfig;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagConnectionConfigBuilder implements ConnectionConfigBuilderInterface
{
    const DEFAULT_RETRIES = 0;

    /**
     * @var array
     */
    private $requiredFields = [
        ParameterBagConnectionConfig::FIELD_USERNAME,
        ParameterBagConnectionConfig::FIELD_PASSWORD,
        ParameterBagConnectionConfig::FIELD_MAILBOX_CONNECTION_CONFIG,
    ];

    /**
     * @var array
     */
    private $connectionConfigData;

    /**
     * @inheritDoc
     */
    public function startBuilding()
    {
        $this->connectionConfigData = [];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getConnectionConfig()
    {
        foreach ($this->requiredFields as $requiredField) {
            if (false === array_key_exists($requiredField, $this->connectionConfigData)) {
                throw new ConnectionConfigBuilderRequiredFieldException(new \SplString($requiredField));
            }
        }

        if (false === array_key_exists(ParameterBagConnectionConfig::FIELD_PARAMS, $this->connectionConfigData)) {
            $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_PARAMS] =
                new BasicConnectionConfigParamCollection([]);
        }

        if (false === array_key_exists(ParameterBagConnectionConfig::FIELD_OPTIONS, $this->connectionConfigData)) {
            $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_OPTIONS]
                = new BasicConnectionConfigOptionCollection([]);
        }

        if (false === array_key_exists(
                ParameterBagConnectionConfig::FIELD_CONNECTION_RETRIES,
                $this->connectionConfigData
            )
        ) {
            $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_CONNECTION_RETRIES] = new \SplInt(
                self::DEFAULT_RETRIES
            );
        }

        return new ParameterBagConnectionConfig($this->connectionConfigData);
    }

    /**
     * @inheritDoc
     */
    public function addMailBoxConnectionConfig(MailBoxConnectionConfigInterface $config)
    {
        $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_MAILBOX_CONNECTION_CONFIG] = $config;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addUsername(\SplString $username)
    {
        $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_USERNAME] = $username;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addPassword(\SplString $password)
    {
        $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_PASSWORD] = $password;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addConnectionRetries(\SplInt $retries)
    {
        $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_CONNECTION_RETRIES] = $retries;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addParams(ConnectionConfigParamCollectionInterface $params)
    {
        $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_PARAMS] = $params;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addOptions(ConnectionConfigOptionCollectionInterface $options)
    {
        $this->connectionConfigData[ParameterBagConnectionConfig::FIELD_OPTIONS] = $options;

        return $this;
    }
}
