<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array postAccount(array $payload)
 * @method array getAccount(?array $payload = [])
 * @method array accountBusinessCase(array $payload)
 * @method array setPermissions(?array $payload = [])
 * @method array billingPackages(?array $payload = [])
 * @method array invoiceDetails(?array $payload = [])
 */
class Partner implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'post-account' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Message' => '{string}',
                    'AccountID' => 'AccountTest1',
                    'APISharedSecret' => 'AbcDefGi+KlmnopQRSTu183==',
                    'APIKey' => 'eddc0f5e37d20f98b486daf842447ec1f225f859',
                ],
                'required' => ['Name', 'EmailAddress']
            ],
            'get-account' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'PartnerAccount' => 'ParentAccount1',
                    'Accounts' => [
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
                            'ShareHolders' => [
                                0 => [
                                    'ID' => '{integer}',
                                    'FullName' => 'Share holder name',
                                    'Ownership' => '20',
                                    'Occupation' => '{string}',
                                    'HomeAddress' => '123 address st, Vancouver',
                                    'DateAdded' => '2019-11-03 01:00:00',
                                ],
                            ],
                            'SigningAuthorities' => [
                                0 => [
                                    'ID' => '{integer}',
                                    'FullName' => 'Signing Authority name',
                                    'Occupation' => '{string}',
                                    'EmailAddress' => 'signingauthority@gmail.com',
                                    'HomeAddress' => '123 address st, Vancouver',
                                    'DateAdded' => '2019-11-03 01:00:00',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            'account-business-case' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => [
                    'VopayAccountID',
                    'BusinessName',
                    'BusinessEmail',
                    'DoingBusinessAs',
                    'WebsiteURL',
                    'BusinessModel',
                    'MSB',
                    'NumberofYearsInBusiness',
                ],
            ],
            'set-permissions' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-'
                ],
            ],
            'billing-packages' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BillingPackages' => [
                        0 => [
                            'PackageID' => '1234',
                            'PackageName' => 'Enterprise Billing Package',
                            'DateAdded' => '2019-11-03 01:00:00',
                            'CreatedBy' => 'ABC Partner',
                            'Currency' => 'CAD',
                        ],
                    ],
                ],
            ],
            'invoice-details' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'InvoicePeriod' => [
                        'FromDate' => '2021-10-01',
                        'ToDate' => '2021-10-31',
                    ],
                    'InvoiceDetails' => [
                        'AccountID' => [
                            'Currency' => [
                                'Service' => [
                                    'description' => 'EFT Funding Transaction fee',
                                    'quantity' => '50',
                                    'rate' => '1.50',
                                    'amount' => '75',
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ];
    }
}
