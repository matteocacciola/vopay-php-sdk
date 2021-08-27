<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface generateEmbedUrl(array $payload)
 * @method \Psr\Http\Message\StreamInterface pushFunds(array $payload)
 * @method \Psr\Http\Message\StreamInterface pushFundsTransaction(array $payload)
 * @method \Psr\Http\Message\StreamInterface cardInfo(array $payload)
 */
class VisaDirect implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'visa-direct';

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
            'push-funds' => [
                'method' => 'POST',
                'uri' => '/push-funds',
                'required' => ['Token', 'Amount', 'Currency']
            ],
            'push-funds-transaction' => [
                'method' => 'GET',
                'uri' => '/push-funds/transaction',
                'required' => ['TransactionID']
            ],
            'card-info' => [
                'method' => 'GET',
                'uri' => '/card-info',
                'required' => ['Token']
            ]
        ];
    }
}
