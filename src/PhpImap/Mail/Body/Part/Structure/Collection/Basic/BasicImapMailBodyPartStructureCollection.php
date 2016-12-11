<?php

namespace PhpImap\Mail\Body\Part\Structure\Collection\Basic;

use drakonli\PhpUtils\Collection\Immutable\Basic\AbstractBasicImmutableCollection;
use PhpImap\Mail\Body\Part\Structure\Collection\ImapMailBodyPartStructureCollectionInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapMailBodyPartStructureCollection extends AbstractBasicImmutableCollection implements ImapMailBodyPartStructureCollectionInterface
{
    /**
     * BasicImapMailBodyPartStructureCollection constructor.
     *
     * @param array|ImapMailBodyPartStructureInterface[] $structureParts
     */
    public function __construct(array $structureParts)
    {
        parent::__construct($structureParts);
    }
}