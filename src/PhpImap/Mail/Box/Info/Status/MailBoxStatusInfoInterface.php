<?php

namespace PhpImap\Mail\Box\Info\Status;

use PhpImap\Mail\Aware\Message\Number\MessageNumberAwareInterface;
use PhpImap\Mail\Aware\Message\Recent\Number\RecentMessageNumberAwareInterface;
use PhpImap\Mail\Aware\Message\Unread\Number\UnreadMessageNumberAwareInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxStatusInfoInterface extends
    MessageNumberAwareInterface,
    RecentMessageNumberAwareInterface,
    UnreadMessageNumberAwareInterface
{
    /**
     * @return \SplInt
     */
    public function getNextUid();

    /**
     * @return \SplString
     */
    public function getUidValidityHash();
}
