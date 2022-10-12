<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array post(array $payload)
 * @method array get(?array $payload = [])
 * @method array setPermissions(?array $payload = [])
 */
class SubAccount implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'post' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Message' => '{string}',
                    'AccountID' => 'AccountTest1',
                    'APISharedSecret' => 'AbcDefGi+KlmnopQRSTu183==',
                    'APIKey' => 'eddc0f5e37d20f98b486daf842447ec1f225f859',
                ],
                'required' => ['LegalBusinessName', 'SubaccountID', 'EmailAddress', 'SendWelcomeEmail']
            ],
            'get' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ParentAccount' => 'ParentAccount1',
                    'Subaccounts' => [
                        0 => [
                            'LegalBusinessName' => 'Company Legal Business Name',
                            'AccountName' => 'SubaccountName1',
                            'AccountID' => 'Subaccount1',
                            'OrginatorName' => '{string}',
                            'OriginatorShortName' => '{string}',
                            'Email' => 'subaccount.mail@email.com',
                            'Phone' => '604556****',
                            'Fax' => '604556****',
                            'City' => 'Vancouver',
                            'Province' => 'BC',
                            'Country' => 'Canada',
                            'PostalCode' => 'V2W 4V6',
                            'Address' => '112 Bentall Street',
                            'APISharedSecret' => 'AbcDefGi+KlmnopQRSTu183==',
                            'FlinksUrl' => 'https://www.mycompany.com/flinks-url',
                            'WebhookUrl' => 'https://www.mycompany.com/webhook-listener',
                            'IsActive' => true,
                            'GCMEnabled' => true,
                            'EFTCollectEnabled' => true,
                            'EFTSendEnabled' => true,
                            'USDEFTCollectEnabled' => true,
                            'USDEFTSendEnabled' => true,
                            'VisaDirectEnabled' => true,
                            'InteracMoneyRequestEnabled' => true,
                            'InteracBulkPayoutEnabled' => true,
                            'PayLinkEnabled' => true,
                            'Balances' => [
                                0 => [
                                    'Currency' => 'CAD',
                                    'AccountBalance' => '20000.00',
                                    'PendingBalance' => '5540.24',
                                    'SecurityDeposit' => '50000.00',
                                    'AvailableImmediately' => '0.00',
                                    'AvailableBalance' => '18000.00',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'set-permissions' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
            ]
        ];
    }
}
