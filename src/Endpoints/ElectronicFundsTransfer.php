<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

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
 * @method array withdrawSchedule(array $payload)
 * @method array withdrawScheduleCancel(array $payload)
 * @method array withdrawScheduleEdit(array $payload)
 * @method array failures(array $payload)
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
                'required' => ['Amount', 'Token']
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
            'withdraw-schedule' => [
                'method' => 'POST',
                'uri' => '/withdraw/schedule',
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
            'withdraw-schedule-cancel' => [
                'method' => 'POST',
                'uri' => '/withdraw/schedule/cancel',
                'required' => ['ScheduledTransactionID']
            ],
            'withdraw-schedule-edit' => [
                'method' => 'POST',
                'uri' => '/withdraw/schedule/edit',
                'required' => ['ScheduledTransactionID', 'UpcomingPayment']
            ],




            'failures' => [
                'method' => 'GET',
                'uri' => '/failures',
                'required' => ['StartDateTime', 'EndDateTime']
            ]
        ];
    }
}
