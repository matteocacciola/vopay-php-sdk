<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array ping(?array $payload = [])
 * @method array authPing(?array $payload = [])
 */
class Ping implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'ping' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
            ],
            'auth-ping' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                ],
            ],
        ];
    }
}
