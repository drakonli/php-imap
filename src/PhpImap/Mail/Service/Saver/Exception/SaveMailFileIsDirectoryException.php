<?php

namespace PhpImap\Mail\Service\Saver\Exception;

use Exception;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
class SaveMailFileIsDirectoryException extends Exception
{
    /**
     * SaveMailFileIsDirectoryException constructor.
     *
     * @param \SplFileInfo $file
     */
    public function __construct(\SplFileInfo $file)
    {
        parent::__construct(
            sprintf('Save mail path should be a file not directory: %s', $file->getPath())
        );
    }
}
