<?php

namespace PhpImap\Mail\Aware\Box\Size;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxSizeAwareInterface
{
    /**
     * @return \SplInt
     */
    public function getMailBoxSize();
}
