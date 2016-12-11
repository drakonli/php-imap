<?php

namespace PhpImap\Mail\Aware\Message\Deleted\Number;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface DeletedMessageNumberAwareInterface
{
    /**
     * @return \SplInt
     */
    public function getDeletedMessageNumber();
}
