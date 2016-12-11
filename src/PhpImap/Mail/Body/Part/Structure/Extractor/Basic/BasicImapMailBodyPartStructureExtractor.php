<?php

namespace PhpImap\Mail\Body\Part\Structure\Extractor\Basic;

use PhpImap\Mail\Body\Part\Structure\Extractor\ImapMailBodyPartStructureExtractorInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;
use stdClass;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapMailBodyPartStructureExtractor implements ImapMailBodyPartStructureExtractorInterface
{
    /**
     * @inheritDoc
     */
    public function extractPartsFromStructure(stdClass $mailStructure)
    {
        $parts = [];

        if (false === isset($mailStructure->parts) || [] === $mailStructure->parts) {
            $mailStructure->number = '0';

            $parts[] = $mailStructure;

            return $parts;
        }

        foreach ($mailStructure->parts as $partNum => $partStructure) {
            $parts = array_merge($parts, $this->extractPartsRecursive($partStructure, strval($partNum + 1)));
        }

        return $parts;
    }

    /**
     * @param stdClass $partStructure
     * @param string   $partNum
     *
     * @return array
     */
    private function extractPartsRecursive(stdClass $partStructure, $partNum)
    {
        $partStructure->number = $partNum;

        $parts = [];
        $parts[] = $partStructure;

        if (false === isset($partStructure->parts) || [] === $partStructure->parts) {
            return $parts;
        }

        foreach ($partStructure->parts as $subPartNum => $subPartStructure) {
            $nextPartNumber = $partNum.'.'.($subPartNum + 1);

            $type = $partStructure->type;
            $subType = $partStructure->subtype;

            if ($type == TYPEMESSAGE && $subType == ImapMailBodyPartStructureInterface::SUBTYPE_RFC822) {
                $nextPartNumber = $partNum;
            }

            $parts = array_merge($parts, $this->extractPartsRecursive($subPartStructure, $nextPartNumber));
        }

        return $parts;
    }
}
