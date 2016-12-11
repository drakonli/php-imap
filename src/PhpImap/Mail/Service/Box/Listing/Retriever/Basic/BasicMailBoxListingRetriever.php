<?php

namespace PhpImap\Mail\Service\Box\Listing\Retriever\Basic;

use PhpImap\Connection\Config\Mail\Box\Builder\MailBoxConnectionConfigBuilderInterface;
use PhpImap\Connection\Config\Mail\Box\Path\Constructor\MailBoxConnectionPathConstructorInterface;
use PhpImap\Connection\ConnectionInterface;
use PhpImap\Mail\Service\Box\Listing\Retriever\MailBoxListingRetrieverInterface;
use PhpImap\Utility\Decoder\ImapDecoderInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailBoxListingRetriever implements MailBoxListingRetrieverInterface
{
    /**
     * @var MailBoxConnectionPathConstructorInterface
     */
    private $mailBoxPathConstructor;

    /**
     * @var MailBoxConnectionConfigBuilderInterface
     */
    private $mailBoxConfigBuilder;

    /**
     * @var ImapDecoderInterface
     */
    private $imapDecoder;

    /**
     * BasicMailBoxListingRetriever constructor.
     *
     * @param MailBoxConnectionPathConstructorInterface $mailBoxPathConstructor
     * @param MailBoxConnectionConfigBuilderInterface   $mailBoxConfigBuilder
     * @param ImapDecoderInterface                      $imapDecoder
     */
    public function __construct(
        MailBoxConnectionPathConstructorInterface $mailBoxPathConstructor,
        MailBoxConnectionConfigBuilderInterface $mailBoxConfigBuilder,
        ImapDecoderInterface $imapDecoder
    ) {
        $this->mailBoxPathConstructor = $mailBoxPathConstructor;
        $this->mailBoxConfigBuilder = $mailBoxConfigBuilder;
        $this->imapDecoder = $imapDecoder;
    }

    /**
     * @inheritDoc
     */
    public function getListingByRootMailBoxName(ConnectionInterface $connection, \SplString $mailBoxName)
    {
        $connectionMailBoxConfig = $connection->getConfig()->getMailBoxConnectionConfig();

        $this->mailBoxConfigBuilder
            ->startBuilding()
            ->addFlags($connectionMailBoxConfig->getFlags())
            ->addRemoteSystemName($connectionMailBoxConfig->getRemoteSystemName())
            ->addMailBoxName($mailBoxName);

        if (true === $connectionMailBoxConfig->hasPort()) {
            $this->mailBoxConfigBuilder->addPort($connectionMailBoxConfig->getPort());
        }

        $mailBoxConfig = $this->mailBoxConfigBuilder->getMailBoxConnectionConfig();
        $mailBoxPath = $this->mailBoxPathConstructor->constructMailBoxPath($mailBoxConfig);

        $mailBoxConfigWithoutMailBoxName = $this->mailBoxConfigBuilder
            ->addMailBoxName(new \SplString(''))
            ->getMailBoxConnectionConfig();

        $mailBoxPathWithoutMailBoxName = $this->mailBoxPathConstructor->constructMailBoxPath(
            $mailBoxConfigWithoutMailBoxName
        );

        $folders = imap_list($connection->getImapStream()->getImapResource(), $mailBoxPath, "*");

        foreach ($folders as $key => $folder) {
            $decodedFolderName = $this->imapDecoder->decodeStringForImap(new \SplString($folder));

            $actualFolder = str_replace($mailBoxPathWithoutMailBoxName, "", (string)$decodedFolderName);

            $folders[$key] = new \SplString($actualFolder);
        }

        return $folders;
    }

    /**
     * @inheritDoc
     */
    public function getListing(ConnectionInterface $connection)
    {
        return $this->getListingByRootMailBoxName($connection, new \SplString(''));
    }
}
