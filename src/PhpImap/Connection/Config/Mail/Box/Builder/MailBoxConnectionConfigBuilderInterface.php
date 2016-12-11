<?php

namespace PhpImap\Connection\Config\Mail\Box\Builder;

use drakonli\PhpUtils\Builder\BuilderInterface;
use PhpImap\Connection\Config\Mail\Box\Flag\Collection\MailBoxConnectionConfigFlagCollectionInterface;
use PhpImap\Connection\Config\Mail\Box\MailBoxConnectionConfigInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxConnectionConfigBuilderInterface extends BuilderInterface
{
    /**
     * @return MailBoxConnectionConfigInterface
     */
    public function getMailBoxConnectionConfig();

    /**
     * @param \SplString $remoteSystemName
     *
     * @return self
     */
    public function addRemoteSystemName(\SplString $remoteSystemName);

    /**
     * @param \SplInt $port
     *
     * @return self
     */
    public function addPort(\SplInt $port);

    /**
     * @param \SplString $mailBoxName
     *
     * @return self
     */
    public function addMailBoxName(\SplString $mailBoxName);

    /**
     * @param MailBoxConnectionConfigFlagCollectionInterface $flags
     *
     * @return self
     */
    public function addFlags(MailBoxConnectionConfigFlagCollectionInterface $flags);
}
