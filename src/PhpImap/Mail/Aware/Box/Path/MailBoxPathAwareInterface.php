<?php

namespace PhpImap\Mail\Aware\Box\Path;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxPathAwareInterface
{
    /**
     * @return \SplString
     */
    public function getMailBoxPath();
}
