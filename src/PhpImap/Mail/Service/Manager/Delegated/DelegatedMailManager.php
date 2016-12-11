<?php

namespace PhpImap\Mail\Service\Manager\Delegated;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\Collection\ExchangeOccurredMailCollectionInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;
use PhpImap\Mail\Service\Copier\MailCopierInterface;
use PhpImap\Mail\Service\Counter\MailCounterInterface;
use PhpImap\Mail\Service\Deleter\MailDeleterInterface;
use PhpImap\Mail\Service\Manager\MailManagerInterface;
use PhpImap\Mail\Service\Mover\MailMoverInterface;
use PhpImap\Mail\Service\Saver\MailSaverInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class DelegatedMailManager implements MailManagerInterface
{
    /**
     * @var MailMoverInterface
     */
    private $mover;

    /**
     * @var MailSaverInterface
     */
    private $saver;

    /**
     * @var MailCopierInterface
     */
    private $copier;

    /**
     * @var MailDeleterInterface
     */
    private $deleter;

    /**
     * @var MailCounterInterface
     */
    private $counter;

    /**
     * DelegatedMailManager constructor.
     *
     * @param MailMoverInterface   $mover
     * @param MailSaverInterface   $saver
     * @param MailCopierInterface  $copier
     * @param MailDeleterInterface $deleter
     * @param MailCounterInterface $counter
     */
    public function __construct(
        MailMoverInterface $mover,
        MailSaverInterface $saver,
        MailCopierInterface $copier,
        MailDeleterInterface $deleter,
        MailCounterInterface $counter
    ) {
        $this->mover = $mover;
        $this->saver = $saver;
        $this->copier = $copier;
        $this->deleter = $deleter;
        $this->counter = $counter;
    }

    /**
     * @inheritDoc
     */
    public function copyMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplString $mailBoxName
    ) {
        return $this->copier->copyMail($stream, $mail, $mailBoxName);
    }

    /**
     * @inheritDoc
     */
    public function moveMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplString $mailBoxName
    ) {
        return $this->mover->moveMail($stream, $mail, $mailBoxName);
    }

    /**
     * @inheritDoc
     */
    public function saveMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplFileInfo $file
    ) {
        return $this->saver->saveMail($stream, $mail, $file);
    }

    /**
     * @inheritDoc
     */
    public function deleteMarkedMails(ConnectionStreamInterface $stream)
    {
        return $this->deleter->deleteMarkedMails($stream);
    }

    /**
     * @inheritDoc
     */
    public function markAndDeleteMails(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailCollectionInterface $mails
    ) {
        return $this->deleter->markAndDeleteMails($stream, $mails);
    }

    /**
     * @inheritDoc
     */
    public function countMail(ConnectionStreamInterface $stream)
    {
        return $this->counter->countMail($stream);
    }
}
