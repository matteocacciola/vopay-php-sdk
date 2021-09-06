<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface payLink(array $payload)
 * @method \Psr\Http\Message\StreamInterface payLinkBeneficiary(array $payload)
 * @method \Psr\Http\Message\StreamInterface payLinkBeneficiaries(?array $payload = [])
 * @method \Psr\Http\Message\StreamInterface payLinkBeneficiaryCancel(array $payload)
 * @method \Psr\Http\Message\StreamInterface payLinkSetAccount(array $payload)
 * @method \Psr\Http\Message\StreamInterface payLinkSetupDecline(array $payload)
 * @method \Psr\Http\Message\StreamInterface payLinkSetupTokenExpiration(array $payload)
 * @method \Psr\Http\Message\StreamInterface payLinkSetupSenderEmail(array $payload)
 * @method \Psr\Http\Message\StreamInterface payLinkSetupSendEmails(array $payload)
 * @method \Psr\Http\Message\StreamInterface payLinkSettings(?array $payload = [])
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
