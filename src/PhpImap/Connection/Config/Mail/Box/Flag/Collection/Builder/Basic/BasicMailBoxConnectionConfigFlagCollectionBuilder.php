<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Collection\Builder\Basic;

use PhpImap\Connection\Config\Mail\Box\Flag\Collection\Basic\BasicMailBoxConnectionConfigFlagCollection;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\Builder\MailBoxConnectionConfigFlagCollectionBuilderInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\Factory\MailBoxConnectionConfigFlagFactoryInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\MailBoxConnectionConfigFlagInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxConnectionConfigFlagCollectionBuilder implements MailBoxConnectionConfigFlagCollectionBuilderInterface
{
    /**
     * @var MailBoxConnectionConfigFlagFactoryInterface
     */
    private $flagFactory;

    /**
     * @var array|MailBoxConnectionConfigFlagInterface[]
     */
    private $flags;

    /**
     * BasicMailBoxConnectionConfigFlagCollectionBuilder constructor.
     *
     * @param MailBoxConnectionConfigFlagFactoryInterface $flagFactory
     */
    public function __construct(MailBoxConnectionConfigFlagFactoryInterface $flagFactory)
    {
        $this->flagFactory = $flagFactory;
    }

    /**
     * @inheritDoc
     */
    public function startBuilding()
    {
        $this->flags = [];

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getFlags()
    {
        return new BasicMailBoxConnectionConfigFlagCollection($this->flags);
    }

    /**
     * @inheritDoc
     */
    public function addMailBoxAccessServiceFlag(\SplString $service)
    {
        $this->flags[] = $this->flagFactory->createFlagWithValue(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_WITH_VALUE_SERVICE),
            $service
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addRemoteUserFlag(\SplString $remoteUser)
    {
        $this->flags[] = $this->flagFactory->createFlagWithValue(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_WITH_VALUE_USER),
            $remoteUser
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addRemoteAuthenticationUserFlag(\SplString $remoteAuthenticationUser)
    {
        $this->flags[] = $this->flagFactory->createFlagWithValue(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_WITH_VALUE_AUTH_USER),
            $remoteAuthenticationUser
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addAnonymousModeFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_ANONYMOUS)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDebugModeFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_DEBUG)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSecureFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_SECURE)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addNoRshFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_NO_RSH)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addSslConnectionFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_SSL)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addValidateCertificateFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_VALIDATE_CERT)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDoNotValidateCertificateFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_NO_VALIDATE_CERT)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addForceTlsFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_TLS)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addDoNotForceTlsFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_NO_TLS)
        );

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function addOpenMailBoxInReadOnlyModeFlag()
    {
        $this->flags[] = $this->flagFactory->createFlag(
            new \SplString(MailBoxConnectionConfigFlagInterface::FLAG_READONLY)
        );

        return $this;
    }
}
