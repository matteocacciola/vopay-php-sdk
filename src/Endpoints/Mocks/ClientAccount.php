<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array individual(array $payload)
 * @method array business(array $payload)
 * @method array get(?array $payload = [])
 * @method array balance(array $payload)
 * @method array edit(array $payload)
 * @method array delete(array $payload)
 * @method array deactivate(array $payload)
 * @method array activate(array $payload)
 * @method array fundTransfer(array $payload)
 * @method array transferWithdraw(array $payload)
 * @method array fundTransferWithdraw(array $payload)
 * @method array generateEmbedUrl(array $payload)
 */
class ClientAccount implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'individual' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ClientAccountID' => 'ClientAccount1'
                ],
                'required' => [
                    'FirstName',
                    'LastName',
                    'EmailAddress',
                    'Address1',
                    'City',
                    'Province',
                    'Country',
                    'PostalCode',
                    'Currency',
                    'DOB',
                    'SINLastDigits',
                ],
            ],
            'business' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ClientAccountID' => 'ClientAccount1',
                ],
                'required' => [
                    'FirstName',
                    'LastName',
                    'EmailAddress',
                    'Address1',
                    'City',
                    'Province',
                    'Country',
                    'PostalCode',
                    'Currency',
                    'BusinessName',
                    'BusinessNumber',
                    'BusinessTypeID',
                    'BusinessTypeCategoryID',
                    'BusinessWebsite',
                    'BusinessPhone',
                ],
            ],
            'receive-only' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ClientAccountID' => 'ClientAccount1',
                ],
                'required' => [
                    'EmailAddress',
                    'Address1',
                    'City',
                    'Province',
                    'Country',
                    'PostalCode',
                    'Currency',
                ],
            ],
            'get' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ClientAccounts' => [
                        0 => [
                            'ClientAccountID' => 'ClientAccount1',
                            'ClientType' => '{string}',
                            'ClientName' => 'John Doe',
                            'EmailAddress' => 'subaccount.mail@email.com',
                            'IsActive' => '{boolean}',
                            'NumberOfTransactions' => '{integer}',
                            'Address1' => '112 Bentall Street',
                            'Address2' => '112 Bentall Street',
                            'City' => 'Vancouver',
                            'Province' => 'BC',
                            'Country' => 'Canada',
                            'BusinessNumber' => '123456789',
                            'BusinessWebsite' => 'www.example.com',
                            'Phone' => '6045551234',
                            'BusinessIndustry' => 'Retail',
                            'BusinessCategory' => 'Home Electronics',
                            'Balances' => [
                                0 => [
                                    'Currency' => 'CAD',
                                    'AccountBalance' => '20000.00',
                                    'PendingBalance' => '5540.24',
                                    'AvailableBalance' => '18000.00',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'balance' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'AccountBalance' => '20000.00',
                    'PendingFunds' => '5540.24',
                    'SecurityDeposit' => '50000.00',
                    'AvailableFunds' => '18000.00',
                    'Currency' => 'CAD',
                ],
                'required' => ['ClientAccountID'],
            ],
            'edit' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['ClientAccountID'],
            ],
            'delete' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ClientAccountID' => '1122',
                    'IsActive' => '0',
                    'DateDeleted' => '2021-11-03 01:00:00',
                ],
                'required' => ['ClientAccountID'],
            ],
            'deactivate' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ClientAccountID' => '1122',
                    'IsActive' => '0',
                ],
                'required' => ['ClientAccountID'],
            ],
            'activate' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ClientAccountID' => '1122',
                    'IsActive' => '1',
                ],
                'required' => ['ClientAccountID'],
            ],
            'fund-transfer' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'FundingTransactionID' => '1122',
                    'AccountTransferID' => '2244',
                ],
                'required' => ['DebitorClientAccountID', 'RecipientClientAccountID', 'Amount'],
            ],
            'transfer-withdraw' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'WithdrawTransactionID' => '1122',
                    'AccountTransferID' => '2244',
                ],
                'required' => ['DebitorClientAccountID', 'RecipientClientAccountID', 'Amount'],
            ],
            'fund-transfer-withdraw' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'FundingTransactionID' => '1122',
                    'WithdrawTransactionID' => '1122',
                    'AccountTransferID' => '2244',
                ],
                'required' => ['DebitorClientAccountID', 'RecipientClientAccountID', 'Amount'],
            ],
            'generate-embed-url' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'OnboardingLink' => 'https://client-account.vopay.com?Token=1234568&ClientAccountType=individual',
                    'EmailSent' => 'true',
                ],
                'required' => ['ClientAccountType'],
            ],
        ];
    }
}
