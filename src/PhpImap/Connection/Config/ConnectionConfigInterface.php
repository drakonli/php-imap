<?php

namespace PhpImap\Connection\Config;

use PhpImap\Connection\Config\Mail\Box\MailBoxConnectionConfigInterface;
use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;
use PhpImap\Connection\Config\Param\Collection\ConnectionConfigParamCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigInterface
{
    /**
     * @return MailBoxConnectionConfigInterface
     */
    public function getMailBoxConnectionConfig();

    /**
     * @return \SplString
     */
    public function getUsername();

    /**
     * @return \SplString
     */
    public function getPassword();

    /**
     * @return \SplInt
     */
    public function getConnectionRetries();

    /**
     * @return ConnectionConfigParamCollectionInterface
     */
    public function getParams();

    /**
     * @return ConnectionConfigOptionCollectionInterface
     */
    public function getOptions();
}