<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array balance(?array $payload = [])
 * @method array transactions(array $payload)
 * @method array transactionsCancel(array $payload)
 * @method array webhookUrl(?array $payload = [])
 * @method array webhookUrlInfo(?array $payload = [])
 * @method array webhookUrlTest(?array $payload = [])
 * @method array transferTo(array $payload)
 * @method array transferFrom(array $payload)
 * @method array postAutoBalanceTransfer(array $payload)
 * @method array getAutoBalanceTransfer(?array $payload = [])
 * @method array autoBalanceTransferCancel(?array $payload = [])
 * @method array postAuthorizedIps(array $payload)
 * @method array getAuthorizedIps(?array $payload = [])
 */
class Account implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'balance' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'AccountBalance' => '20000.00',
                    'PendingFunds' => '5540.24',
                    'SecurityDeposit' => '50000.00',
                    'AvailableImmediately' => '0.00',
                    'AvailableFunds' => '18000.00',
                    'Currency' => 'CAD',
                ],
            ],
            'transactions' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'NumberOfRecords' => '0',
                    'Transactions' => [
                        0 => [
                            'TransactionID' => '5918',
                            'TransactionDateTime' => '2019-12-04 18:13:39',
                            'TransactionType' => 'Reversal',
                            'Notes' => 'Transaction cancelled',
                            'DebitAmount' => '100.00',
                            'CreditAmount' => '0.00',
                            'Currency' => 'CAD',
                            'HoldAmount' => '0.00',
                            'LastModified' => '2019-12-04 18:13:39',
                            'ParentTransactionID' => '5909',
                            'ChildTransactionIDs' => '{}',
                            'ClientReferenceNumber' => 'null',
                            'ScheduledTransactionID' => '1',
                            'PayLinkDetails' => [
                                0 => [
                                    'FirstName' => 'John',
                                    'LastName' => 'Doe',
                                    'EmailAddress' => 'john.doe@vopay.com',
                                    'InvoiceNumber' => 'ABC1234',
                                    'Note' => 'Paylink requested to the client 123',
                                    'SenderName' => 'John Doe',
                                    'PayLinkStatus' => 'pending',
                                    'FailureReason' => '-',
                                    'PayLinkCreated' => '2019-11-03 01:00:00',
                                ],
                            ],
                        ],
                    ],
                ],
                'required' => ['StartDateTime', 'EndDateTime']
            ],
            'transactions-cancel' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1124',
                    'TransactionStatus' => 'cancelled',
                    'Timestamp' => '2019-11-26 12:00:00',
                ],
                'required' => ['TransactionID']
            ],
            'webhook-url' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
            ],
            'webhook-url-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'WebHookURL' => '-',
                ],
            ],
            'webhook-url-test' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
            ],
            'transfer-to' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                ],
                'required' => ['Amount', 'RecipientAccountID']
            ],
            'transfer-from' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                ],
                'required' => ['Amount', 'DebitorAccountID']
            ],
            'post-auto-balance-transfer' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => [
                    'ScheduleStartDate',
                    'AutoBalanceTransferAmount',
                    'TypeOfFrequency',
                    'AccountNumber',
                    'FinancialInstitutionNumber',
                    'BranchTransitNumber'
                ]
            ],
            'get-auto-balance-transfer' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'ScheduleStartDate' => '2020-01-01',
                    'Description' => '-',
                    'NameOfFrequency' => 'recurring',
                    'AutoBalanceTransferAmount' => '25.00',
                    'Status' => 'in progress',
                    'CompanyName*' => 'VoPay',
                    'FirstName*' => 'John',
                    'LastName*' => 'Doe',
                    'EmailAddress' => 'john.doe@vopay.com',
                    'Address' => '112 Bentall Street',
                    'City' => 'Vancouver',
                    'Province' => 'BC',
                    'Country' => 'Canada',
                    'PostalCode' => 'V2W 4V6',
                    'FlinksAccountID' => 'ACBDF-GAFSHD-AHBS-123456',
                    'FlinksLoginID' => 'ACBDF-GAFSHD-AHBS-123456',
                    'Token' => 'ACBDF-GAFSHD-AHBS-123456',
                    'PlaidAccessToken' => 'ACBDF-GAFSHD-AHBS-123456',
                    'PlaidAccountID' => 'ACBDF-GAFSHD-AHBS-123456',
                    'PlaidPublicToken' => 'ACBDF-GAFSHD-AHBS-123456',
                    'PlaidProcessorToken' => 'ACBDF-GAFSHD-AHBS-123456',
                    'InveriteRequestGUID' => 'ACBDF-GAFSHD-AHBS-123456',
                    'AccountNumber' => '*****387',
                    'FinancialInstitutionNumber' => '112',
                    'BranchTransitNumber' => '**809',
                ],
            ],
            'auto-balance-transfer-cancel' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Status' => 'cancelled',
                ],
            ],
            'post-authorized-ips' => [
                'mock' =>  [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'AuthorizedIPs' => '127.0.0.1, 0.0.0.0',
                ],
                'required' => ['AuthorizedIPs']
            ],
            'get-authorized-ips' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'AuthorizedIPs' => '127.0.0.1, 0.0.0.0',
                ],
            ],
        ];
    }
}
