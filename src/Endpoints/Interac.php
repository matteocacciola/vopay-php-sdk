<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface moneyRequest(array $payload)
 * @method \Psr\Http\Message\StreamInterface moneyRequestTransaction(?array $payload = [])
 * @method \Psr\Http\Message\StreamInterface bulkPayout(array $payload)
 * @method \Psr\Http\Message\StreamInterface bulkPayoutTransactionRequestCancellation(array $payload)
 * @method \Psr\Http\Message\StreamInterface bulkPayoutTransaction(?array $payload = [])
 * @method \Psr\Http\Message\StreamInterface inboundTransaction(?array $payload = [])
 */
class Interac implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'interac';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'money-request' => [
                'method' => 'POST',
                'uri' => '/money-request',
                'required' => [
                    'Amount',
                    'Currency',
                    'EmailAddress',
                    'RecipientName',
                    'ClientReferenceNumber',
                ]
            ],
            'money-request-transaction' => [
                'method' => 'GET',
                'uri' => '/money-request/transaction',
            ],
            'bulk-payout' => [
                'method' => 'POST',
                'uri' => '/bulk-payout',
                'required' => ['Amount', 'Currency', 'RecipientName', 'Question', 'Answer']
            ],
            'bulk-payout-transaction-request-cancellation' => [
                'method' => 'POST',
                'uri' => '/bulk-payout/transaction/request-cancellation',
                'required' => ['TransactionID']
            ],
            'bulk-payout-transaction' => [
                'method' => 'GET',
                'uri' => '/bulk-payout/transaction',
            ],
            'inbound-transaction' => [
                'method' => 'GET',
                'uri' => '/inbound/transaction',
            ],
        ];
    }
}
