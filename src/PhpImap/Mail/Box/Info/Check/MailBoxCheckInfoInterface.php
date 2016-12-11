<?php

namespace PhpImap\Mail\Box\Info\Check;

use drakonli\PhpUtils\Aware\Date\DateAwareInterface;
use PhpImap\Mail\Aware\Box\Path\MailBoxPathAwareInterface;
use PhpImap\Mail\Aware\Driver\DriverAwareInterface;
use PhpImap\Mail\Aware\Message\Number\MessageNumberAwareInterface;
use PhpImap\Mail\Aware\Message\Recent\Number\RecentMessageNumberAwareInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxCheckInfoInterface extends
    DriverAwareInterface,
    DateAwareInterface,
    MailBoxPathAwareInterface,
    MessageNumberAwareInterface,
    RecentMessageNumberAwareInterface
{

}
