<?php

namespace DataMat\VoPay\Exceptions;

class InvalidEndpoint extends \Exception
{
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct('VoPay: Invalid endpoint', $code, $previous);
    }
}
