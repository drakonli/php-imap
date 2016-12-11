<?php

namespace PhpImap\Mail\Body\Part\Structure\Helper;

use PhpImap\Mail\Body\Part\Structure\ImapMailBodyPartStructureInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapMailBodyPartStructureHelperInterface
{
    /**
     * @param ImapMailBodyPartStructureInterface $part
     *
     * @return bool
     */
    public function isAttachmentPart(ImapMailBodyPartStructureInterface $part);

    /**
     * @param ImapMailBodyPartStructureInterface $part
     *
     * @return bool
     */
    public function isHtmlContentPart(ImapMailBodyPartStructureInterface $part);

    /**
     * @param ImapMailBodyPartStructureInterface $part
     *
     * @return bool
     */
    public function isPlainContentPart(ImapMailBodyPartStructureInterface $part);
}
