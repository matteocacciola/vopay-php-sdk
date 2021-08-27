<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface balance(array $payload)
 * @method \Psr\Http\Message\StreamInterface transactions(array $payload)
 * @method \Psr\Http\Message\StreamInterface transactionsCancel(array $payload)
 * @method \Psr\Http\Message\StreamInterface webhookUrl(array $payload)
 * @method \Psr\Http\Message\StreamInterface webhookUrlInfo(array $payload)
 * @method \Psr\Http\Message\StreamInterface webhookUrlTest(array $payload)
 * @method \Psr\Http\Message\StreamInterface transferTo(array $payload)
 * @method \Psr\Http\Message\StreamInterface transferFrom(array $payload)
 * @method \Psr\Http\Message\StreamInterface postAutoBalanceTransfer(array $payload)
 * @method \Psr\Http\Message\StreamInterface getAutoBalanceTransfer(array $payload)
 * @method \Psr\Http\Message\StreamInterface autoBalanceTransferCancel(array $payload)
 * @method \Psr\Http\Message\StreamInterface postAuthorizedIps(array $payload)
 * @method \Psr\Http\Message\StreamInterface getAuthorizedIps(array $payload)
 */
class Account implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'account';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'balance' => [
                'method' => 'GET',
                'uri' => '/balance',
            ],
            'transactions' => [
                'method' => 'GET',
                'uri' => '/transactions',
                'required' => ['StartDateTime', 'EndDateTime']
            ],
            'transactions-cancel' => [
                'method' => 'POST',
                'uri' => '/transactions/cancel',
                'required' => ['TransactionID']
            ],
            'webhook-url' => [
                'method' => 'POST',
                'uri' => '/webhook-url',
            ],
            'webhook-url-info' => [
                'method' => 'GET',
                'uri' => '/webhook-url/info',
            ],
            'webhook-url-test' => [
                'method' => 'GET',
                'uri' => '/webhook-url/test',
            ],
            'transfer-to' => [
                'method' => 'POST',
                'uri' => '/transfer-to',
                'required' => ['Amount', 'RecipientAccountID']
            ],
            'transfer-from' => [
                'method' => 'POST',
                'uri' => '/transfer-from',
                'required' => ['Amount', 'DebitorAccountID']
            ],
            'post-auto-balance-transfer' => [
                'method' => 'POST',
                'uri' => '/auto-balance-transfer',
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
                'method' => 'GET',
                'uri' => '/auto-balance-transfer',
            ],
            'auto-balance-transfer-cancel' => [
                'method' => 'POST',
                'uri' => '/auto-balance-transfer/cancel',
            ],
            'post-authorized-ips' => [
                'method' => 'POST',
                'uri' => '/authorized-ips',
                'required' => ['AuthorizedIPs']
            ],
            'get-authorized-ips' => [
                'method' => 'GET',
                'uri' => '/authorized-ips',
            ],
        ];
    }
}
