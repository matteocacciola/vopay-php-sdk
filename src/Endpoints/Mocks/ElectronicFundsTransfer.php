<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array fund(array $payload)
 * @method array fundStatus(array $payload)
 * @method array fundTransaction(array $payload)
 * @method array fundSchedule(array $payload)
 * @method array fundScheduleCancel(array $payload)
 * @method array fundScheduleEdit(array $payload)
 * @method array scheduledTransactions(array $payload)
 * @method array withdraw(array $payload)
 * @method array withdrawTransaction(array $payload)
 * @method array withdrawStatus(array $payload)
 * @method array failures(array $payload)
 */
class ElectronicFundsTransfer implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'fund' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                ],
                'required' => [
                    'AccountNumber',
                    'FinancialInstitutionNumber',
                    'BranchTransitNumber',
                    'Amount',
                ]
            ],
            'fund-status' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'SubTransactions' => [
                        0 => [
                            'TransactionID' => '5918',
                            'TransactionStatus' => 'waiting on required transaction',
                            'Timestamp' => '2019-11-01 12:00:00',
                        ],
                    ],
                    'Timestamp' => '2019-11-01 12:00:00',
                ],
                'required' => ['TransactionID']
            ],
            'fund-transaction' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'TransactionDateTime' => '2019-11-01 12:00:00',
                    'Amount' => '1200',
                    'Currency' => 'CAD',
                    'HoldAmount' => '1200',
                    'LastModified' => '2019-11-02 01:00:21',
                    'CompanyName*' => 'VoPay',
                    'FirstName*' => 'John',
                    'LastName*' => 'Doe',
                    'DOB' => '1960-03-14',
                    'PhoneNumber' => '602556****',
                    'Address1' => '112 Bentall Street',
                    'Address2' => '-',
                    'City' => 'Vancouver',
                    'Province' => 'BC',
                    'Country' => 'Canada',
                    'PostalCode' => 'V4W 5Z7',
                    'FinancialInstitutionNumber' => '112',
                    'BranchTransitNumber' => '11456',
                    'AccountNumber' => '1100456342',
                    'ClientReferenceNumber' => '876432',
                    'KYCPerformed' => '1',
                    'KYCReferenceNumber' => '-',
                    'ScheduledTransactionID' => '1',
                    'SubTransactions' => [
                        0 => [
                            'TransactionID' => '9826',
                            'TransactionStatus' => 'waiting on required transaction',
                            'TransactionDateTime' => '2019-11-01 12:00:00',
                            'Amount' => '100',
                            'Currency' => 'CAD',
                            'HoldAmount' => '100',
                            'LastModified' => '2019-11-02 01:00:21',
                            'CompanyName*' => 'VoPay',
                            'FirstName*' => 'John',
                            'LastName*' => 'Doe',
                            'DOB' => '1960-03-14',
                            'PhoneNumber' => '602556****',
                            'Address1' => '112 Bentall Street',
                            'Address2' => '-',
                            'City' => 'Vancouver',
                            'Province' => 'BC',
                            'Country' => 'Canada',
                            'PostalCode' => 'V4W 5Z7',
                            'FinancialInstitutionNumber' => '112',
                            'BranchTransitNumber' => '11456',
                            'AccountNumber' => '1100456342',
                            'ClientReferenceNumber' => '876432',
                            'KYCPerformed' => '1',
                            'KYCReferenceNumber' => '-',
                        ],
                    ],
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
                'required' => ['TransactionID']
            ],
            'fund-schedule' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Amount' => '200.00',
                    'ScheduledTransactionID' => '1122',
                    'Frequency' => 'single',
                    'Description' => '-',
                    'ScheduleStartDate' => '2020-01-01',
                    'Status' => 'in progress',
                ],
                'required' => [
                    'Amount',
                    'Frequency',
                    'NameOfFrequency',
                    'ScheduleStartDate',
                    'ScheduleEndDate',
                    'EndingAfterPayments',
                    'Description',
                    'AccountNumber',
                    'FinancialInstitutionNumber',
                    'BranchTransitNumber'
                ]
            ],
            'fund-schedule-cancel' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Status' => 'cancelled',
                ],
                'required' => ['ScheduledTransactionID']
            ],
            'fund-schedule-edit' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['ScheduledTransactionID', 'UpcomingPayment']
            ],
            'scheduled-transactions' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'NumberOfRecords' => '1',
                    'ScheduledTransactions' => [
                        0 => [
                            'ID' => '15',
                            'Amount' => '25.00',
                            'Frequency' => 'recurring',
                            'Description' => 'Scheduled transaction 1234',
                            'NameOfFrequency' => 'weekly',
                            'Status' => 'in progress',
                            'StartDate' => '2020-01-01',
                            'EndDate' => '2021-01-01',
                            'EndingAfterPayments' => '12',
                            'ScheduledDetails' => [
                                0 => [
                                    'FlinksAccountID' => 'ACBDF-GAFSHD-AHBS-123456',
                                    'FlinksLoginID' => 'ACBDF-GAFSHD-AHBS-123456',
                                    'Token' => 'ACBDF-GAFSHD-AHBS-123456',
                                    'PlaidAccessToken' => 'ACBDF-GAFSHD-AHBS-123456',
                                    'PlaidAccountID' => 'ACBDF-GAFSHD-AHBS-123456',
                                    'PlaidPublicToken' => 'ACBDF-GAFSHD-AHBS-123456',
                                    'PlaidProcessorToken' => 'ACBDF-GAFSHD-AHBS-123456',
                                    'AccountNumber' => '*****387',
                                    'FinancialInstitutionNumber' => '112',
                                    'BranchTransitNumber' => '**809',
                                    'CompanyName*' => 'VoPay',
                                    'FirstName*' => 'John',
                                    'LastName*' => 'Doe',
                                    'Address' => '112 Bentall Street',
                                    'City' => 'Vancouver',
                                    'PostalCode' => 'V2W 4V6',
                                    'Province' => 'BC',
                                    'Country' => 'Canada',
                                    'DOB' => '1965-08-11',
                                    'EmailAddress' => 'john.doe@vopay.com',
                                    'IPAddress' => 'Canada',
                                    'PhoneNumber' => '604556****',
                                    'ClientReferenceNumber' => '-',
                                    'KYCPerformed' => '1',
                                    'KYCReferenceNumber' => '-',
                                    'ErrorMessage' => [
                                        '2020-11-01' => [
                                            'Success' => false,
                                            'ErrorMessage' => '-',
                                        ],
                                        '2020-12-01' => [
                                            'Success' => false,
                                            'ErrorMessage' => '-',
                                        ],
                                    ],
                                ],
                            ],
                            'UpcomingTransactions' => [
                                0 => [
                                    'TransactionID' => '{integer}',
                                    'ScheduledDate' => '2020-01-01',
                                    'ProcessingDate' => '{string}',
                                    'LastModified' => '{string}',
                                    'Status' => '{string}',
                                    'Amount' => '10.00',
                                ],
                            ],
                            'CompletedTransactions' => [
                                0 => [
                                    'TransactionID' => '1',
                                    'ScheduledDate' => '2020-01-01',
                                    'ProcessingDate' => '2020-01-02',
                                    'LastModified' => '2020-01-02',
                                    'Status' => 'pending',
                                    'Amount' => '10.00',
                                ],
                            ],
                        ],
                    ],
                ],
                'required' => ['ScheduledTransactionID']
            ],
            'withdraw' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                ],
                'required' => ['Amount']
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
                    'HoldAmount' => '2000',
                    'LastModified' => '2019-11-03 01:00:00',
                    'CompanyName*' => 'VoPay',
                    'FirstName*' => 'John',
                    'LastName' => 'Doe',
                    'DOB' => '1965-08-11',
                    'PhoneNumber' => '604556****',
                    'Address1' => '112 Bentall Street',
                    'Address2' => '-',
                    'City' => 'Vancouver',
                    'Province' => 'BC',
                    'Country' => 'Canada',
                    'PostalCode' => 'V2W 4V6',
                    'FinancialInstitutionNumber' => '112',
                    'BranchTransitNumber' => '11809',
                    'IBAN' => '-',
                    'ABARoutingNumber' => '-',
                    'SortCode' => '-',
                    'AccountNumber' => '227654387',
                    'ClientReferenceNumber' => '-',
                    'KYCPerformed' => '1',
                    'KYCReferenceNumber' => '-',
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
                'required' => ['TransactionID']
            ],
            'withdraw-status' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'Timestamp' => '2019-11-02 12:00:00',
                ],
                'required' => ['TransactionID']
            ],
            'failures' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'NumberOfRecords' => '1',
                    'FailedTransactions' => [
                        0 => [
                            'TransactionID' => '5918',
                            'TransactionDateTime' => '2019-12-04 18:13:39',
                            'TransactionType' => 'EFT Funding',
                            'DollarAmount' => '25.00',
                            'ErrorCode' => '901',
                            'FailureReason' => 'insufficient funds',
                            'ClientReferenceNumber' => 'null',
                        ],
                    ],
                ],
                'required' => ['StartDateTime', 'EndDateTime']
            ]
        ];
    }
}
