<?php

namespace PhpImap\Connection\Config\Builder;

use drakonli\PhpUtils\Builder\BuilderInterface;
use PhpImap\Connection\Config\ConnectionConfigInterface;
use PhpImap\Connection\Config\Mail\Box\MailBoxConnectionConfigInterface;
use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;
use PhpImap\Connection\Config\Param\Collection\ConnectionConfigParamCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigBuilderInterface extends BuilderInterface
{
    /**
     * @return ConnectionConfigInterface
     */
    public function getConnectionConfig();

    /**
     * @param MailBoxConnectionConfigInterface $config
     *
     * @return self
     */
    public function addMailBoxConnectionConfig(MailBoxConnectionConfigInterface $config);

    /**
     * @param \SplString $username
     *
     * @return self
     */
    public function addUsername(\SplString $username);

    /**
     * @param \SplString $password
     *
     * @return self
     */
    public function addPassword(\SplString $password);

    /**
     * @param \SplInt $retries
     *
     * @return self
     */
    public function addConnectionRetries(\SplInt $retries);

    /**
     * @param ConnectionConfigParamCollectionInterface $params
     *
     * @return self
     */
    public function addParams(ConnectionConfigParamCollectionInterface $params);

    /**
     * @param ConnectionConfigOptionCollectionInterface $options
     *
     * @return self
     */
    public function addOptions(ConnectionConfigOptionCollectionInterface $options);
}
