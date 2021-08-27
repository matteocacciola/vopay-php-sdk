<?php

namespace DataMat\VoPay\Requests;

abstract class AbstractRequest
{
    /** @var array $payload */
    protected $payload;

    /** @var array $required */
    protected $required;

    /**
     * @inheritDoc
     */
    public function getPayload() : array
    {
        return $this->payload ?? [];
    }

    /**
     * @inheritDoc
     */
    public function getRequired() : array
    {
        return $this->required;
    }

    /**
     * @return bool
     */
    protected function isValidPayload() : bool
    {
        $count = 0;
        foreach ($this->required as $key) {
            if ((isset($this->payload[$key]) || array_key_exists($key, $this->payload)) &&
                !empty($this->payload[$key])
            ) {
                $count ++;
            }
        }

        return count($this->required) === $count;
    }
}
