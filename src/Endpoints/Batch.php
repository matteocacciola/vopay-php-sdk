<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array eftFund(array $payload)
 * @method array eftWithdraw(array $payload)
 * @method array interacMoneyRequest(array $payload)
 * @method array interacBulkPayout(array $payload)
 * @method array paylinkBeneficiaries(array $payload)
 * @method array get(?array $payload = [])
 * @method array details(array $payload)
 */
class Batch implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'batch';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'eft-fund' => [
                'method' => 'POST',
                'uri' => '/eft/fund',
                'required' => ['BatchName', 'BatchData'],
            ],
            'eft-withdraw' => [
                'method' => 'POST',
                'uri' => '/eft/withdraw',
                'required' => ['BatchName', 'BatchData'],
            ],
            'interac-money-request' => [
                'method' => 'POST',
                'uri' => '/interac/money-request',
                'required' => ['BatchName', 'BatchData'],
            ],
            'interac-bulk-payout' => [
                'method' => 'POST',
                'uri' => '/interac/bulk-payout',
                'required' => ['BatchName', 'BatchData'],
            ],
            'paylink-beneficiaries' => [
                'method' => 'POST',
                'uri' => '/pay-link/beneficiaries',
                'required' => ['BatchName', 'BatchData'],
            ],
            'get' => [
                'method' => 'GET',
                'uri' => '',
            ],
            'details' => [
                'method' => 'GET',
                'uri' => '/details',
                'required' => ['BatchTransactionRequestID'],
            ],
        ];
    }
}
