<?php

namespace PhpImap\Mail\Body\Part\Structure;

use PhpImap\Mail\Body\Part\Structure\Parameter\Collection\ImapMailBodyPartStructureParameterCollectionInterface;

/**
 * @see       imap_fetchstructure(), imap_body()
 *
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapMailBodyPartStructureInterface
{
    const SUBTYPE_PLAIN = 'PLAIN';
    const SUBTYPE_TEXT = 'TEXT';
    const SUBTYPE_HTML = 'HTML';
    const SUBTYPE_MIXED = 'MIXED';
    const SUBTYPE_ALTERNATIVE = 'ALTERNATIVE';
    const SUBTYPE_RELATED = 'RELATED';
    const SUBTYPE_RFC822 = 'RFC822';

    /**
     * @return \SplInt
     */
    public function getPrimaryBodyType();

    /**
     * @return \SplInt
     */
    public function getEncoding();

    /**
     * @return \SplString
     */
    public function getSubType();

    /**
     * @return bool
     */
    public function hasSubType();

    /**
     * @return \SplString
     */
    public function getDescription();

    /**
     * @return bool
     */
    public function hasDescription();

    /**
     * @return \SplString
     */
    public function getId();

    /**
     * @return bool
     */
    public function hasId();

    /**
     * @return \SplInt
     */
    public function getLinesNumber();

    /**
     * @return bool
     */
    public function hasLinesNumber();

    /**
     * @return \SplInt
     */
    public function getBytesNumber();

    /**
     * @return bool
     */
    public function hasBytesNumber();

    /**
     * @return \SplString
     */
    public function getDisposition();

    /**
     * @return bool
     */
    public function hasDisposition();

    /**
     * @return ImapMailBodyPartStructureParameterCollectionInterface
     */
    public function getContentDispositionParameters();

    /**
     * @return bool
     */
    public function hasContentDispositionParameters();

    /**
     * @return ImapMailBodyPartStructureParameterCollectionInterface
     */
    public function getParameters();

    /**
     * @return bool
     */
    public function hasParameters();

    /**
     * @return \SplString
     */
    public function getNumber();
}
