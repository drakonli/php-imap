<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Connection\Config\Mail\Box\Flag\MailBoxConnectionConfigFlagInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxConnectionConfigFlag extends AbstractBasicImmutableParameterBag implements MailBoxConnectionConfigFlagInterface
{
    const FIELD_NAME = 'name';
    const FIELD_VALUE = 'value';

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return $this->get(self::FIELD_NAME);
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->get(self::FIELD_VALUE);
    }

    /**
     * @inheritDoc
     */
    public function hasValue()
    {
        return $this->has(self::FIELD_VALUE);
    }
}
