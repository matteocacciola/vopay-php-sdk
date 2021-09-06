<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface postClientAccounts(array $payload)
 * @method \Psr\Http\Message\StreamInterface getClientAccounts(?array $payload = [])
 */
class ClientAccount implements VoPayContractEndpoint
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
            'post-client-accounts' => [
                'method' => 'POST',
                'uri' => '/client-accounts',
                'required' => [
                    'FirstName',
                    'LastName',
                    'EmailAddress',
                    'Address1',
                    'City',
                    'Province',
                    'Country',
                    'PostalCode'
                ]
            ],
            'get-client-accounts' => [
                'method' => 'GET',
                'uri' => '/client-accounts',
            ],
        ];
    }
}
