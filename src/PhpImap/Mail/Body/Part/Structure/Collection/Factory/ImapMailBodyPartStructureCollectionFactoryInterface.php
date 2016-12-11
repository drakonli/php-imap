<?php

namespace PhpImap\Mail\Body\Part\Structure\Collection\Factory;

use PhpImap\Mail\Body\Part\Structure\Collection\ImapMailBodyPartStructureCollectionInterface;
use stdClass;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapMailBodyPartStructureCollectionFactoryInterface
{
    /**
     * @see imap_fetchstructure(), imap_body()
     *
     * @param stdClass $mailStructure
     *
     * @return ImapMailBodyPartStructureCollectionInterface
     */
    public function createPartCollectionByStructure(stdClass $mailStructure);
}