<?php

namespace PhpImap\Connection\Config\Mail\Box\Path\Constructor;

use PhpImap\Connection\Config\Mail\Box\MailBoxConnectionConfigInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxConnectionPathConstructorInterface
{
    /**
     * @param MailBoxConnectionConfigInterface $config
     *
     * @return \SplString
     */
    public function constructMailBoxPath(MailBoxConnectionConfigInterface $config);
}
