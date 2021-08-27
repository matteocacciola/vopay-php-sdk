<?php

namespace DataMat\VoPay\Factories;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;

class VoPayFactory
{
    /**
     * @param string $class
     *
     * @return VoPayContractEndpoint
     */
    public static function build(string $class) : VoPayContractEndpoint
    {
        if (!class_exists($class)) {
            throw new \BadMethodCallException();
        }

        return new $class();
    }
}
