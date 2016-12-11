<?php

namespace PhpImap\Connection\Factory;

use PhpImap\Connection\Config\ConnectionConfigInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\MailBoxConnectionConfigFlagCollectionInterface;
use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;
use PhpImap\Connection\Config\Param\Collection\ConnectionConfigParamCollectionInterface;
use PhpImap\Connection\ConnectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionFactoryInterface
{
    /**
     * @param \SplString                                     $userName
     * @param \SplString                                     $password
     * @param \SplInt                                        $connectionRetries
     * @param \SplString                                     $mailBox
     * @param \SplString                                     $remoteSystemName
     * @param \SplInt                                        $port
     * @param MailBoxConnectionConfigFlagCollectionInterface $flags
     * @param ConnectionConfigOptionCollectionInterface      $options
     * @param ConnectionConfigParamCollectionInterface       $params
     *
     * @return ConnectionInterface
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
    );

    /**
     * Internally creates SplTypes
     *
     * @param string $userName
     * @param string $password
     * @param int    $connectionRetries
     * @param string $mailBox
     * @param string $remoteSystemName
     * @param int    $port
     * @param array  $flags   @see MailBoxConnectionConfigFlagInterface for all flags
     * @param array  $options @see ConnectionConfigOptionCollectionFactoryInterface for string version of options
     * @param array  $params  @see ConnectionConfigParamInterface for all params
     *
     * @return ConnectionInterface
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
    );

    /**
     * @param ConnectionConfigInterface $config
     *
     * @return ConnectionInterface
     */
    public function createConnectionByConfig(ConnectionConfigInterface $config);
}
