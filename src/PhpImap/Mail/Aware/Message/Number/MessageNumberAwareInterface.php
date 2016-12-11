<?php

namespace PhpImap\Mail\Aware\Message\Number;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MessageNumberAwareInterface
{
    /**
     * @return \SplInt
     */
    public function getMessageNumber();
}
