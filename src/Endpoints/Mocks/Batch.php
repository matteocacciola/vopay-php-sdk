<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 *  @method array eftFund(array $payload)
 * @method array eftWithdraw(array $payload)
 * @method array interacMoneyRequest(array $payload)
 * @method array interacBulkPayout(array $payload)
 * @method array paylinkBeneficiaries(array $payload)
 * @method array get(?array $payload = [])
 * @method array details(array $payload)
 */
class Batch implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'eft-fund' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BatchTransactionRequestID' => '123456',
                    'TotalSubmittedTransactions' => '1000',
                    'NumberOfRejectedTransactions' => '5',
                    'RejectedTransactions' => [
                        '1' => 'Required parameter(s) missing: FirstName, LastName',
                        '3' => 'Required parameter(s) missing: PostalCode',
                    ],
                ],
                'required' => ['BatchName', 'BatchData'],
            ],
            'eft-withdraw' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BatchTransactionRequestID' => '123456',
                    'TotalSubmittedTransactions' => '1000',
                    'NumberOfRejectedTransactions' => '5',
                    'RejectedTransactions' => [
                        '1' => 'Required parameter(s) missing: FirstName, LastName',
                        '3' => 'Required parameter(s) missing: PostalCode',
                    ],
                ],
                'required' => ['BatchName', 'BatchData'],
            ],
            'interac-money-request' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BatchTransactionRequestID' => '123456',
                    'TotalSubmittedTransactions' => '1000',
                    'NumberOfRejectedTransactions' => '5',
                    'RejectedTransactions' => [
                        '1' => 'Required parameter(s) missing: FirstName, LastName',
                        '3' => 'Required parameter(s) missing: PostalCode',
                    ],
                ],
                'required' => ['BatchName', 'BatchData'],
            ],
            'interac-bulk-payout' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BatchTransactionRequestID' => '123456',
                    'TotalSubmittedTransactions' => '1000',
                    'NumberOfRejectedTransactions' => '5',
                    'RejectedTransactions' => [
                        '1' => 'Required parameter(s) missing: FirstName, LastName',
                        '3' => 'Required parameter(s) missing: PostalCode',
                    ],
                ],
                'required' => ['BatchName', 'BatchData'],
            ],
            'paylink-beneficiaries' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BatchTransactionRequestID' => '123456',
                    'TotalSubmittedTransactions' => '1000',
                    'NumberOfRejectedTransactions' => '5',
                    'RejectedTransactions' => [
                        '1' => 'Required parameter(s) missing: FirstName, LastName',
                        '3' => 'Required parameter(s) missing: PostalCode',
                    ],
                ],
                'required' => ['BatchName', 'BatchData'],
            ],
            'get' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Batches' => [
                        0 => [
                            'BatchTransactionRequestID' => '1234',
                            'BatchName' => 'Funding transactions - Jan 2022',
                            'TransactionType' => 'EFT',
                            'PaymentType' => 'Credit',
                            'NumRecords' => '950',
                            'TotalAmount' => '4560.34',
                            'DateAdded' => '2022-01-12',
                            'TotalSubmitted' => '45',
                            'TotalCreated' => '900',
                            'TotalFailed' => '5',
                        ],
                    ],
                ],
            ],
            'details' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BatchDetails' => [
                        0 => [
                            'BatchTransactionRequestDetailsRecordID' => '1234',
                            'TransactionPayload' => [],
                            'TransactionID' => '4567',
                            'ScheduledTransactionID' => '678',
                            'PaylinkRequestID' => '789',
                            'FailureReason' => 'Missing first name',
                            'Status' => '2022-01-12',
                        ],
                    ],
                ],
                'required' => ['BatchTransactionRequestID'],
            ],
        ];
    }
}
