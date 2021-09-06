<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array postSubaccount(array $payload)
 * @method array getSubaccount(?array $payload = [])
 * @method array subaccountSubmitExtendedInfo(array $payload)
 * @method array getSubaccountShareholderInfo(array $payload)
 * @method array postSubaccountShareholderInfo(array $payload, ?string $shareolderId = '')
 * @method array subaccountExtendedInfo(?array $payload = [])
 * @method array subaccountSetPermissions(?array $payload = [])
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
            'post-subaccount' => [
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
            'get-subaccount' => [
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
            'subaccount-submit-extended-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Message' => '-',
                ],
                'required' => [
                    'OriginatorName',
                    'Address',
                    'City',
                    'Province',
                    'PostalCode',
                    'Country',
                    'PhoneNumber',
                    'EmailAddress',
                    'NatureofBusiness',
                    'OrganizationalType',
                    'RegistrationNumber',
                    'RegistrationProvince',
                    'DateofIncorporation',
                    'AuthorizedFullLegalName',
                    'AuthorizedOccupation'
                ]
            ],
            'get-subaccount-shareholder-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'AccountName' => '-',
                    'ShareHolders' => [
                        0 => [
                            'FullName' => 'Share holder name',
                            'Ownership' => '20',
                            'Occupation' => '{string}',
                            'HomeAddress' => '123 address st, Vancouver',
                            'DateAdded' => '2019-11-03 01:00:00',
                        ],
                    ],
                ],
                'required' => ['Token']
            ],
            'post-subaccount-shareholder-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Message' => '-',
                ],
                'required' => [
                    'ShareholderFullName',
                    'ShareholderOwnership',
                    'ShareholderOccupation',
                    'ShareholderHomeAddress'
                ]
            ],
            'subaccount-extended-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ParentAccount' => '-',
                    'Subaccounts' => [
                        0 => [
                            'LegalBusinessName' => 'Company Legal Business Name',
                            'AccountName' => 'SubaccountName1',
                            'AccountID' => 'SubaccountID',
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
                            'NatureOfBusiness' => '{string}',
                            'OrganizationalType' => 'Public Limited Company',
                            'RegistrationNumber' => 'ABC123456789',
                            'RegistrationProvince' => '{string}',
                            'DateIncorporation' => '2000-01-01',
                            'FullLegalName' => true,
                            'Occupation' => true,
                            'ShareHolders' => [
                                0 => [
                                    'FullName' => 'Share holder name',
                                    'Ownership' => '20',
                                    'Occupation' => '{string}',
                                    'HomeAddress' => '123 address st, Vancouver',
                                    'DateAdded' => '2019-11-03 01:00:00',
                                    'LastModified' => '2019-11-03 01:00:00',
                                ],
                            ],
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
                'uri' => '/subaccount/extended-info',
            ],
            'subaccount-set-permissions' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
            ]
        ];
    }
}
