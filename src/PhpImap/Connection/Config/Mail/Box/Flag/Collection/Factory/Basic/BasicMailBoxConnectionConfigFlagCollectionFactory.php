<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Collection\Factory\Basic;

use PhpImap\Connection\Config\Mail\Box\Flag\Collection\Basic\BasicMailBoxConnectionConfigFlagCollection;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\Factory\Exception\NonExistentFlagException;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\Factory\MailBoxConnectionConfigFlagCollectionFactoryInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\Factory\MailBoxConnectionConfigFlagFactoryInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\MailBoxConnectionConfigFlagInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxConnectionConfigFlagCollectionFactory implements MailBoxConnectionConfigFlagCollectionFactoryInterface
{
    /**
     * @var MailBoxConnectionConfigFlagFactoryInterface
     */
    private $flagFactory;

    /**
     * @var array
     */
    private $possibleFlags = [
        MailBoxConnectionConfigFlagInterface::FLAG_ANONYMOUS,
        MailBoxConnectionConfigFlagInterface::FLAG_DEBUG,
        MailBoxConnectionConfigFlagInterface::FLAG_SECURE,
        MailBoxConnectionConfigFlagInterface::FLAG_NO_RSH,
        MailBoxConnectionConfigFlagInterface::FLAG_SSL,
        MailBoxConnectionConfigFlagInterface::FLAG_VALIDATE_CERT,
        MailBoxConnectionConfigFlagInterface::FLAG_NO_VALIDATE_CERT,
        MailBoxConnectionConfigFlagInterface::FLAG_TLS,
        MailBoxConnectionConfigFlagInterface::FLAG_NO_TLS,
        MailBoxConnectionConfigFlagInterface::FLAG_READONLY,
    ];

    /**
     * @var array
     */
    private $possibleFlagsWithValue = [
        MailBoxConnectionConfigFlagInterface::FLAG_WITH_VALUE_SERVICE,
        MailBoxConnectionConfigFlagInterface::FLAG_WITH_VALUE_USER,
        MailBoxConnectionConfigFlagInterface::FLAG_WITH_VALUE_AUTH_USER,
    ];

    /**
     * BasicMailBoxConnectionConfigFlagCollectionFactory constructor.
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
    public function createFlags(array $flags)
    {
        $flagObjects = [];

        foreach ($flags as $flagKey => $flagValue) {
            if (true === is_string($flagKey)) {
                continue;
            }

            if (false === in_array($flagValue, $this->possibleFlags)) {
                throw new NonExistentFlagException(new \SplString($flagValue));
            }

            $flagObjects[] = $this->flagFactory->createFlag(new \SplString($flagValue));
        }

        foreach ($flags as $flagKey => $flagValue) {
            if (false === is_string($flagKey)) {
                continue;
            }

            if (false === in_array($flagKey, $this->possibleFlagsWithValue)) {
                throw new NonExistentFlagException(new \SplString($flagKey));
            }

            $flagObjects[] = $this->flagFactory->createFlagWithValue(
                new \SplString($flagKey),
                new \SplString($flagValue)
            );
        }

        return new BasicMailBoxConnectionConfigFlagCollection($flagObjects);
    }
}
