<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array postDocument(array $payload)
 * @method array getDocument(?array $payload = [], ?string $documentId = '')
 */
class Document implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'post-document' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'DocumentID' => '{string}',
                ],
                'required' => ['DocumentName', 'DocumentContent', 'DocumentType']
            ],
            'get-document' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Documents' => [
                        0 => [
                            'DocumentName' => '{string}',
                            'DocumentID' => '{string}',
                            'FileType' => '{string}',
                            'DocumentType' => '{string}',
                        ],
                    ],
                ],
            ],
        ];
    }
}
