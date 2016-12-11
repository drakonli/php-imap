<?php

namespace PhpImap\Utility\Encoder;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ImapEncoderInterface
{
    /**
     * @param \SplString $string
     *
     * @return \SplString
     */
    public function encodeStringForImap(\SplString $string);
}
