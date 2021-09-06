<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

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
class PayLink implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'eft';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'pay-link' => [
                'method' => 'POST',
                'uri' => '/pay-link',
                'required' => ['TransactionID']
            ],
            'pay-link-beneficiary' => [
                'method' => 'POST',
                'uri' => '/pay-link/beneficiary',
                'required' => ['FirstName', 'LastName']
            ],
            'pay-link-beneficiaries' => [
                'method' => 'GET',
                'uri' => '/pay-link/beneficiaries',
            ],
            'pay-link-beneficiary-cancel' => [
                'method' => 'POST',
                'uri' => '/pay-link/beneficiary/cancel',
                'required' => ['FirstName', 'LastName']
            ],
            'pay-link-set-account' => [
                'method' => 'POST',
                'uri' => '/pay-link/set-account',
                'required' => ['TransactionID']
            ],
            'pay-link-setup-decline' => [
                'method' => 'POST',
                'uri' => '/pay-link/setup-decline',
                'required' => ['IsDeclineEnable']
            ],
            'pay-link-setup-token-expiration' => [
                'method' => 'GET',
                'uri' => '/pay-link/setup-token-expiration',
                'required' => ['TokenExpirationTime']
            ],
            'pay-link-setup-sender-email' => [
                'method' => 'POST',
                'uri' => '/pay-link/setup-sender-email',
                'required' => ['SenderEmailAddress']
            ],
            'pay-link-setup-send-emails' => [
                'method' => 'POST',
                'uri' => '/pay-link/setup-send-emails',
                'required' => ['SendPaylinkConfirmationEmails']
            ],
            'pay-link-settings' => [
                'method' => 'GET',
                'uri' => '/pay-link/settings',
            ],
        ];
    }
}
