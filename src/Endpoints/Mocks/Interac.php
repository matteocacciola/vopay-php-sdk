<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array moneyRequest(array $payload)
 * @method array moneyRequestTransaction(array $payload)
 * @method array bulkPayout(array $payload)
 * @method array bulkPayoutTransactionRequestCancellation(array $payload)
 * @method array bulkPayoutTransaction(array $payload)
 * @method array inboundTransaction(array $payload)
 */
class Interac implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'money-request' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                ],
                'required' => [
                    'Amount',
                    'Currency',
                    'EmailAddress',
                    'RecipientName',
                    'ClientReferenceNumber',
                ]
            ],
            'money-request-transaction' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'FailureReason' => '{Reason}',
                    'TransactionDateTime' => '2019-11-02 12:00:00',
                    'Amount' => '2000.00',
                    'Currency' => 'CAD',
                    'HoldAmount' => '2000.00',
                    'LastModified' => '2019-11-12 01:00:00',
                    'BatchFileName' => 'BMO_112567',
                    'Name' => 'John Doe',
                    'Email' => 'johndoe@email.com',
                    'PhoneNumber' => '6041235678',
                    'RecipientName' => 'John Doe',
                    'MessageForRecipient' => 'Message',
                    'ClientReferenceNumber' => '-',
                    'ConfirmationNumber' => '112233',
                    'ProcessingDate' => '2019-11-19 12:00:00',
                ],
            ],
            'bulk-payout' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                ],
                'required' => ['Amount', 'Currency', 'RecipientName', 'Question', 'Answer']
            ],
            'bulk-payout-transaction-request-cancellation' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1124',
                    'TransactionStatus' => 'cancellation requested',
                    'Timestamp' => '2019-11-26 12:00:00'
                ],
                'required' => ['TransactionID']
            ],
            'bulk-payout-transaction' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionStatus' => 'pending',
                    'FailureReason' => '-',
                    'TransactionDateTime' => '2019-11-02 12:00:00',
                    'Amount' => '2000.00',
                    'Currency' => 'CAD',
                    'HoldAmount' => '2000.00',
                    'LastModified' => '2019-11-12 12:00:00',
                    'SenderName' => 'John Doe',
                    'RecipientName' => 'Max Doe',
                    'EmailAddress' => 'maxdoe@email.com',
                    'Memo' => '-',
                    'ClientReferenceNumber' => '-',
                    'ConfirmationNumber' => '11223344',
                    'ProcessingDate' => '2019-12-01 12:00:00',
                    'CancellationPeriod' => '2',
                ],
            ],
            'inbound-transaction' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Transactions' => [
                        0 => [
                            'ID' => '1234',
                            'MessageID' => '1772b6ea650423asd',
                            'Name' => 'John Doe',
                            'Amount' => '2000.00',
                            'Status' => 'successful',
                            'Message' => '-',
                            'DateReceived' => '2019-11-19 12:00:00',
                        ],
                    ],
                ],
            ],
        ];
    }
}
