<?php

namespace PhpImap\Mail\Body\Decoder\Basic;

use PHPUnit\Framework\TestCase;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicImapMailBodyDecoderTest extends TestCase
{

    /**
     * @param $encoding
     * @param $encodedData
     * @param $decodedData
     *
     * @dataProvider getTestingData
     */
    public function test($encoding, $encodedData, $decodedData)
    {
        $bodyDecoder = new BasicImapMailBodyDecoder();


        $decodingResult = $bodyDecoder->decodeBody(new \SplInt($encoding), new \SplString($encodedData));

        $this->assertEquals($decodedData, (string)$decodingResult);
    }

    public function getTestingData()
    {
        $someString = 'someString';

        return [
            [ENC8BIT, utf8_encode($someString), $someString],
            [ENCQUOTEDPRINTABLE, quoted_printable_encode($someString), $someString],
            [ENCBASE64, base64_encode($someString), $someString],
            [ENCBINARY, imap_qprint(quoted_printable_encode($someString)), base64_encode($someString)],
        ];
    }
}
