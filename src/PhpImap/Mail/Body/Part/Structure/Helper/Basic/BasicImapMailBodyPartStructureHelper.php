<?php

namespace PhpImap\Mail\Body\Part\Structure\Helper\Basic;

use PhpImap\Mail\Body\Part\Structure\Helper\ImapMailBodyPartStructureHelperInterface;
use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapMailBodyPartStructureHelper implements ImapMailBodyPartStructureHelperInterface
{
    /**
     * @inheritDoc
     */
    public function isAttachmentPart(ImapMailBodyPartStructureInterface $part)
    {
        // Attachment with correct Content-Disposition header
        if (true === $part->hasDisposition()) {
            $dispositionIsAttachment = 'attachment' === strtolower($part->getDisposition());
            $dispositionIsInline = 'inline' === strtolower($part->getDisposition());

            if (($dispositionIsAttachment || $dispositionIsInline) && strtoupper($part->getSubType()) != "PLAIN") {
                return true;
            }
        }

        // Attachment without Content-Disposition header
        if (true === $part->hasParameters()) {
            foreach ($part->getParameters() as $parameter) {
                if ('name' === strtolower($parameter->getAttribute())
                    || 'filename' === strtolower($parameter->getAttribute())
                ) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function isHtmlContentPart(ImapMailBodyPartStructureInterface $part)
    {
        if (true === $this->isAttachmentPart($part)) {
            return false;
        }

        $bodyType = (int)$part->getPrimaryBodyType();
        $subType = strtoupper((string)$part->getSubType());

        if (TYPETEXT === $bodyType && $subType !== ImapMailBodyPartStructureInterface::SUBTYPE_PLAIN) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function isPlainContentPart(ImapMailBodyPartStructureInterface $part)
    {
        if (true === $this->isAttachmentPart($part)) {
            return false;
        }

        $bodyType = (int)$part->getPrimaryBodyType();
        $subType = strtoupper((string)$part->getSubType());

        if (TYPETEXT === $bodyType && $subType === ImapMailBodyPartStructureInterface::SUBTYPE_PLAIN) {
            return true;
        }

        if (TYPEMESSAGE === $bodyType) {
            return true;
        }

        return false;
    }
}
