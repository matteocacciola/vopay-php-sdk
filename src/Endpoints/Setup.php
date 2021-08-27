<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface setPlaidCredentials(array $payload)
 * @method \Psr\Http\Message\StreamInterface setFlinksCredentials(array $payload)
 * @method \Psr\Http\Message\StreamInterface setInveriteCredentials(array $payload)
 */
class Setup implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'account';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'set-plaid-credentials' => [
                'method' => 'POST',
                'uri' => '/set-plaid-credentials',
                'required' => ['PlaidClientID', 'PlaidSecretKey', 'PlaidUrl']
            ],
            'set-flinks-credentials' => [
                'method' => 'POST',
                'uri' => '/set-flinks-credentials',
                'required' => ['FlinksUrl']
            ],
            'set-inverite-credentials' => [
                'method' => 'POST',
                'uri' => '/set-inverite-credentials',
                'required' => ['InveriteAPIKey', 'InveriteUrl']
            ],
        ];
    }
}
