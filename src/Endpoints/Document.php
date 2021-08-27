<?php

namespace DataMat\VoPay\Endpoints;

use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Traits\Endpoint;

/**
 * @method \Psr\Http\Message\StreamInterface postDocument(array $payload)
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
     * @param array $payload
     * @param string|null $documentId
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws \VoPay\Exceptions\InvalidEndpoint
     * @throws \VoPay\Exceptions\InvalidPayload
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getDocument(array $payload, ?string $documentId = '') : \Psr\Http\Message\StreamInterface
    {
        return $this->sendRequest('get-document', $payload, ['{DocumentID}' => $documentId]);
    }
}
