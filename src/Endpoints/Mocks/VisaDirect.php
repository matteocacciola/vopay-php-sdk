<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * array generateEmbedUrl(array $payload)
 * array pushFunds(array $payload)
 * array pushFundsTransaction(array $payload)
 * array cardInfo(array $payload)
 */
class VisaDirect implements VoPayContractMockEndpoint
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
                    'EmbedURL' => 'https://earthnode-dev.vopay.com/iq11/embed/?Token=123456',
                ],
                'required' => ['RedirectURL']
            ],
            'push-funds' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                ],
                'required' => ['Token', 'Amount', 'Currency']
            ],
            'push-funds-transaction' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'TransactionDateTime' => '2019-11-01 12:00:00',
                    'Amount' => '2000',
                    'Currency' => 'CAD',
                    'HoldAmount' => '2000',
                    'CompanyName*' => 'VoPay',
                    'FirstName*' => 'John',
                    'LastName' => 'Doe',
                    'ClientReferenceNumber' => '-',
                    'KYCPerformed' => '1',
                    'KYCReferenceNumber' => '-',
                    'VisaTransferID' => '1',
                    'LastModified' => '2019-11-03 01:00:00',
                ],
                'required' => ['TransactionID']
            ],
            'card-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'LastFourDigits' => '7890',
                    'Name' => 'John Doe',
                ],
                'required' => ['Token']
            ]
        ];
    }
}
