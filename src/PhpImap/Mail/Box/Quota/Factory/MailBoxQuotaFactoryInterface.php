<?php

namespace PhpImap\Mail\Box\Quota\Factory;

use PhpImap\Mail\Box\Quota\MailBoxQuotaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxQuotaFactoryInterface
{
    /**
     * @param \SplInt $usedSpace  kilobytes
     * @param \SplInt $spaceLimit kilobytes
     *
     * @return MailBoxQuotaInterface
     */
    public function createQuota(\SplInt $usedSpace, \SplInt $spaceLimit);
}
