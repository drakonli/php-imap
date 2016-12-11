<?php

namespace PhpImap\Connection\Config\Option\Collection\Builder;

use drakonli\PhpUtils\Builder\BuilderInterface;
use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionOptionsConfigBuilderInterface extends BuilderInterface
{
    /**
     * Returns the current built object
     *
     * @return ConnectionConfigOptionCollectionInterface
     */
    public function getOptions();

    /**
     * @return self
     */
    public function addOpenMailBoxInReadOnlyModeOption();

    /**
     * @return self
     */
    public function addAnonymousModeOption();

    /**
     * @return self
     */
    public function addHalfOpenModeOption();

    /**
     * @return self
     */
    public function addExpungeDeletedMailUponDisconnectionOption();

    /**
     * @return self
     */
    public function addDebugModeOption();

    /**
     * @return self
     */
    public function addUseShortCacheOption();

    /**
     * @return self
     */
    public function addReturnPrototypeOption();

    /**
     * @return self
     */
    public function addForceSecureAuthenticationOption();
}
