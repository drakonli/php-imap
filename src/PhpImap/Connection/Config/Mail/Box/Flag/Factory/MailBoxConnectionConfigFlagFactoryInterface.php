<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag\Factory;

use PhpImap\Connection\Config\Mail\Box\Flag\MailBoxConnectionConfigFlagInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxConnectionConfigFlagFactoryInterface
{
    /**
     * @param \SplString $name
     *
     * @return MailBoxConnectionConfigFlagInterface
     */
    public function createFlag(\SplString $name);

    /**
     * @param \SplString $name
     * @param \SplString $value
     *
     * @return MailBoxConnectionConfigFlagInterface
     */
    public function createFlagWithValue(\SplString $name, \SplString $value);
}