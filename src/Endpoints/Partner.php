<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface postAccount(array $payload)
 * @method \Psr\Http\Message\StreamInterface getAccount(?array $payload = [])
 * @method \Psr\Http\Message\StreamInterface setPermissions(?array $payload = [])
 */
class Partner implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'partner';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'post-account' => [
                'method' => 'POST',
                'uri' => '/account',
                'required' => ['Name', 'EmailAddress']
            ],
            'get-account' => [
                'method' => 'GET',
                'uri' => '/account'
            ],
            'set-permissions' => [
                'method' => 'POST',
                'uri' => '/account/set-permissions'
            ],
        ];
    }
}
