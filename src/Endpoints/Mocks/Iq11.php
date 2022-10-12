<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array generateEmbedUrl(array $payload)
 * @method array tokenInfo(array $payload)
 * @method array tokenize(?array $payload = [])
 * @method array transactions(array $payload)
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
            ],
            'transactions' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Transactions' => [
                        0 => [
                            'Id' => '13bd9695-1686-472f-b6f8-a36a7547c51b',
                            'Code' => null,
                            'Date' => '2021-12-06',
                            'Debit' => '1500',
                            'Credit' => null,
                            'Balance' => '1261.34',
                            'Description' => 'Rent Payment',
                        ],
                        1 => [
                            'Id' => '0bcd3935-8e9a-4b90-a4c1-c662ff240d55',
                            'Code' => null,
                            'Date' => '2021-12-01',
                            'Debit' => '141.03',
                            'Credit' => null,
                            'Balance' => '1121.31',
                            'Description' => 'Groceries',
                        ],
                    ],
                ],
                'required' => ['Token']
            ],
        ];
    }
}
