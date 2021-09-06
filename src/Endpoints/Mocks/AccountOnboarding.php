<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array submitExtendedInfo(array $payload)
 * @method array getSubmitExtendedInfoShareholderInfo(?array $payload = [])
 * @method array postSubmitExtendedInfoShareholderInfo(array $payload)
 * @method array getSubmitExtendedInfoSigningAuthorityInfo(?array $payload = [])
 * @method array postSubmitExtendedInfoSigningAuthorityInfo(array $payload, ?string $signingAuthorityId = '')
 * @method array businessTypes(?array $payload = [])
 */
class AccountOnboarding implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'submit-extended-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Message' => '-'
                ],
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
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'AccountName' => '-',
                    'ShareHolders' => [
                        0 => [
                            'FullName' => 'Share holder name',
                            'Ownership' => '20',
                            'Occupation' => '{string}',
                            'HomeAddress' => '123 address st, Vancouver',
                            'DateAdded' => '2019-11-03 01:00:00',
                        ],
                    ],
                ],
            ],
            'post-submit-extended-info-shareholder-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Message' => '-'
                ],
                'required' => [
                    'ShareholderFullName',
                    'ShareholderOwnership',
                    'ShareholderOccupation',
                    'ShareholderHomeAddress'
                ]
            ],
            'get-submit-extended-info-signing-authority-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'AccountName' => '-',
                    'SigningAuthority' => [
                        0 => [
                            'FullName' => 'Share holder name',
                            'Occupation' => '{string}',
                            'EmailAddress' => '{string}',
                            'HomeAddress' => '123 address st, Vancouver',
                            'DateAdded' => '2019-11-03 01:00:00',
                        ],
                    ],
                ],
            ],
            'post-submit-extended-info-signing-authority-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Message' => '-'
                ],
                'required' => [
                    'AuthorizedFullLegalName',
                    'AuthorizedOccupation',
                    'AuthorizedEmailAddress',
                    'AuthorizedHomeAddress'
                ]
            ],
            'business-types' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'BusinessTypes' => [
                        0 => [
                            'BusinessTypeID' => '{integer}',
                            'Industry' => '{string}',
                            'Categories' => [
                                0 => [
                                    'BusinessTypeCategoryID' => '{integer}',
                                    'Category' => '{string}',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }
}
