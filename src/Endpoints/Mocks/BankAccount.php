<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array delete(array $payload)
 * @method array get(?array $payload = [])
 * @method array defaultBankAccount(?array $payload = [])
 */
class BankAccount implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'delete' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['Token']
            ],
            'get' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BankAccounts' => [
                        0 => [
                            'AccountHolderName' => 'John Smith',
                            'InstitutionName' => 'CIBC',
                            'FinancialInstituionNumber' => '010',
                            'BranchTransitNumber' => '00390',
                            'AccountNumber' => '*****1234',
                            'Currency' => 'CAD',
                            'Token' => 'ACBDF-GAFSHD-AHBS-123456',
                            'FlinksAccountID' => 'ACBDF-GAFSHD-AHBS-123456',
                            'FlinksLoginID' => 'ACBDF-GAFSHD-AHBS-123456',
                            'PlaidAccountID' => 'ACBDF-GAFSHD-AHBS-123456',
                            'InveriteRequestGUID' => 'ACBDF-GAFSHD-AHBS-123456',
                            'ClientControlledBankAccount' => '1',
                            'IsDefault' => 'true',
                            'ClientAccountID' => 'ClientAccount1',
                            'ClientReferenceNumber' => 'ABC123',
                            'Address' => '123 Fake st',
                            'City' => 'Vancouver',
                            'Province' => 'BC',
                            'PostalCode' => 'A1A1A1',
                            'DateAdded' => '2019-11-03 01:00:00',
                        ],
                    ],
                ],
            ],
            'default-bank-account' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'DefaultBankAccount' => [
                        0 => [
                            'AccountHolderName' => 'John Smith',
                            'InstitutionName' => 'CIBC',
                            'FinancialInstituionNumber' => '010',
                            'BranchTransitNumber' => '00390',
                            'AccountNumber' => '*****1234',
                            'Currency' => 'CAD',
                            'Token' => 'ACBDF-GAFSHD-AHBS-123456',
                            'FlinksAccountID' => 'ACBDF-GAFSHD-AHBS-123456',
                            'FlinksLoginID' => 'ACBDF-GAFSHD-AHBS-123456',
                            'PlaidAccountID' => 'ACBDF-GAFSHD-AHBS-123456',
                            'InveriteRequestGUID' => 'ACBDF-GAFSHD-AHBS-123456',
                            'ClientControlledBankAccount' => '1',
                            'IsDefault' => 'true',
                            'ClientAccountID' => 'ClientAccount1',
                            'ClientReferenceNumber' => 'ABC123',
                            'Address' => '123 Fake st',
                            'City' => 'Vancouver',
                            'Province' => 'BC',
                            'PostalCode' => 'A1A1A1',
                            'DateAdded' => '2019-11-03 01:00:00',
                        ],
                    ],
                ],
            ],
        ];
    }
}
