<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array individual(array $payload)
 * @method array business(array $payload)
 * @method array get(?array $payload = [])
 * @method array balance(array $payload)
 * @method array edit(array $payload)
 * @method array delete(array $payload)
 * @method array deactivate(array $payload)
 * @method array activate(array $payload)
 * @method array fundTransfer(array $payload)
 * @method array transferWithdraw(array $payload)
 * @method array fundTransferWithdraw(array $payload)
 * @method array generateEmbedUrl(array $payload)
 */
class ClientAccount implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'account/client-accounts';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'individual' => [
                'method' => 'POST',
                'uri' => '/individual',
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
            'business' => [
                'method' => 'POST',
                'uri' => '/business',
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
                ],
            ],
            'receive-only' => [
                'method' => 'POST',
                'uri' => '/receive-only',
                'required' => [
                    'EmailAddress',
                    'Address1',
                    'City',
                    'Province',
                    'Country',
                    'PostalCode',
                    'Currency',
                ],
            ],
            'get' => [
                'method' => 'GET',
                'uri' => '',
            ],
            'balance' => [
                'method' => 'GET',
                'uri' => '/balance',
                'required' => ['ClientAccountID'],
            ],
            'edit' => [
                'method' => 'POST',
                'uri' => '/edit',
                'required' => ['ClientAccountID'],
            ],
            'delete' => [
                'method' => 'POST',
                'uri' => '/delete',
                'required' => ['ClientAccountID'],
            ],
            'deactivate' => [
                'method' => 'POST',
                'uri' => '/deactivate',
                'required' => ['ClientAccountID'],
            ],
            'activate' => [
                'method' => 'POST',
                'uri' => '/activate',
                'required' => ['ClientAccountID'],
            ],
            'fund-transfer' => [
                'method' => 'POST',
                'uri' => '/fund-transfer',
                'required' => ['DebitorClientAccountID', 'RecipientClientAccountID', 'Amount'],
            ],
            'transfer-withdraw' => [
                'method' => 'POST',
                'uri' => '/transfer-withdraw',
                'required' => ['DebitorClientAccountID', 'RecipientClientAccountID', 'Amount'],
            ],
            'fund-transfer-withdraw' => [
                'method' => 'POST',
                'uri' => '/fund-transfer-withdraw',
                'required' => ['DebitorClientAccountID', 'RecipientClientAccountID', 'Amount'],
            ],
            'generate-embed-url' => [
                'method' => 'POST',
                'uri' => '/generate-embed-url',
                'required' => ['ClientAccountType'],
            ],
        ];
    }
}
