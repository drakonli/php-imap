<?php

namespace PhpImap\Mail\Box\Quota\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Box\Quota\MailBoxQuotaInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagMailBoxQuota extends AbstractBasicImmutableParameterBag implements MailBoxQuotaInterface
{
    const FIELD_USAGE = 'usage';
    const FIELD_LIMIT = 'limit';

    /**
     * @inheritDoc
     */
    public function getUsage()
    {
        return $this->get(self::FIELD_USAGE);
    }

    /**
     * @inheritDoc
     */
    public function getLimit()
    {
        return $this->get(self::FIELD_LIMIT);
    }
}
