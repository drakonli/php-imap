<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\MailBoxConnectionConfigFlagCollectionInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\MailBoxConnectionConfigFlagInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 *
 * @method MailBoxConnectionConfigFlagInterface[] getElements
 */
class BasicMailBoxConnectionConfigFlagCollection extends AbstractBasicImmutableCollection implements MailBoxConnectionConfigFlagCollectionInterface
{
    /**
     * @var array|MailBoxConnectionConfigFlagInterface[]
     */
    private $flagsIndexedByName;

    /**
     * BasicMailBoxConnectionConfigFlagCollection constructor.
     *
     * @param array|MailBoxConnectionConfigFlagInterface[] $flags
     */
    public function __construct(array $flags)
    {
        parent::__construct($flags);
    }

    /**
     * @inheritDoc
     */
    public function hasFlagWithName(\SplString $name)
    {
        if (null === $this->flagsIndexedByName) {
            $this->flagsIndexedByName = [];

            foreach ($this->getElements() as $element) {
                $this->flagsIndexedByName[(string)$element->getName()] = $element;
            }
        }

        return array_key_exists((string)$name, $this->flagsIndexedByName);
    }
}
