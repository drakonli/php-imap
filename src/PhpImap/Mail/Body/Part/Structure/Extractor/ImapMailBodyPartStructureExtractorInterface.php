<?php

namespace PhpImap\Mail\Body\Part\Structure\Extractor;

use stdClass;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapMailBodyPartStructureExtractorInterface
{
    /**
     * @param stdClass $mailStructure
     *
     * @return array|\stdClass[] Array of structures part with additional NUMBER property - which is the
     * number by which to send request to imap server for body
     */
    public function extractPartsFromStructure(stdClass $mailStructure);
}