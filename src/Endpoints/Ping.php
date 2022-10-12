<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array ping(?array $payload = [])
 * @method array authPing(array $payload)
 */
class Ping implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = '';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'ping' => [
                'method' => 'POST',
                'uri' => '/ping',
            ],
            'auth-ping' => [
                'method' => 'POST',
                'uri' => '/auth/ping',
            ],
        ];
    }
}
