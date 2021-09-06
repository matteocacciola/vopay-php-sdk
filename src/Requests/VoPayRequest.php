<?php

namespace DataMat\VoPay\Requests;

use DataMat\VoPay\Exceptions\InvalidPayload;
use DataMat\VoPay\Interfaces\VoPayRequestContract;

class VoPayRequest extends AbstractRequest implements VoPayRequestContract
{
    /** @var string $method */
    private $method;

    /** @var string $uri */
    private $uri;

    /**
     * @param array $endpoint
     * @param array|null $payload
     *
     * @throws InvalidPayload
     */
    public function __construct(array $endpoint, ?array $payload = [])
    {
        $this->method = $endpoint['method'] ?? 'GET';
        $this->uri = $endpoint['uri'];
        $this->required = $endpoint['required'] ?? [];

        $this->payload = $payload;

        if (!$this->isValidPayload()) {
            throw new InvalidPayload();
        }
    }

    /**
     * @return string|null
     */
    public function getUri() : ?string
    {
        return $this->uri;
    }

    /**
     * @return string|null
     */
    public function getMethod() : ?string
    {
        return $this->method;
    }
}
