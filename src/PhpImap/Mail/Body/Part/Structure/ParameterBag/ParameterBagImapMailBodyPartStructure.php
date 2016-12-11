<?php

namespace PhpImap\Mail\Body\Part\Structure\ParameterBag;

use drakonli\PhpUtils\Parameter\Bag\Basic\AbstractBasicImmutableParameterBag;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class ParameterBagImapMailBodyPartStructure extends AbstractBasicImmutableParameterBag implements ImapMailBodyPartStructureInterface
{
    const FIELD_PRIMARY_BODY_TYPE = 'type';
    const FIELD_ENCODING = 'encoding';
    const FIELD_SUBTYPE = 'subtype';
    const FIELD_DESCRIPTION = 'description';
    const FIELD_ID = 'id';
    const FIELD_LINES_NUMBER = 'lines';
    const FIELD_BYTES_NUMBER = 'bytes';
    const FIELD_DISPOSITION = 'disposition';
    const FIELD_CONTENT_DISPOSITION_PARAMETERS = 'dparameters';
    const FIELD_PARAMETERS = 'parameters';

    // this is not part of structure
    const FIELD_NUMBER = 'number';

    /**
     * @inheritDoc
     */
    public function getPrimaryBodyType()
    {
        return $this->get(self::FIELD_PRIMARY_BODY_TYPE);
    }

    /**
     * @inheritDoc
     */
    public function getEncoding()
    {
        return $this->get(self::FIELD_ENCODING);
    }

    /**
     * @inheritDoc
     */
    public function getSubType()
    {
        return $this->get(self::FIELD_SUBTYPE);
    }

    /**
     * @inheritDoc
     */
    public function hasSubType()
    {
        return $this->has(self::FIELD_SUBTYPE);
    }

    /**
     * @inheritDoc
     */
    public function getDescription()
    {
        return $this->get(self::FIELD_DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function hasDescription()
    {
        return $this->has(self::FIELD_DESCRIPTION);
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->get(self::FIELD_ID);
    }

    /**
     * @inheritDoc
     */
    public function hasId()
    {
        return $this->has(self::FIELD_ID);
    }

    /**
     * @inheritDoc
     */
    public function getLinesNumber()
    {
        return $this->get(self::FIELD_LINES_NUMBER);
    }

    /**
     * @inheritDoc
     */
    public function getBytesNumber()
    {
        return $this->get(self::FIELD_BYTES_NUMBER);
    }

    /**
     * @inheritDoc
     */
    public function getDisposition()
    {
        return $this->get(self::FIELD_DISPOSITION);
    }

    /**
     * @inheritDoc
     */
    public function hasDisposition()
    {
        return $this->has(self::FIELD_DISPOSITION);
    }

    /**
     * @inheritDoc
     */
    public function getContentDispositionParameters()
    {
        return $this->get(self::FIELD_CONTENT_DISPOSITION_PARAMETERS);
    }

    /**
     * @inheritDoc
     */
    public function hasContentDispositionParameters()
    {
        return $this->has(self::FIELD_CONTENT_DISPOSITION_PARAMETERS);
    }

    /**
     * @inheritDoc
     */
    public function getParameters()
    {
        return $this->get(self::FIELD_PARAMETERS);
    }

    /**
     * @inheritDoc
     */
    public function hasParameters()
    {
        return $this->has(self::FIELD_PARAMETERS);
    }

    /**
     * @inheritDoc
     */
    public function getNumber()
    {
        return $this->get(self::FIELD_NUMBER);
    }

    /**
     * @inheritDoc
     */
    public function hasLinesNumber()
    {
        return $this->has(self::FIELD_LINES_NUMBER);
    }

    /**
     * @inheritDoc
     */
    public function hasBytesNumber()
    {
        return $this->has(self::FIELD_BYTES_NUMBER);
    }
}
