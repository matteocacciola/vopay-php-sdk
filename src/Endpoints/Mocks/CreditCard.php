<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array generateEmbedUrl(array $payload)
 * @method array charge(array $payload)
 * @method array refund(array $payload)
 * @method array chargeTransaction(array $payload)
 * @method array get(?array $payload = [])
 */
class CreditCard implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'generate-embed-url' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'EmbedURL' => 'https://earthnode-dev.vopay.com/visa_direct/embed/?Token=123456',
                ],
                'required' => ['RedirectURL']
            ],
            'charge' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                ],
                'required' => ['CreditCardToken', 'Amount', 'Currency', 'Country']
            ],
            'refund' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                ],
                'required' => ['TransactionID'],
            ],
            'charge-transaction' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'TransactionDateTime' => '2019-11-01 12:00:00',
                    'Amount' => '2000',
                    'Currency' => 'CAD',
                    'CreditCardToken' => 'ACBDF-GAFSHD-AHBS-123456',
                    'Country' => 'CA',
                    'LastModified' => '2019-11-03 01:00:00',
                ],
                'required' => ['TransactionID'],
            ],
            'get' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'CreditCards' => [
                        0 => [
                            'CreditCardToken' => 'ACBDF-GAFSHD-AHBS-123456',
                            'CreditCardHolderName' => 'Natalie Merchant',
                            'CreditCardNumber' => '**** **** **** 1234',
                            'CreditCardExpiryYear' => '2022',
                            'CreditCardExpiryMonth' => '03',
                            'CreditCardBrand' => 'visa',
                        ],
                    ],
                ],
            ],
        ];
    }
}
