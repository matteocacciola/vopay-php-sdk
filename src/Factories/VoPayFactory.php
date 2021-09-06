<?php

namespace DataMat\VoPay\Factories;

use DataMat\VoPay\Interfaces\VoPayContract;

class VoPayFactory
{
    /**
     * @param string $class
     *
     * @return VoPayContract
     */
    public static function build(string $class) : VoPayContract
    {
        if (!class_exists($class)) {
            throw new \BadMethodCallException();
        }

        return new $class();
    }
}
