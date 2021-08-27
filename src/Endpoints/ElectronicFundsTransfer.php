<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface fund(array $payload)
 * @method \Psr\Http\Message\StreamInterface fundStatus(array $payload)
 * @method \Psr\Http\Message\StreamInterface fundTransaction(array $payload)
 * @method \Psr\Http\Message\StreamInterface fundSchedule(array $payload)
 * @method \Psr\Http\Message\StreamInterface fundScheduleCancel(array $payload)
 * @method \Psr\Http\Message\StreamInterface fundScheduleEdit(array $payload)
 * @method \Psr\Http\Message\StreamInterface scheduledTransactions(array $payload)
 * @method \Psr\Http\Message\StreamInterface withdraw(array $payload)
 * @method \Psr\Http\Message\StreamInterface withdrawTransaction(array $payload)
 * @method \Psr\Http\Message\StreamInterface withdrawStatus(array $payload)
 * @method \Psr\Http\Message\StreamInterface failures(array $payload)
 */
class ElectronicFundsTransfer implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'eft';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'fund' => [
                'method' => 'POST',
                'uri' => '/fund',
                'required' => [
                    'AccountNumber',
                    'FinancialInstitutionNumber',
                    'BranchTransitNumber',
                    'Amount',
                ]
            ],
            'fund-status' => [
                'method' => 'GET',
                'uri' => '/fund/status',
                'required' => ['TransactionID']
            ],
            'fund-transaction' => [
                'method' => 'GET',
                'uri' => '/fund/transaction',
                'required' => ['TransactionID']
            ],
            'fund-schedule' => [
                'method' => 'POST',
                'uri' => '/fund/schedule',
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
                'method' => 'POST',
                'uri' => '/fund/schedule/cancel',
                'required' => ['ScheduledTransactionID']
            ],
            'fund-schedule-edit' => [
                'method' => 'POST',
                'uri' => '/fund/schedule/edit',
                'required' => ['ScheduledTransactionID', 'UpcomingPayment']
            ],
            'scheduled-transactions' => [
                'method' => 'GET',
                'uri' => '/scheduled-transactions',
                'required' => ['ScheduledTransactionID']
            ],
            'withdraw' => [
                'method' => 'POST',
                'uri' => '/withdraw',
                'required' => ['Amount']
            ],
            'withdraw-transaction' => [
                'method' => 'GET',
                'uri' => '/withdraw/transaction',
                'required' => ['TransactionID']
            ],
            'withdraw-status' => [
                'method' => 'GET',
                'uri' => '/withdraw/status',
                'required' => ['TransactionID']
            ],
            'failures' => [
                'method' => 'GET',
                'uri' => '/failures',
                'required' => ['StartDateTime', 'EndDateTime']
            ]
        ];
    }
}
