<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface submitExtendedInfo(array $payload)
 * @method \Psr\Http\Message\StreamInterface getSubmitExtendedInfoShareholderInfo(array $payload)
 * @method \Psr\Http\Message\StreamInterface postSubmitExtendedInfoShareholderInfo(array $payload)
 * @method \Psr\Http\Message\StreamInterface getSubmitExtendedInfoSigningAuthorityInfo(array $payload)
 * @method \Psr\Http\Message\StreamInterface businessTypes(array $payload)
 */
class AccountOnboarding implements VoPayContractEndpoint
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
            'submit-extended-info' => [
                'method' => 'POST',
                'uri' => '/submit-extended-info',
                'required' => [
                    'Address',
                    'City',
                    'Province',
                    'PostalCode',
                    'Country',
                    'PhoneNumber',
                    'NatureofBusiness',
                    'LegalBusinessName',
                    'OrganizationalType',
                    'RegistrationNumber',
                    'RegistrationProvince',
                    'DateofIncorporation',
                    'BusinessTypeID',
                    'Website',
                    'ProductDescription',
                    'IDVerificationConsent',
                    'ThirdPartyUse',
                    'StatementDescriptor',
                    'StatementDescriptorShortName',
                    'PrimaryContactFullName',
                    'PrimaryContactTitle',
                    'PrimaryContactEmail',
                    'PrimaryContactPhoneNumber',
                    'CustomerSupportPhoneNumber'
                ]
            ],
            'get-submit-extended-info-shareholder-info' => [
                'method' => 'GET',
                'uri' => '/submit-extended-info/shareholder-info',
            ],
            'post-submit-extended-info-shareholder-info' => [
                'method' => 'POST',
                'uri' => '/submit-extended-info/shareholder-info',
                'required' => [
                    'ShareholderFullName',
                    'ShareholderOwnership',
                    'ShareholderOccupation',
                    'ShareholderHomeAddress'
                ]
            ],
            'get-submit-extended-info-signing-authority-info' => [
                'method' => 'GET',
                'uri' => '/submit-extended-info/signing-authority-info',
            ],
            'post-submit-extended-info-signing-authority-info' => [
                'method' => 'POST',
                'uri' => '/submit-extended-info/signing-authority-info/{SigningAuthorityID}',
                'required' => [
                    'AuthorizedFullLegalName',
                    'AuthorizedOccupation',
                    'AuthorizedEmailAddress',
                    'AuthorizedHomeAddress'
                ]
            ],
            'business-types' => [
                'method' => 'GET',
                'uri' => '/business-types',
            ],
        ];
    }

    /**
     * @param array $payload
     * @param string|null $signingAuthorityId
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws \VoPay\Exceptions\InvalidEndpoint
     * @throws \VoPay\Exceptions\InvalidPayload
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function postSubmitExtendedInfoSigningAuthorityInfo(
        array $payload,
        ?string $signingAuthorityId
    ) : \Psr\Http\Message\StreamInterface {
        return $this->sendRequest('get-document', $payload, ['{SigningAuthorityID}' => $signingAuthorityId]);
    }
}
