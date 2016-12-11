<?php

namespace PhpImap\Mail\Service\Repository\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Criteria\Search\Collection\SearchCriteriaCollectionInterface;
use PhpImap\Mail\Criteria\Search\Path\Constructor\SearchCriteriaPathConstructorInterface;
use PhpImap\Mail\Criteria\Sort\SortCriteriaInterface;
use PhpImap\Mail\Exchange\Occurred\Collection\Factory\ExchangeOccurredMailCollectionFactoryInterface;
use PhpImap\Mail\Exchange\Occurred\Factory\ExchangeOccurredMailFactoryInterface;
use PhpImap\Mail\Service\Repository\MailRepositoryInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailRepository implements MailRepositoryInterface
{
    /**
     * @var string
     */
    private $serverEncoding;

    /**
     * @var SearchCriteriaPathConstructorInterface
     */
    private $searchCriteriaPathConstructor;

    /**
     * @var ExchangeOccurredMailFactoryInterface
     */
    private $mailFactory;

    /**
     * @var ExchangeOccurredMailCollectionFactoryInterface
     */
    private $mailCollectionFactory;

    /**
     * BasicMailRepository constructor.
     *
     * @param string                                         $serverEncoding
     * @param SearchCriteriaPathConstructorInterface         $searchCriteriaPathConstructor
     * @param ExchangeOccurredMailFactoryInterface           $mailFactory
     * @param ExchangeOccurredMailCollectionFactoryInterface $mailCollectionFactory
     */
    public function __construct(
        $serverEncoding,
        SearchCriteriaPathConstructorInterface $searchCriteriaPathConstructor,
        ExchangeOccurredMailFactoryInterface $mailFactory,
        ExchangeOccurredMailCollectionFactoryInterface $mailCollectionFactory
    ) {
        $this->serverEncoding = $serverEncoding;
        $this->searchCriteriaPathConstructor = $searchCriteriaPathConstructor;
        $this->mailFactory = $mailFactory;
        $this->mailCollectionFactory = $mailCollectionFactory;
    }

    /**
     * @inheritDoc
     */
    public function findById(ConnectionStreamInterface $stream, \SplInt $id)
    {
        $headersRaw = @imap_fetchheader($stream->getImapResource(), (int)$id, FT_UID);

        if (false === $headersRaw) {
            return null;
        }

        return $this->mailFactory->createMail($stream, $id);
    }

    /**
     * @inheritDoc
     */
    public function find(
        ConnectionStreamInterface $stream,
        SearchCriteriaCollectionInterface $searchCriteria,
        \SplInt $startWith,
        \SplInt $maxResults
    ) {
        $criteriaPath = $this->searchCriteriaPathConstructor->createPath($searchCriteria);

        $mailsIds = imap_search(
            $stream->getImapResource(),
            $criteriaPath,
            SE_UID,
            $this->serverEncoding
        );

        if (false === $mailsIds) {
            $mailsIds = [];
        }

        $limitedIds = array_slice($mailsIds, abs((int)$startWith - 1), abs((int)$maxResults));

        $mails = [];

        foreach ($limitedIds as $id) {
            $mails[] = $this->mailFactory->createMail($stream, new \SplInt($id));
        }

        return $this->mailCollectionFactory->createCollection($mails);
    }

    /**
     * @inheritDoc
     */
    public function findAndSort(
        ConnectionStreamInterface $stream,
        SortCriteriaInterface $sortCriteria,
        SearchCriteriaCollectionInterface $searchCriteria,
        \SplInt $startWith,
        \SplInt $maxResults
    ) {
        $searchCriteriaPath = $this->searchCriteriaPathConstructor->createPath($searchCriteria);

        $mailsIds = imap_sort(
            $stream->getImapResource(),
            (int)$sortCriteria->getSortParameter(),
            (int)$sortCriteria->isDescendingOrder(),
            SE_UID,
            $searchCriteriaPath,
            $this->serverEncoding
        );

        if (false === $mailsIds) {
            $mailsIds = [];
        }

        $limitedIds = array_slice($mailsIds, abs((int)$startWith - 1), abs((int)$maxResults));

        $mails = [];

        foreach ($limitedIds as $id) {
            $mails[] = $this->mailFactory->createMail($stream, new \SplInt($id));
        }

        return $this->mailCollectionFactory->createCollection($mails);
    }
}
