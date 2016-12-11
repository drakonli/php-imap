<?php

namespace PhpImap\Connection\Config\Param\Basic;

use PhpImap\Connection\Config\Param\ConnectionConfigParamInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionConfigParam implements ConnectionConfigParamInterface
{
    /**
     * @var \SplString
     */
    private $name;

    /**
     * @var \SplString
     */
    private $value;

    /**
     * BasicConnectionConfigParam constructor.
     *
     * @param \SplString $name
     * @param \SplString $value
     */
    public function __construct(\SplString $name, \SplString $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->value;
    }
}