<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array fund(array $payload)
 * @method array void(array $payload)
 * @method array refund(array $payload)
 * @method array fundTransaction(array $payload)
 */
class Ach implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'ach';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'fund' => [
                'method' => 'POST',
                'uri' => '/fund',
                'required' => [
                    'IdentificationNumber',
                    'EmailAddress',
                    'PhoneNumber',
                    'Address1',
                    'City',
                    'State',
                    'Country',
                    'ZipCode',
                    'ABARoutingNumber',
                    'AccountNumber',
                    'Amount'
                ],
            ],
            'void' => [
                'method' => 'POST',
                'uri' => '/void',
                'required' => ['TransactionID'],
            ],
            'refund' => [
                'method' => 'POST',
                'uri' => '/refund',
                'required' => ['TransactionID'],
            ],
            'fund-transaction' => [
                'method' => 'GET',
                'uri' => '/fund/transaction',
                'required' => ['TransactionID'],
            ],
        ];
    }
}
