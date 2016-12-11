<?php

namespace PhpImap\Connection\Config\Param\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Connection\Config\Param\Collection\ConnectionConfigParamCollectionInterface;
use PhpImap\Connection\Config\Param\ConnectionConfigParamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 *
 * @method ConnectionConfigParamInterface[] getElements
 */
class BasicConnectionConfigParamCollection extends AbstractBasicImmutableCollection implements ConnectionConfigParamCollectionInterface
{
    /**
     * @var array|ConnectionConfigParamCollectionInterface[]
     */
    private $paramsIndexedByName;

    /**
     * BasicConnectionConfigParamCollection constructor.
     *
     * @param array|ConnectionConfigParamInterface[] $params
     */
    public function __construct(array $params)
    {
        parent::__construct($params);
    }

    /**
     * @inheritDoc
     */
    public function hasParamWithName(\SplString $name)
    {
        if (null === $this->paramsIndexedByName) {
            $this->paramsIndexedByName = [];

            foreach ($this->getElements() as $element) {
                $this->paramsIndexedByName[(string)$element->getName()] = $element;
            }
        }

        return array_key_exists((string)$name, $this->paramsIndexedByName);
    }
}
