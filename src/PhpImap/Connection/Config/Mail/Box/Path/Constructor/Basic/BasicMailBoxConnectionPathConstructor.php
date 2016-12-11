<?php

namespace PhpImap\Connection\Config\Mail\Box\Path\Constructor\Basic;

use PhpImap\Connection\Config\Mail\Box\MailBoxConnectionConfigInterface;
use PhpImap\Connection\Config\Mail\Box\Path\Constructor\MailBoxConnectionPathConstructorInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxConnectionPathConstructor implements MailBoxConnectionPathConstructorInterface
{
    /**
     * @inheritDoc
     */
    public function constructMailBoxPath(MailBoxConnectionConfigInterface $config)
    {
        $port = true === $config->hasPort() ? sprintf(':%d', $config->getPort()) : null;

        $flagsPath = '';

        foreach ($config->getFlags() as $flag) {
            $flagsPath .= sprintf('/%s', $flag->getName());

            if (false === $flag->hasValue()) {
                continue;
            }

            $flagsPath .= sprintf('=%s', $flag->getValue());
        }

        $mailboxPath = sprintf(
            "{%s%s%s}%s",
            $config->getRemoteSystemName(),
            $port,
            $flagsPath,
            $config->getMailBoxName()
        );

        return new \SplString($mailboxPath);
    }
}
