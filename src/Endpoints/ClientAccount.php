<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array postClientAccountsIndividual(array $payload)
 * @method array postClientAccountsBusiness(array $payload)
 * @method array getClientAccounts(?array $payload = [])
 */
class ClientAccount implements VoPayContractEndpoint
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
            'post-client-accounts-individuals' => [
                'method' => 'POST',
                'uri' => '/client-accounts/individual',
                'required' => [
                    'FirstName',
                    'LastName',
                    'EmailAddress',
                    'Address1',
                    'City',
                    'Province',
                    'Country',
                    'PostalCode',
                    'Currency',
                    'DOB',
                    'SINLastDigits'
                ]
            ],
            'post-client-accounts-business' => [
                'method' => 'POST',
                'uri' => '/client-accounts/business',
                'required' => [
                    'FirstName',
                    'LastName',
                    'EmailAddress',
                    'Address1',
                    'City',
                    'Province',
                    'Country',
                    'PostalCode',
                    'Currency',
                    'BusinessName',
                    'BusinessNumber',
                    'BusinessTypeID',
                    'BusinessTypeCategoryID',
                    'BusinessWebsite',
                    'BusinessPhone'
                ]
            ],
            'get-client-accounts' => [
                'method' => 'GET',
                'uri' => '/client-accounts',
            ],
        ];
    }
}
