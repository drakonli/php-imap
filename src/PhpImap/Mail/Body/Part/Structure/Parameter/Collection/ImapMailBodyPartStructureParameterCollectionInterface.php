<?php

namespace PhpImap\Mail\Body\Part\Structure\Parameter\Collection;

use drakonli\PhpUtils\Collection\Immutable\ImmutableCollectionInterface;
use PhpImap\Mail\Body\Part\Structure\Parameter\ImapMailBodyPartStructureParameterInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapMailBodyPartStructureParameterCollectionInterface extends ImmutableCollectionInterface
{
    /**
     * @return ImapMailBodyPartStructureParameterInterface
     */
    public function current();

    /**
     * @param \SplString $attribute
     *
     * @return ImapMailBodyPartStructureParameterInterface
     */
    public function getParameterByAttribute(\SplString $attribute);

    /**
     * @param \SplString $attribute
     *
     * @return bool
     */
    public function hasParameterWithAttribute(\SplString $attribute);
}
