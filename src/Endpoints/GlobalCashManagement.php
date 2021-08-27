<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface currencies(array $payload)
 * @method \Psr\Http\Message\StreamInterface conversion(array $payload)
 * @method \Psr\Http\Message\StreamInterface conversionTransaction(array $payload)
 * @method \Psr\Http\Message\StreamInterface conversionRate(array $payload)
 * @method \Psr\Http\Message\StreamInterface conversionQuote(array $payload)
 */
class GlobalCashManagement implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'gcm';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'currencies' => [
                'method' => 'GET',
                'uri' => '/currencies',
            ],
            'conversion' => [
                'method' => 'POST',
                'uri' => '/conversion',
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
            'conversion-transaction' => [
                'method' => 'GET',
                'uri' => '/conversion/transaction',
                'required' => ['TransactionID']
            ],
            'conversion-rate' => [
                'method' => 'GET',
                'uri' => '/conversion/rate',
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
            'conversion-quote' => [
                'method' => 'GET',
                'uri' => '/conversion/quote',
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
        ];
    }
}
