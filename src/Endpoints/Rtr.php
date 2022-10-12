<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array withdraw(array $payload)
 * @method array withdrawTransaction(array $payload)
 */
class Rtr implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'rtr';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'withdraw' => [
                'method' => 'POST',
                'uri' => '/withdraw',
                'required' => ['FirstName', 'LastName', 'Amount'],
            ],
            'withdraw-transaction' => [
                'method' => 'GET',
                'uri' => '/withdraw/transaction',
                'required' => ['TransactionID']
            ],
        ];
    }
}
