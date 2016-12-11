<?php

namespace PhpImap\Mail\Header\Decoder;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapHeaderDecoderInterface
{
    /**
     * @param \SplString $header
     *
     * @return \SplString
     */
    public function decodeToString(\SplString $header);
}