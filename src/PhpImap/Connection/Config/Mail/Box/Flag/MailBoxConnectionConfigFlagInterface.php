<?php

namespace PhpImap\Connection\Config\Mail\Box\Flag;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface MailBoxConnectionConfigFlagInterface
{
    const FLAG_SECURE = 'secure';
    const FLAG_TLS = 'tls';
    const FLAG_NO_RSH = 'norsh';
    const FLAG_DEBUG = 'debug';
    const FLAG_WITH_VALUE_USER = 'user';
    const FLAG_NO_TLS = 'notls';
    const FLAG_NO_VALIDATE_CERT = 'novalidate-cert';
    const FLAG_VALIDATE_CERT = 'validate-cert';
    const FLAG_SSL = 'ssl';
    const FLAG_WITH_VALUE_SERVICE = 'service';
    const FLAG_READONLY = 'readonly';
    const FLAG_WITH_VALUE_AUTH_USER = 'authuser';
    const FLAG_ANONYMOUS = 'anonymous';

    /**
     * @return \SplString
     */
    public function getName();

    /**
     * @return \SplString
     */
    public function getValue();

    /**
     * @return bool
     */
    public function hasValue();
}
