<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array post(array $payload)
 * @method array get(?array $payload = [])
 * @method array cancel(array $payload)
 * @method array settingsSetupDecline(array $payload)
 * @method array settingsSetupTokenExpiration(array $payload)
 * @method array settingsSetupSenderEmail(array $payload)
 * @method array settingsSetupConfirmationEmails(array $payload)
 * @method array settings(?array $payload = [])
 */
class Paylink implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'post' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'PaylinkRequestID' => '1234',
                    'Link' => 'https://request.vopay.com/{Token}',
                    'Status' => 'pending',
                    'Amount' => '100.00',
                    'ReceiverName' => 'John',
                    'ReceiverEmailAddress' => 'john.doe@vopay.com',
                    'SenderName' => 'John',
                    'SenderEmailAddress' => 'jane.doe@vopay.com',
                    'InvoiceNumber' => 'ABC1234',
                    'Note' => 'Paylink requested to the client 123',
                    'ClientReferenceNumber' => '123ABC-XYZ',
                    'PaylinkRequestType' => 'transaction',
                    'Frequency' => 'recurring',
                    'NameOfFrequency' => 'weekly',
                    'SemiMonthlyFrequencyType' => 'SemiMonthFirstAndFifteenth',
                    'ScheduleStartDate' => '2020-01-01',
                    'ScheduleEndDate' => '2021-01-01',
                    'EndingAfterPayments' => '12',
                    'PaymentType' => 'fund',
                ],
                'required' => ['SenderName', 'ReceiverName']
            ],
            'get' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'PaylinkRequests' => [
                        0 => [
                            'PaylinkRequestID' => '1234',
                            'ReceiverName' => 'John Smith',
                            'ReceiverEmailAddress' => 'john.doe@vopay.com',
                            'SenderName' => 'Jane Doe',
                            'SenderEmailAddress' => 'jane.doe@vopay.com',
                            'Status' => 'pending',
                            'RequestDate' => '2020-05-25',
                            'Link' => 'https://request.vopay.com/{Token}',
                            'Note' => 'Paylink requested to the client 123',
                            'ClientReferenceNumber' => '123ABC-XYZ',
                            'Amount' => '2000.00',
                            'Currency' => 'CAD',
                            'TransactionID' => '1234',
                            'ScheduledPaymentsID' => '1234',
                            'TransactionType' => '1234',
                            'PayLinkRequestType' => '1234',
                            'IQ11Token' => '{string}',
                            'Institution' => 'CIBC',
                            'FinancialInstitutionNumber' => '010',
                            'BranchTransitNumber' => '03900',
                            'AccountNumber' => '1234567',
                            'CreditCardToken' => '{string}',
                            'CreditCardNumber' => '**** **** **** 1234',
                            'CreditCardExpiryYear' => '2023',
                            'CreditCardExpiryMonth' => '12',
                            'CreditCardBrand' => 'visa',
                        ],
                    ],
                ]
            ],
            'cancel' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['PaylinkRequestID']
            ],
            'settings-setup-decline' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['IsDeclineEnable']
            ],
            'settings-setup-token-expiration' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['TokenExpirationTime']
            ],
            'settings-setup-sender-email' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['SenderEmailAddress']
            ],
            'settings-setup-confirmation-emails' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
                'required' => ['SendPaylinkConfirmationEmails']
            ],
            'settings' => [
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
