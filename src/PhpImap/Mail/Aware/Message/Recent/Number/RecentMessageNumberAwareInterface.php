<?php

namespace PhpImap\Mail\Aware\Message\Recent\Number;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface RecentMessageNumberAwareInterface
{
    /**
     * @return \SplInt
     */
    public function getRecentMessageNumber();
}
