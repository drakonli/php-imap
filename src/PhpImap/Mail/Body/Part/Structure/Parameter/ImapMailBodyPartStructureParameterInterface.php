<?php

namespace PhpImap\Mail\Body\Part\Structure\Parameter;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapMailBodyPartStructureParameterInterface
{
    /**
     * @return \SplString
     */
    public function getAttribute();

    /**
     * @return \SplString
     */
    public function getValue();
}