<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method array postDocument(array $payload)
 */
class Document implements VoPayContractEndpoint
{
    use Endpoint, Credentials;

    /**
     * @return VoPayContractEndpoint
     */
    public function setPrefixUri() : VoPayContractEndpoint
    {
        $this->prefixUri = 'document';

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getEndpoints() : array
    {
        return [
            'post-document' => [
                'method' => 'POST',
                'uri' => '',
                'required' => ['DocumentName', 'DocumentContent', 'DocumentType']
            ],
            'get-document' => [
                'method' => 'GET',
                'uri' => '/{DocumentID}',
            ],
        ];
    }

    /**
     * @param array|null $payload
     * @param string|null $documentId
     *
     * @return array
     * @throws \DataMat\VoPay\Exceptions\InvalidEndpoint
     * @throws \DataMat\VoPay\Exceptions\InvalidPayload
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDocument(?array $payload = [], ?string $documentId = '') : array
    {
        return $this->singleCall('get-document', ['{DocumentID}' => $documentId], $payload);
    }
}
