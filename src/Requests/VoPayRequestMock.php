<?php

namespace DataMat\VoPay\Requests;

use DataMat\VoPay\Exceptions\InvalidPayload;
use DataMat\VoPay\Interfaces\VoPayRequestContract;

class VoPayRequestMock extends AbstractRequest implements VoPayRequestContract
{
    /** @var array response */
    private $response;

    /**
     * @param array $endpoint
     * @param array $payload
     *
     * @throws InvalidPayload
     */
    public function __construct(array $endpoint, array $payload)
    {
        $this->response = $endpoint['mock'];
        $this->required = $endpoint['required'] ?? [];

        $this->payload = $payload;

        if (!$this->isValidPayload()) {
            throw new InvalidPayload();
        }
    }

    /**
     * @return array
     */
    public function getResponse() : array
    {
        return $this->response;
    }
}
