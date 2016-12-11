<?php

namespace PhpImap\Mail\Box\Quota;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxQuotaInterface
{
    /**
     * Kilobytes of used space
     *
     * @return \SplInt
     */
    public function getUsage();

    /**
     * Kilobytes of space limit
     *
     * @return \SplInt
     */
    public function getLimit();
}
