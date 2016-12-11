<?php

namespace PhpImap\Connection\Config\Option\Collection\Builder\Basic;

use PhpImap\Connection\Config\Option\Basic\BasicConnectionConfigOption;
use PhpImap\Connection\Config\Option\Collection\Basic\BasicConnectionConfigOptionCollection;
use PhpImap\Connection\Config\Option\Collection\Builder\ConnectionOptionsConfigBuilderInterface;
use PhpImap\Connection\Config\Option\ConnectionConfigOptionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionOptionsConfigBuilder implements ConnectionOptionsConfigBuilderInterface
{
    /**
     * @var array|ConnectionConfigOptionInterface[]
     */
    private $options;

    /**
     * @inheritDoc
     */
    public function startBuilding()
    {
        $this->options = [];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getOptions()
    {
        return new BasicConnectionConfigOptionCollection($this->options);
    }

    /**
     * @inheritDoc
     */
    public function addOpenMailBoxInReadOnlyModeOption()
    {
        $this->options[] = new BasicConnectionConfigOption(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_READONLY_MODE)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addAnonymousModeOption()
    {
        $this->options[] = new BasicConnectionConfigOption(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_ANONYMOUS_MODE)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addHalfOpenModeOption()
    {
        $this->options[] = new BasicConnectionConfigOption(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_OPEN_CONNECTION_NOT_MAILBOX)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addExpungeDeletedMailUponDisconnectionOption()
    {
        $this->options[] = new BasicConnectionConfigOption(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_DELETE_MAIL_MARKED_FOR_DELETION_UPON_DISCONNECT)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDebugModeOption()
    {
        $this->options[] = new BasicConnectionConfigOption(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_DEBUG_MODE)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addUseShortCacheOption()
    {
        $this->options[] = new BasicConnectionConfigOption(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_ELT_ONLY_CACHE)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addReturnPrototypeOption()
    {
        $this->options[] = new BasicConnectionConfigOption(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_USE_DRIVER_PROTOTYPE)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addForceSecureAuthenticationOption()
    {
        $this->options[] = new BasicConnectionConfigOption(
            new \SplInt(ConnectionConfigOptionInterface::OPTION_RESTRICT_TO_SECURE_AUTHENTICATION)
        );

        return $this;
    }
}
