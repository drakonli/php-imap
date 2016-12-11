<?php

namespace PhpImap\Mail\Box\Quota\Factory\ParameterBag;

use PhpImap\Mail\Box\Quota\Factory\MailBoxQuotaFactoryInterface;
use PhpImap\Mail\Box\Quota\ParameterBag\ParameterBagMailBoxQuota;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxQuotaFactory implements MailBoxQuotaFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function createQuota(\SplInt $usedSpace, \SplInt $spaceLimit)
    {
        $data = [
            ParameterBagMailBoxQuota::FIELD_LIMIT => $spaceLimit,
            ParameterBagMailBoxQuota::FIELD_USAGE => $usedSpace,
        ];

        return new ParameterBagMailBoxQuota($data);
    }
}
