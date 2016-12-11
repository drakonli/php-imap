<?php

namespace PhpImap\Connection\Config\Option\Collection\Factory\Basic;

use PhpImap\Connection\Config\Option\Basic\BasicConnectionConfigOption;
use PhpImap\Connection\Config\Option\Collection\Basic\BasicConnectionConfigOptionCollection;
use PhpImap\Connection\Config\Option\Collection\Factory\ConnectionConfigOptionCollectionFactoryInterface;
use PhpImap\Connection\Config\Option\Collection\Factory\Exception\NonExistentOptionException;
use PhpImap\Connection\Config\Option\ConnectionConfigOptionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionConfigOptionCollectionFactory implements ConnectionConfigOptionCollectionFactoryInterface
{
    /**
     * @var array
     */
    private $possibleOptions = [
        ConnectionConfigOptionInterface::OPTION_READONLY_MODE,
        ConnectionConfigOptionInterface::OPTION_ANONYMOUS_MODE,
        ConnectionConfigOptionInterface::OPTION_OPEN_CONNECTION_NOT_MAILBOX,
        ConnectionConfigOptionInterface::OPTION_DELETE_MAIL_MARKED_FOR_DELETION_UPON_DISCONNECT,
        ConnectionConfigOptionInterface::OPTION_DEBUG_MODE,
        ConnectionConfigOptionInterface::OPTION_ELT_ONLY_CACHE,
        ConnectionConfigOptionInterface::OPTION_USE_DRIVER_PROTOTYPE,
        ConnectionConfigOptionInterface::OPTION_RESTRICT_TO_SECURE_AUTHENTICATION,
    ];

    /**
     * @var array
     */
    private $nonStrictToStrictOptions = [
        self::NON_STRICT_OPTION_READONLY_MODE => ConnectionConfigOptionInterface::OPTION_READONLY_MODE,
        self::NON_STRICT_OPTION_ANONYMOUS_MODE => ConnectionConfigOptionInterface::OPTION_ANONYMOUS_MODE,
        self::NON_STRICT_OPTION_DEBUG_MODE => ConnectionConfigOptionInterface::OPTION_DEBUG_MODE,
        self::NON_STRICT_OPTION_ELT_ONLY_CACHE => ConnectionConfigOptionInterface::OPTION_ELT_ONLY_CACHE,
        self::NON_STRICT_OPTION_USE_DRIVER_PROTOTYPE => ConnectionConfigOptionInterface::OPTION_USE_DRIVER_PROTOTYPE,

        self::NON_STRICT_OPTION_OPEN_CONNECTION_NOT_MAILBOX =>
            ConnectionConfigOptionInterface::OPTION_OPEN_CONNECTION_NOT_MAILBOX,

        self::NON_STRICT_OPTION_DELETE_MAIL_MARKED_FOR_DELETION_UPON_DISCONNECT =>
            ConnectionConfigOptionInterface::OPTION_DELETE_MAIL_MARKED_FOR_DELETION_UPON_DISCONNECT,

        self::NON_STRICT_OPTION_RESTRICT_TO_SECURE_AUTHENTICATION =>
            ConnectionConfigOptionInterface::OPTION_RESTRICT_TO_SECURE_AUTHENTICATION,
    ];

    /**
     * @inheritDoc
     */
    public function createOptionCollection(array $options)
    {
        $optionObjects = [];

        foreach ($options as $option) {
            $isStrictOption = in_array($option, $this->possibleOptions);
            $isNonStrictOption = array_key_exists($option, $this->nonStrictToStrictOptions);

            if (false === $isStrictOption && false === $isNonStrictOption) {
                throw new NonExistentOptionException(new \SplString((string)$option));
            }

            $optionValue = true === $isStrictOption ? $option : $this->nonStrictToStrictOptions[$option];

            $optionObjects[] = new BasicConnectionConfigOption(new \SplInt($optionValue));
        }

        return new BasicConnectionConfigOptionCollection($optionObjects);
    }
}
