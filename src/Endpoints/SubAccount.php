<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array postSubaccount(array $payload)
 * @method array getSubaccount(?array $payload = [])
 * @method array subaccountSubmitExtendedInfo(array $payload)
 * @method array getSubaccountShareholderInfo(array $payload)
 * @method array subaccountExtendedInfo(?array $payload = [])
 * @method array subaccountSetPermissions(?array $payload = [])
 */
class SubAccount implements VoPayContractEndpoint
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
            'post-subaccount' => [
                'method' => 'POST',
                'uri' => '/subaccount',
                'required' => ['LegalBusinessName', 'SubaccountID', 'EmailAddress', 'SendWelcomeEmail']
            ],
            'get-subaccount' => [
                'method' => 'GET',
                'uri' => '/subaccount',
            ],
            'subaccount-submit-extended-info' => [
                'method' => 'POST',
                'uri' => '/subaccount/submit-extended-info',
                'required' => [
                    'OriginatorName',
                    'Address',
                    'City',
                    'Province',
                    'PostalCode',
                    'Country',
                    'PhoneNumber',
                    'EmailAddress',
                    'NatureofBusiness',
                    'OrganizationalType',
                    'RegistrationNumber',
                    'RegistrationProvince',
                    'DateofIncorporation',
                    'AuthorizedFullLegalName',
                    'AuthorizedOccupation'
                ]
            ],
            'get-subaccount-shareholder-info' => [
                'method' => 'GET',
                'uri' => '/subaccount/shareholder-info',
                'required' => ['Token']
            ],
            'post-subaccount-shareholder-info' => [
                'method' => 'POST',
                'uri' => '/subaccount/shareholder-info/{ShareolderID}',
                'required' => [
                    'ShareholderFullName',
                    'ShareholderOwnership',
                    'ShareholderOccupation',
                    'ShareholderHomeAddress'
                ]
            ],
            'subaccount-extended-info' => [
                'method' => 'GET',
                'uri' => '/subaccount/extended-info',
            ],
            'subaccount-set-permissions' => [
                'method' => 'POST',
                'uri' => '/subaccount/set-permissions',
            ]
        ];
    }

    /**
     * @param array $payload
     * @param string|null $shareolderId
     *
     * @return array
     * @throws \DataMat\VoPay\Exceptions\InvalidEndpoint
     * @throws \DataMat\VoPay\Exceptions\InvalidPayload
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postSubaccountShareholderInfo(array $payload, ?string $shareolderId = '') : array
    {
        return $this->singleCall('post-subaccount-shareholder-info', ['{ShareolderID}' => $shareolderId], $payload);
    }
}
