<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Collection\Builder;

use drakonli\PhpUtils\Builder\BuilderInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\MailBoxConnectionConfigFlagCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxConnectionConfigFlagCollectionBuilderInterface extends BuilderInterface
{
    /**
     * @return MailBoxConnectionConfigFlagCollectionInterface
     */
    public function getFlags();

    /**
     * @param \SplString $service
     *
     * @return self
     */
    public function addMailBoxAccessServiceFlag(\SplString $service);

    /**
     * @param \SplString $remoteUser
     *
     * @return self
     */
    public function addRemoteUserFlag(\SplString $remoteUser);

    /**
     * @param \SplString $remoteAuthenticationUser
     *
     * @return self
     */
    public function addRemoteAuthenticationUserFlag(\SplString $remoteAuthenticationUser);

    /**
     * @return self
     */
    public function addAnonymousModeFlag();

    /**
     * @return self
     */
    public function addDebugModeFlag();

    /**
     * @return self
     */
    public function addSecureFlag();

    /**
     * @return self
     */
    public function addNoRshFlag();

    /**
     * @return self
     */
    public function addSslConnectionFlag();

    /**
     * @return self
     */
    public function addValidateCertificateFlag();

    /**
     * @return self
     */
    public function addDoNotValidateCertificateFlag();

    /**
     * @return self
     */
    public function addForceTlsFlag();

    /**
     * @return self
     */
    public function addDoNotForceTlsFlag();

    /**
     * @return self
     */
    public function addOpenMailBoxInReadOnlyModeFlag();
}
