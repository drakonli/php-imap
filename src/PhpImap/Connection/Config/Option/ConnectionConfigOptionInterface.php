<?php

namespace PhpImap\Connection\Config\Option;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigOptionInterface
{
    const OPTION_READONLY_MODE = OP_READONLY;
    const OPTION_ANONYMOUS_MODE = OP_ANONYMOUS;
    const OPTION_OPEN_CONNECTION_NOT_MAILBOX = OP_HALFOPEN;
    const OPTION_DELETE_MAIL_MARKED_FOR_DELETION_UPON_DISCONNECT = CL_EXPUNGE;
    const OPTION_DEBUG_MODE = OP_DEBUG;
    const OPTION_ELT_ONLY_CACHE = OP_SHORTCACHE;
    const OPTION_USE_DRIVER_PROTOTYPE = OP_PROTOTYPE;
    const OPTION_RESTRICT_TO_SECURE_AUTHENTICATION = OP_SECURE;

    /**
     * @return \SplInt
     */
    public function getValue();
}
