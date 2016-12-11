<?php

namespace PhpImap\Mail\Service\Box\Listing\Retriever;

use PhpImap\Connection\ConnectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxListingRetrieverInterface
{
    /**
     * @param ConnectionInterface $connection
     * @param \SplString          $mailBoxName
     *
     * @return array|\SplString[]
     */
    public function getListingByRootMailBoxName(ConnectionInterface $connection, \SplString $mailBoxName);

    /**
     * @param ConnectionInterface $connection
     *
     * @return array|\SplString[]
     */
    public function getListing(ConnectionInterface $connection);
}
