<?php

namespace PhpImap\Connection\Config\Option\Collection\Factory;

use PhpImap\Connection\Config\Option\Collection\ConnectionConfigOptionCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigOptionCollectionFactoryInterface
{
    const NON_STRICT_OPTION_READONLY_MODE = 'readonly';
    const NON_STRICT_OPTION_ANONYMOUS_MODE = 'anonymous_mode';
    const NON_STRICT_OPTION_OPEN_CONNECTION_NOT_MAILBOX = 'open_connection_not_mailbox';
    const NON_STRICT_OPTION_DELETE_MAIL_MARKED_FOR_DELETION_UPON_DISCONNECT = 'delete_marked_mail_upon_disconnect';
    const NON_STRICT_OPTION_DEBUG_MODE = 'debug_mode';
    const NON_STRICT_OPTION_ELT_ONLY_CACHE = 'elt_only_cache';
    const NON_STRICT_OPTION_USE_DRIVER_PROTOTYPE = 'use_driver_prototype';
    const NON_STRICT_OPTION_RESTRICT_TO_SECURE_AUTHENTICATION = 'restrict_to_secure_authentication';
    
    /**
     * @param array $options [ConnectionConfigOptionInterface::OPTION_READONLY_MODE, etc]
     *
     * @return ConnectionConfigOptionCollectionInterface
     */
    public function createOptionCollection(array $options);
}
