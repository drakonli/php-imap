<?php

namespace PhpImap\Mail\Attachment\File\Path\Generator\Basic;

use PhpImap\Mail\Attachment\File\Path\Generator\MailAttachmentFilePathGeneratorInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class BasicMailAttachmentFilePathGenerator implements MailAttachmentFilePathGeneratorInterface
{
    /**
     * @var string
     */
    private $attachmentsDir;

    /**
     * BasicMailAttachmentFilePathGenerator constructor.
     *
     * @param string $attachmentsDir
     */
    public function __construct($attachmentsDir)
    {
        $this->attachmentsDir = $attachmentsDir;
    }

    /**
     * @inheritDoc
     */
    public function generatePath(\SplInt $mailId, \SplString $attachmentId, \SplString $fileName)
    {
        $replace = array(
            '/\s/' => '_',
            '/[^0-9a-zа-яіїє_\.]/iu' => '',
            '/_+/' => '_',
            '/(^_)|(_$)/' => '',
        );

        $fileSysName = preg_replace(
            '~[\\\\/]~',
            '',
            (string)$mailId.'_'.(string)$attachmentId.'_'.preg_replace(
                array_keys($replace),
                $replace,
                (string)$fileName
            )
        );

        $filePath = $this->attachmentsDir.DIRECTORY_SEPARATOR.$fileSysName;

        if (strlen($filePath) > 255) {
            $ext = pathinfo($filePath, PATHINFO_EXTENSION);
            $filePath = substr($filePath, 0, 255 - 1 - strlen($ext)).".".$ext;
        }

        return new \SplString($filePath);
    }
}