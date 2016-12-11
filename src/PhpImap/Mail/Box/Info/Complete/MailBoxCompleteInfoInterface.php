<?php

namespace PhpImap\Mail\Box\Info\Complete;

use drakonli\PhpUtils\Aware\Date\DateAwareInterface;
use PhpImap\Mail\Aware\Box\Path\MailBoxPathAwareInterface;
use PhpImap\Mail\Aware\Box\Size\MailBoxSizeAwareInterface;
use PhpImap\Mail\Aware\Driver\DriverAwareInterface;
use PhpImap\Mail\Aware\Message\Deleted\Number\DeletedMessageNumberAwareInterface;
use PhpImap\Mail\Aware\Message\Number\MessageNumberAwareInterface;
use PhpImap\Mail\Aware\Message\Recent\Number\RecentMessageNumberAwareInterface;
use PhpImap\Mail\Aware\Message\Unread\Number\UnreadMessageNumberAwareInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxCompleteInfoInterface extends
    DriverAwareInterface,
    DateAwareInterface,
    MailBoxPathAwareInterface,
    MessageNumberAwareInterface,
    RecentMessageNumberAwareInterface,
    UnreadMessageNumberAwareInterface,
    DeletedMessageNumberAwareInterface,
    MailBoxSizeAwareInterface
{

}
