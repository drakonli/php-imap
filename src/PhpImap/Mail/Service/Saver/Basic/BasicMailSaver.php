<?php

namespace PhpImap\Mail\Service\Saver\Basic;

use PhpImap\Connection\Stream\ConnectionStreamInterface;
use PhpImap\Mail\Exchange\Occurred\ExchangeOccurredMailInterface;
use PhpImap\Mail\Service\Saver\Exception\SaveMailFileIsDirectoryException;
use PhpImap\Mail\Service\Saver\MailSaverInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailSaver implements MailSaverInterface
{
    /**
     * @inheritDoc
     */
    public function saveMail(
        ConnectionStreamInterface $stream,
        ExchangeOccurredMailInterface $mail,
        \SplFileInfo $file
    ) {
        if (true === $file->isDir()) {
            throw new SaveMailFileIsDirectoryException($file);
        }

        $file->openFile('w');

        return imap_savebody($stream->getImapResource(), $file->getRealPath(), (int)$mail->getUid(), "", FT_UID);
    }
}
