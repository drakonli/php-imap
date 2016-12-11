<?php

namespace PhpImap\Utility\Decoder;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapDecoderInterface
{
    /**
     * @param \SplString $string
     *
     * @return \SplString
     */
    public function decodeStringForImap(\SplString $string);
}
