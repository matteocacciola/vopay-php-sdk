<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array post(array $payload)
 * @method array get(?array $payload = [])
 * @method array setPermissions(?array $payload = [])
 */
class SubAccount implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'account/subaccount';

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
                'required' => ['LegalBusinessName', 'SubaccountID', 'EmailAddress', 'SendWelcomeEmail']
            ],
            'get' => [
                'method' => 'GET',
                'uri' => '',
            ],
            'set-permissions' => [
                'method' => 'POST',
                'uri' => '/set-permissions',
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
