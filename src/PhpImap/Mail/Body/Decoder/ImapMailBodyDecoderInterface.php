<?php

namespace PhpImap\Mail\Body\Decoder;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapMailBodyDecoderInterface
{
    /**
     * @param \SplInt    $encoding
     * @param \SplString $body
     *
     * @return \SplString
     */
    public function decodeBody(\SplInt $encoding, \SplString $body);
}
