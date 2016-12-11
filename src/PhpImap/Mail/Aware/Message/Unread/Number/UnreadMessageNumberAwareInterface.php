<?php

namespace PhpImap\Mail\Aware\Message\Unread\Number;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface UnreadMessageNumberAwareInterface
{
    /**
     * @return \SplInt
     */
    public function getUnreadMessageNumber();
}
