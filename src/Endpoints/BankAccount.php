<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array delete(array $payload)
 * @method array get(?array $payload = [])
 * @method array defaultBankAccount(?array $payload = [])
 */
class BankAccount implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'bank-account';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'delete' => [
                'method' => 'POST',
                'uri' => '/delete',
                'required' => ['Token']
            ],
            'get' => [
                'method' => 'GET',
                'uri' => '',
            ],
            'default-bank-account' => [
                'method' => 'GET',
                'uri' => '/default-bank-account',
            ],
        ];
    }
}
