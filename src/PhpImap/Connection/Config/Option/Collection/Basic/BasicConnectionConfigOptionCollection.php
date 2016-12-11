<?php

namespace PhpImap\Connection\Config\Option\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;
use PhpImap\Connection\Config\Option\ConnectionConfigOptionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 *
 * @method ConnectionConfigOptionInterface[] getElements
 */
class BasicConnectionConfigOptionCollection extends AbstractBasicImmutableCollection implements ConnectionConfigOptionCollectionInterface
{
    /**
     * @var array|ConnectionConfigOptionInterface[]
     */
    private $optionsIndexedByValue;

    /**
     * ConnectionConfigOptionCollection constructor.
     *
     * @param array|ConnectionConfigOptionInterface[] $options
     */
    public function __construct(array $options)
    {
        parent::__construct($options);
    }

    /**
     * @inheritDoc
     */
    public function hasOptionWithValue(\SplInt $value)
    {
        if (null === $this->optionsIndexedByValue) {
            $this->optionsIndexedByValue = [];

            foreach ($this->getElements() as $element) {
                $this->optionsIndexedByValue[(int)$element->getValue()] = $element;
            }
        }

        return array_key_exists((int)$value, $this->optionsIndexedByValue);
    }
}
