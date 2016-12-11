<?php

namespace PhpImap\Mail\Service\Manager;

use PhpImap\Mail\Service\Copier\MailCopierInterface;
use PhpImap\Mail\Service\Counter\MailCounterInterface;
use PhpImap\Mail\Service\Deleter\MailDeleterInterface;
use PhpImap\Mail\Service\Mover\MailMoverInterface;
use PhpImap\Mail\Service\Saver\MailSaverInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailManagerInterface extends
    MailCopierInterface,
    MailSaverInterface,
    MailMoverInterface,
    MailDeleterInterface,
    MailCounterInterface
{
}
