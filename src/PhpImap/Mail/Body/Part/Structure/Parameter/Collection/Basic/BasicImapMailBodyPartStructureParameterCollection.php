<?php

namespace PhpImap\Mail\Body\Part\Structure\Parameter\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Mail\Body\Part\Structure\Parameter\Collection\ImapMailBodyPartStructureParameterCollectionInterface;
use PhpImap\Mail\Body\Part\Structure\Parameter\ImapMailBodyPartStructureParameterInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 *
 * @method array|ImapMailBodyPartStructureParameterInterface[] getElements
 */
class BasicImapMailBodyPartStructureParameterCollection extends AbstractBasicImmutableCollection implements ImapMailBodyPartStructureParameterCollectionInterface
{
    /**
     * @var array|ImapMailBodyPartStructureParameterInterface[]
     */
    private $parametersIndexByAttribute;

    /**
     * BasicImapMailBodyPartStructureParameterCollection constructor.
     *
     * @param array|ImapMailBodyPartStructureParameterInterface[] $parameters
     */
    public function __construct(array $parameters)
    {
        parent::__construct($parameters);
    }

    /**
     * @inheritDoc
     */
    public function getParameterByAttribute(\SplString $attribute)
    {
        $parameters = $this->getParametersIndexedByAttribute();

        return $parameters[(string)$attribute];
    }

    /**
     * @inheritDoc
     */
    public function hasParameterWithAttribute(\SplString $attribute)
    {
        $parameters = $this->getParametersIndexedByAttribute();

        return array_key_exists((string)$attribute, $parameters);
    }

    /**
     * @return array|ImapMailBodyPartStructureParameterInterface[]
     */
    private function getParametersIndexedByAttribute()
    {
        if (null === $this->parametersIndexByAttribute) {
            $this->parametersIndexByAttribute = [];

            foreach ($this->getElements() as $element) {
                $this->parametersIndexByAttribute[(string)$element->getAttribute()] = $element;
            }
        }

        return $this->parametersIndexByAttribute;
    }
}
