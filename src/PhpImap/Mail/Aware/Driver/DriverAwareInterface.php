<?php

namespace PhpImap\Mail\Aware\Driver;

/**
 * @author    drakonli - Arthur Vinogradov - <artur.drakonli@gmail.com>
 * @link      www.linkedin.com/in/drakonli
 */
interface DriverAwareInterface
{
    /**
     * @return \SplString
     */
    public function getDriver();
}
