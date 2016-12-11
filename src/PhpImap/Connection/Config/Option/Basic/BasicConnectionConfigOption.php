<?php

namespace PhpImap\Connection\Config\Option\Basic;

use PhpImap\Connection\Config\Option\ConnectionConfigOptionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicConnectionConfigOption implements ConnectionConfigOptionInterface
{
    /**
     * @var \SplInt
     */
    private $value;

    /**
     * BasicConnectionConfigOption constructor.
     *
     * @param \SplInt $value
     */
    public function __construct(\SplInt $value)
    {
        $this->value = $value;
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->value;
    }
}