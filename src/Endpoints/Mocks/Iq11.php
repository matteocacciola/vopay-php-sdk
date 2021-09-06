<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array generateEmbedUrl(array $payload)
 * @method array tokenInfo(array $payload)
 * @method array tokenize(?array $payload = [])
 */
class Iq11 implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'generate-embed-url' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'EmbedURL' => 'https://earthnode-dev.vopay.com/visa_direct/embed/?Token=123456',
                ],
                'required' => ['RedirectURL']
            ],
            'token-info' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'MaskedAccount' => '****1234',
                    'Bank' => '123',
                    'FullName' => 'John Doe',
                    'BankName' => 'TD',
                    'TokenType' => 'iq11',
                ],
                'required' => ['Token']
            ],
            'tokenize' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Token' => '{Token}',
                ],
                'uri' => '/tokenize',
            ],
        ];
    }
}
