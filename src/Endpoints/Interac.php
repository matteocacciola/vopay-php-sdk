<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array moneyRequest(array $payload)
 * @method array moneyRequestTransaction(?array $payload = [])
 * @method array bulkPayout(array $payload)
 * @method array bulkPayoutTransactionRequestCancellation(array $payload)
 * @method array bulkPayoutTransaction(?array $payload = [])
 * @method array inboundTransaction(?array $payload = [])
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
