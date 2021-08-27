<?php

namespace DataMat\VoPay\Exceptions;

class InvalidPayload extends \Exception
{
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        parent::__construct('VoPay: Invalid payload', $code, $previous);
    }
}
