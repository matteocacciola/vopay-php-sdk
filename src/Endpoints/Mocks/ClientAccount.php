<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array postClientAccounts(array $payload)
 * @method array getClientAccounts(?array $payload = [])
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
            'post-client-accounts' => [
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
                    'PostalCode'
                ]
            ],
            'get-client-accounts' => [
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
        ];
    }
}
