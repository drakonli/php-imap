<?php

namespace PhpImap\Connection\Factory\Basic;

use PhpImap\Connection\Basic\BasicConnection;
use PhpImap\Connection\Config\Builder\ConnectionConfigBuilderInterface;
use PhpImap\Connection\Config\ConnectionConfigInterface;
use PhpImap\Connection\Config\Mail\Box\Builder\MailBoxConnectionConfigBuilderInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\Factory\MailBoxConnectionConfigFlagCollectionFactoryInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\MailBoxConnectionConfigFlagCollectionInterface;
use PhpImap\Connection\Config\Mail\Box\Path\Constructor\MailBoxConnectionPathConstructorInterface;
use PhpImap\Connection\Config\Option\BitMask\Constructor\ConnectionConfigOptionBitMaskConstructorInterface;
use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;
use PhpImap\Connection\Config\Option\Collection\Factory\ConnectionConfigOptionCollectionFactoryInterface;
use PhpImap\Connection\Config\Param\Collection\ConnectionConfigParamCollectionInterface;
use PhpImap\Connection\Config\Param\Collection\Factory\ConnectionConfigParamCollectionFactoryInterface;
use PhpImap\Connection\Factory\ConnectionFactoryInterface;
use PhpImap\Connection\Stream\Basic\BasicConnectionStream;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionFactory implements ConnectionFactoryInterface
{
    /**
     * @var ConnectionConfigOptionBitMaskConstructorInterface
     */
    private $optionsBitMaskConstructor;

    /**
     * @var MailBoxConnectionPathConstructorInterface
     */
    private $mailBoxPathConstructor;

    /**
     * @var ConnectionConfigBuilderInterface
     */
    private $connectionConfigBuilder;

    /**
     * @var ConnectionConfigOptionCollectionFactoryInterface
     */
    private $connectionConfigOptionsCollectionFactory;

    /**
     * @var ConnectionConfigParamCollectionFactoryInterface
     */
    private $connectionConfigParamCollectionFactory;

    /**
     * @var MailBoxConnectionConfigBuilderInterface
     */
    private $mailBoxConnectionConfigBuilder;

    /**
     * @var MailBoxConnectionConfigFlagCollectionFactoryInterface
     */
    private $mailBoxConnectionConfigFlagsCollectionFactory;

    /**
     * BasicConnectionFactory constructor.
     *
     * @param ConnectionConfigOptionBitMaskConstructorInterface     $optionsBitMaskConstructor
     * @param MailBoxConnectionPathConstructorInterface             $mailBoxPathConstructor
     * @param ConnectionConfigBuilderInterface                      $connectionConfigBuilder
     * @param ConnectionConfigOptionCollectionFactoryInterface      $connectionConfigOptionsCollectionFactory
     * @param ConnectionConfigParamCollectionFactoryInterface       $connectionConfigParamCollectionFactory
     * @param MailBoxConnectionConfigBuilderInterface               $mailBoxConnectionConfigBuilder
     * @param MailBoxConnectionConfigFlagCollectionFactoryInterface $mailBoxConnectionConfigFlagsCollectionFactory
     */
    public function __construct(
        ConnectionConfigOptionBitMaskConstructorInterface $optionsBitMaskConstructor,
        MailBoxConnectionPathConstructorInterface $mailBoxPathConstructor,
        ConnectionConfigBuilderInterface $connectionConfigBuilder,
        ConnectionConfigOptionCollectionFactoryInterface $connectionConfigOptionsCollectionFactory,
        ConnectionConfigParamCollectionFactoryInterface $connectionConfigParamCollectionFactory,
        MailBoxConnectionConfigBuilderInterface $mailBoxConnectionConfigBuilder,
        MailBoxConnectionConfigFlagCollectionFactoryInterface $mailBoxConnectionConfigFlagsCollectionFactory
    ) {
        $this->optionsBitMaskConstructor = $optionsBitMaskConstructor;
        $this->mailBoxPathConstructor = $mailBoxPathConstructor;
        $this->connectionConfigBuilder = $connectionConfigBuilder;
        $this->connectionConfigOptionsCollectionFactory = $connectionConfigOptionsCollectionFactory;
        $this->connectionConfigParamCollectionFactory = $connectionConfigParamCollectionFactory;
        $this->mailBoxConnectionConfigBuilder = $mailBoxConnectionConfigBuilder;
        $this->mailBoxConnectionConfigFlagsCollectionFactory = $mailBoxConnectionConfigFlagsCollectionFactory;
    }

    /**
     * @param ConnectionConfigParamCollectionInterface $paramsCollection
     *
     * @return array
     */
    private function createParamsArrayByParamsCollection(ConnectionConfigParamCollectionInterface $paramsCollection)
    {
        $params = [];

        foreach ($paramsCollection as $param) {
            $params[(string)$param->getName()] = (string)$param->getValue();
        }

        return $params;
    }

    /**
     * @inheritDoc
     */
    public function createConnection(
        \SplString $userName,
        \SplString $password,
        \SplInt $connectionRetries,
        \SplString $mailBox,
        \SplString $remoteSystemName,
        \SplInt $port,
        MailBoxConnectionConfigFlagCollectionInterface $flags,
        ConnectionConfigOptionCollectionInterface $options,
        ConnectionConfigParamCollectionInterface $params
    ) {
        $this->mailBoxConnectionConfigBuilder->startBuilding()
            ->addMailBoxName($mailBox)
            ->addRemoteSystemName($remoteSystemName)
            ->addPort($port)
            ->addFlags($flags);

        $this->connectionConfigBuilder->startBuilding()
            ->addMailBoxConnectionConfig($this->mailBoxConnectionConfigBuilder->getMailBoxConnectionConfig())
            ->addUsername($userName)
            ->addPassword($password)
            ->addConnectionRetries($connectionRetries)
            ->addOptions($options)
            ->addParams($params);

        return $this->createConnectionByConfig($this->connectionConfigBuilder->getConnectionConfig());
    }

    /**
     * @inheritDoc
     */
    public function createConnectionNonStrict(
        $userName,
        $password,
        $connectionRetries,
        $mailBox,
        $remoteSystemName,
        $port,
        array $flags,
        array $options,
        array $params
    ) {
        $flagsCollection = $this->mailBoxConnectionConfigFlagsCollectionFactory->createFlags($flags);
        $optionsCollection = $this->connectionConfigOptionsCollectionFactory->createOptionCollection($options);
        $paramsCollection = $this->connectionConfigParamCollectionFactory->createParamCollection($params);

        $this->mailBoxConnectionConfigBuilder->startBuilding()
            ->addMailBoxName(new \SplString($mailBox))
            ->addRemoteSystemName(new \SplString($remoteSystemName))
            ->addPort(new \SplInt($port))
            ->addFlags($flagsCollection);

        $this->connectionConfigBuilder->startBuilding()
            ->addMailBoxConnectionConfig($this->mailBoxConnectionConfigBuilder->getMailBoxConnectionConfig())
            ->addUsername(new \SplString($userName))
            ->addPassword(new \SplString($password))
            ->addConnectionRetries(new \SplInt($connectionRetries))
            ->addOptions($optionsCollection)
            ->addParams($paramsCollection);

        return $this->createConnectionByConfig($this->connectionConfigBuilder->getConnectionConfig());
    }

    /**
     * @inheritDoc
     */
    public function createConnectionByConfig(ConnectionConfigInterface $config)
    {
        $mailboxPath = $this->mailBoxPathConstructor->constructMailBoxPath($config->getMailBoxConnectionConfig());
        $optionsBitMask = $this->optionsBitMaskConstructor->createOptionsBitMask($config->getOptions());
        $params = $this->createParamsArrayByParamsCollection($config->getParams());

        $imapStream = imap_open(
            $mailboxPath,
            $config->getUsername(),
            $config->getPassword(),
            (int)$optionsBitMask,
            (int)$config->getConnectionRetries(),
            $params
        );

        return new BasicConnection($config, new BasicConnectionStream($imapStream));
    }
}
