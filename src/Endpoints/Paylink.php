<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

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
class Paylink implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'paylink';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'post' => [
                'method' => 'POST',
                'uri' => '',
                'required' => ['SenderName', 'ReceiverName']
            ],
            'get' => [
                'method' => 'GET',
                'uri' => '',
            ],
            'cancel' => [
                'method' => 'POST',
                'uri' => '/cancel',
                'required' => ['PaylinkRequestID']
            ],
            'settings-setup-decline' => [
                'method' => 'POST',
                'uri' => '/settings/setup-decline',
                'required' => ['IsDeclineEnable']
            ],
            'settings-setup-token-expiration' => [
                'method' => 'POST',
                'uri' => '/settings/setup-token-expiration',
                'required' => ['TokenExpirationTime']
            ],
            'settings-setup-sender-email' => [
                'method' => 'POST',
                'uri' => '/settings/setup-sender-email',
                'required' => ['SenderEmailAddress']
            ],
            'settings-setup-confirmation-emails' => [
                'method' => 'POST',
                'uri' => '/settings/setup-confirmation-emails',
                'required' => ['SendPaylinkConfirmationEmails']
            ],
            'settings' => [
                'method' => 'GET',
                'uri' => '/settings',
            ],
        ];
    }
}
