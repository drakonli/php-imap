<?php

namespace PhpImap\Mail\Body\Part\Structure\Parameter\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Body\Part\Structure\Parameter\ImapMailBodyPartStructureParameterInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagImapMailBodyPartStructureParameter extends AbstractBasicImmutableParameterBag implements ImapMailBodyPartStructureParameterInterface
{
    const FIELD_ATTRIBUTE = 'attribute';
    const FIELD_VALUE = 'value';

    /**
     * @inheritDoc
     */
    public function getAttribute()
    {
        return $this->get(self::FIELD_ATTRIBUTE);
    }

    /**
     * @inheritDoc
     */
    public function getValue()
    {
        return $this->get(self::FIELD_VALUE);
    }
}