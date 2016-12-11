<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Factory\ParameterBag;

use PhpImap\Connection\Config\Mail\Box\Flag\Factory\MailBoxConnectionConfigFlagFactoryInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\ParameterBag\ParameterBagMailBoxConnectionConfigFlag;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxConnectionConfigFlagFactory implements MailBoxConnectionConfigFlagFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createFlag(\SplString $name)
    {
        return new ParameterBagMailBoxConnectionConfigFlag([
            ParameterBagMailBoxConnectionConfigFlag::FIELD_NAME => $name
        ]);
    }

    /**
     * @inheritDoc
     */
    public function createFlagWithValue(\SplString $name, \SplString $value)
    {
        return new ParameterBagMailBoxConnectionConfigFlag([
            ParameterBagMailBoxConnectionConfigFlag::FIELD_NAME => $name,
            ParameterBagMailBoxConnectionConfigFlag::FIELD_VALUE => $value
        ]);
    }
}