<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array generateEmbedUrl(array $payload)
 * @method array charge(array $payload)
 * @method array refund(array $payload)
 * @method array chargeTransaction(array $payload)
 * @method array get(?array $payload = [])
 */
class CreditCard implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'credit-card';

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
            'charge' => [
                'method' => 'POST',
                'uri' => '/charge',
                'required' => ['CreditCardToken', 'Amount', 'Currency', 'Country']
            ],
            'refund' => [
                'method' => 'POST',
                'uri' => '/refund',
                'required' => ['TransactionID'],
            ],
            'charge-transaction' => [
                'method' => 'GET',
                'uri' => '/charge/transaction',
                'required' => ['TransactionID'],
            ],
            'get' => [
                'method' => 'GET',
                'uri' => '',
            ],
        ];
    }
}
