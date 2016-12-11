<?php

namespace PhpImap\Mail\Body\Part\Retriever;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBodyPartRetrieverInterface
{
    /**
     * @param \SplInt                            $mailId
     * @param ConnectionStreamInterface          $stream
     * @param ImapMailBodyPartStructureInterface $partStructure
     *
     * @return \SplString
     */
    public function retrievePartBody(
        \SplInt $mailId,
        ConnectionStreamInterface $stream,
        ImapMailBodyPartStructureInterface $partStructure
    );
}
