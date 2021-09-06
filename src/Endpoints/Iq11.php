<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface generateEmbedUrl(array $payload)
 * @method \Psr\Http\Message\StreamInterface tokenInfo(array $payload)
 * @method \Psr\Http\Message\StreamInterface tokenize(?array $payload = [])
 */
class Iq11 implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'iq11';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'generate-embed-url' => [
                'method' => 'POST',
                'uri' => '/generate-embed-url',
                'required' => ['RedirectURL']
            ],
            'token-info' => [
                'method' => 'GET',
                'uri' => '/token-info',
                'required' => ['Token']
            ],
            'tokenize' => [
                'method' => 'POST',
                'uri' => '/tokenize',
            ],
        ];
    }
}
