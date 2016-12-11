<?php

namespace PhpImap\Connection\Config\Mail\Box\Builder\ParameterBag;

use PhpImap\Connection\Config\Mail\Box\Builder\Exception\MailBoxConnectionConfigBuilderRequiredFieldException;
use PhpImap\Connection\Config\Mail\Box\Builder\MailBoxConnectionConfigBuilderInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\Basic\BasicMailBoxConnectionConfigFlagCollection;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\MailBoxConnectionConfigFlagCollectionInterface;
use PhpImap\Connection\Config\Mail\Box\ParameterBag\ParameterBagMailBoxConnectionConfig;
use PhpImap\Utility\Encoder\ImapEncoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxConnectionConfigBuilder implements MailBoxConnectionConfigBuilderInterface
{
    /**
     * @var array
     */
    private $requiredFields = [
        ParameterBagMailBoxConnectionConfig::FIELD_REMOTE_SYSTEM_NAME,
        ParameterBagMailBoxConnectionConfig::FIELD_PORT,
        ParameterBagMailBoxConnectionConfig::FIELD_MAIL_BOX_NAME,
    ];

    /**
     * @var array
     */
    private $connectionConfigData;

    /**
     * @var ImapEncoderInterface
     */
    private $imapEncoder;

    /**
     * ParameterBagMailBoxConnectionConfigBuilder constructor.
     *
     * @param ImapEncoderInterface $imapEncoder
     */
    public function __construct(ImapEncoderInterface $imapEncoder)
    {
        $this->imapEncoder = $imapEncoder;
    }

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
    public function getMailBoxConnectionConfig()
    {
        foreach ($this->requiredFields as $requiredField) {
            if (false === array_key_exists($requiredField, $this->connectionConfigData)) {
                throw new MailBoxConnectionConfigBuilderRequiredFieldException(new \SplString($requiredField));
            }
        }

        if (false === array_key_exists(ParameterBagMailBoxConnectionConfig::FIELD_FLAGS, $this->connectionConfigData)) {
            $this->connectionConfigData[ParameterBagMailBoxConnectionConfig::FIELD_FLAGS] =
                new BasicMailBoxConnectionConfigFlagCollection([]);
        }

        return new ParameterBagMailBoxConnectionConfig($this->connectionConfigData);
    }

    /**
     * @inheritDoc
     */
    public function addRemoteSystemName(\SplString $remoteSystemName)
    {
        $this->connectionConfigData[ParameterBagMailBoxConnectionConfig::FIELD_REMOTE_SYSTEM_NAME] = $remoteSystemName;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addPort(\SplInt $port)
    {
        $this->connectionConfigData[ParameterBagMailBoxConnectionConfig::FIELD_PORT] = $port;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addMailBoxName(\SplString $mailBoxName)
    {
        $this->connectionConfigData[ParameterBagMailBoxConnectionConfig::FIELD_MAIL_BOX_NAME]
            = $this->imapEncoder->encodeStringForImap($mailBoxName);

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addFlags(MailBoxConnectionConfigFlagCollectionInterface $flags)
    {
        $this->connectionConfigData[ParameterBagMailBoxConnectionConfig::FIELD_FLAGS] = $flags;

        return $this;
    }
}
