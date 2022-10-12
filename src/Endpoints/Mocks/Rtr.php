<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array withdraw(array $payload)
 * @method array withdrawTransaction(array $payload)
 */
class Rtr implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'withdraw' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'Flagged' => 'The transaction has been flagged as a potential duplicate.',
                ],
                'required' => ['FirstName', 'LastName', 'Amount'],
            ],
            'withdraw-transaction' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'TransactionDateTime' => '2019-11-01 12:00:00',
                    'Amount' => '2000',
                    'Currency' => 'CAD',
                    'RecipientName' => 'VoPay',
                    'FinancialInstitutionNumber' => '112',
                    'BranchTransitNumber' => '11809',
                    'AccountNumber' => '227654387',
                    'ClientReferenceNumber' => '123456789',
                    'ProcessingDate' => '2019-11-03 01:00:00',
                    'LastModified' => '2019-11-03 01:00:00',
                ],
                'required' => ['TransactionID']
            ],
        ];
    }
}
