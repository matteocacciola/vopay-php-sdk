<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array fund(array $payload)
 * @method array void(array $payload)
 * @method array refund(array $payload)
 * @method array fundTransaction(array $payload)
 */
class Ach implements VoPayContractMockEndpoint
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
                    'IdentificationNumber',
                    'EmailAddress',
                    'PhoneNumber',
                    'Address1',
                    'City',
                    'State',
                    'Country',
                    'ZipCode',
                    'ABARoutingNumber',
                    'AccountNumber',
                    'Amount'
                ],
            ],
            'void' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1124',
                    'TransactionStatus' => 'cancelled',
                    'Timestamp' => '2022-02-04 12:34:56'
                ],
                'required' => ['TransactionID']
            ],
            'refund' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1124',
                    'Timestamp' => '2022-02-04 12:34:56'
                ],
                'required' => ['TransactionID'],
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
                    'Address2' => '{string}',
                    'City' => 'Vancouver',
                    'Province/State' => 'BC',
                    'Country' => 'Canada',
                    'PostalCode/Zipcode' => 'V4W 5Z7',
                    'FinancialInstitutionNumber' => '112',
                    'BranchTransitNumber' => '11456',
                    'AccountNumber' => '1100456342',
                    'ClientReferenceNumber' => '876432',
                    'KYCPerformed' => '1',
                    'KYCReferenceNumber' => '{string}',
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
                            'Address2' => '{string}',
                            'City' => 'Vancouver',
                            'Province' => 'BC',
                            'Country' => 'Canada',
                            'PostalCode' => 'V4W 5Z7',
                            'FinancialInstitutionNumber' => '112',
                            'BranchTransitNumber' => '11456',
                            'AccountNumber' => '1100456342',
                            'ClientReferenceNumber' => '876432',
                            'KYCPerformed' => '1',
                            'KYCReferenceNumber' => '{string}',
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
                            'FailureReason' => '{string}',
                            'PayLinkCreated' => '2019-11-03 01:00:00',
                        ],
                    ],
                ],
                'required' => ['TransactionID'],
            ],
        ];
    }
}
