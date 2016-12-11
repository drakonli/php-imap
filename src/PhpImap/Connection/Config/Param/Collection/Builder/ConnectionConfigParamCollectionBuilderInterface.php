<?php

namespace PhpImap\Connection\Config\Param\Collection\Builder;

use drakonli\PhpUtils\Builder\BuilderInterface;
use PhpImap\Connection\Config\Param\Collection\ConnectionConfigParamCollectionInterface;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface ConnectionConfigParamCollectionBuilderInterface extends BuilderInterface 
{
    /**
     * @return ConnectionConfigParamCollectionInterface
     */
    public function getParams();

    /**
     * @param \SplString $authenticator
     *
     * @return self
     */
    public function addDisableAuthenticatorParam(\SplString $authenticator);
}
