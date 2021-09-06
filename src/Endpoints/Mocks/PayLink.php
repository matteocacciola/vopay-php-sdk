<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array payLink(array $payload)
 * @method array payLinkBeneficiary(array $payload)
 * @method array payLinkBeneficiaries(?array $payload = [])
 * @method array payLinkBeneficiaryCancel(array $payload)
 * @method array payLinkSetAccount(array $payload)
 * @method array payLinkSetupDecline(array $payload)
 * @method array payLinkSetupTokenExpiration(array $payload)
 * @method array payLinkSetupSenderEmail(array $payload)
 * @method array payLinkSetupSendEmails(array $payload)
 * @method array payLinkSettings(?array $payload = [])
 */
class PayLink implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'pay-link' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'FirstName' => 'John',
                    'LastName' => 'Doe',
                    'Link' => 'https://request.vopay.com/{Token}',
                    'Status' => 'pending',
                    'EmailAddress' => 'john.doe@vopay.com',
                    'InvoiceNumber' => 'ABC1234',
                    'Note' => 'Paylink requested to the client 123',
                    'SenderName' => 'John Doe',
                ],
                'required' => ['TransactionID']
            ],
            'pay-link-beneficiary' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'FirstName' => 'John',
                    'LastName' => 'Doe',
                    'Link' => 'https://request.vopay.com/{Token}',
                    'Status' => 'pending',
                    'ReceiverEmailAddress' => 'john.doe@vopay.com',
                    'SenderEmailAddress' => 'john.doe@vopay.com',
                    'Note' => 'Paylink requested to the client 123',
                    'SenderName' => 'John Doe',
                ],
                'required' => ['FirstName', 'LastName']
            ],
            'pay-link-beneficiaries' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Beneficiaries' => [
                        0 => [
                            'ClientName' => 'John Doe',
                            'Address' => '123 Fake St',
                            'City' => 'Vancouver',
                            'Province' => 'BC',
                            'PostalCode' => 'A1A1A1',
                            'Country' => 'Canada',
                            'Institution' => 'CIBC',
                            'Currency' => 'CAD',
                            'FinancialInstitutionNumber' => '010',
                            'AccountNumber' => '123456',
                            'Token' => '{string}',
                            'DateAdded' => '2020-05-25',
                        ],
                    ],
                ],
            ],
            'pay-link-beneficiary-cancel' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['FirstName', 'LastName']
            ],
            'pay-link-set-account' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['TransactionID']
            ],
            'pay-link-setup-decline' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['IsDeclineEnable']
            ],
            'pay-link-setup-token-expiration' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['TokenExpirationTime']
            ],
            'pay-link-setup-sender-email' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['SenderEmailAddress']
            ],
            'pay-link-setup-send-emails' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['SendPaylinkConfirmationEmails']
            ],
            'pay-link-settings' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'PaylinkSettings' => [
                        0 => [
                            'EnablePaylinkDecline' => true,
                            'PayLinkExpirationTime' => '15',
                            'PayLinkSenderEmailAddress' => 'john.doe@gmail.com',
                            'SendPaylinkConfirmationEmails' => true,
                        ],
                    ],
                ],
            ],
        ];
    }
}
