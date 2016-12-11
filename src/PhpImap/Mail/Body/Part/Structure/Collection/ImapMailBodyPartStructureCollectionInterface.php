<?php

namespace PhpImap\Mail\Body\Part\Structure\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapMailBodyPartStructureCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return ImapMailBodyPartStructureInterface
     */
    public function current();
}