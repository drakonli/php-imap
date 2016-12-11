<?php

namespace PhpImap\Connection\Config\Param;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigParamInterface
{
    const PARAM_DISABLE_AUTHENTICATOR = "DISABLE_AUTHENTICATOR";

    /**
     * @return \SplString
     */
    public function getName();

    /**
     * @return \SplString
     */
    public function getValue();
}
