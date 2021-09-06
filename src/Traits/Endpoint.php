<?php

namespace DataMat\VoPay\Traits;

use DataMat\VoPay\Exceptions\InvalidEndpoint;
use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Requests\VoPayRequest;
use DataMat\VoPay\Utilities\Utility;

trait Endpoint
{
    /** @var \GuzzleHttp\Client */
    private $client;

    /** @var array $endpoints */
    protected $endpoints = [];

    /** @var string $prefixUri */
    protected $prefixUri;

    public function __construct()
    {
        $this->endpoints = $this->getEndpoints();
        $this->setPrefixUri();

        $this->client = new \GuzzleHttp\Client([
            'base_uri' => 'https://earthnode-dev.vopay.com/api/v2/'
        ]);
    }

    /**
     * @inheritDoc
     */
    public function setCredentials(string $accountId, string $apiKey, string $apiSecret) : VoPayContractEndpoint
    {
        $this->accountId = $accountId;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;

        return $this;
    }

    /**
     * @param string $function
     * @param $args
     *
     * @return array
     * @throws InvalidEndpoint
     * @throws \DataMat\VoPay\Exceptions\InvalidPayload
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function __call(string $function, $args) : array
    {
        $endpointKey = Utility::endpointize($function);

        if (!array_key_exists($endpointKey, $this->endpoints)) {
            throw new \BadMethodCallException();
        }

        $endpoint = $this->getEndpoint($endpointKey);
        $endpoint['uri'] = $this->sanitizeUri($endpoint['uri'], $args[1] ?? []);

        return $this->response(new VoPayRequest($endpoint, $args[0] ?? []));
    }

    /**
     * @param string $key
     *
     * @return array
     * @throws InvalidEndpoint
     */
    private function getEndpoint(string $key) : array
    {
        if (!($endpoint = $this->endpoints[$key] ?? null)) {
            throw new InvalidEndpoint();
        }

        return $endpoint;
    }

    /**
     * @param string $uri
     * @param array $replacements
     *
     * @return string
     */
    private function sanitizeUri(string $uri, array $replacements = []) : string
    {
        $uri = $this->prefixUri . $uri;

        if ($replacements) {
            $uri = str_replace(array_keys($replacements), array_values($replacements), $uri);
        }

        return rtrim($uri, '/');
    }

    /**
     * @param VoPayRequest $request
     *
     * @return array
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function response(VoPayRequest $request) : array
    {
        $payload = $request->getPayload() + [
                'AccountID' => $this->accountId,
                'Key' => $this->apiKey,
                'Signature' => $this->calculateSignature()
            ];

        $method = $request->getMethod();

        $response = $this->client->request($method, $request->getUri(), $this->parsePayload($method, $payload));

        if ($response->getStatusCode() !== 200) {
            throw new \Exception($response->getStatusCode(), $response->getReasonPhrase());
        }

        return json_decode((string)$response->getBody(), true);
    }

    /**
     * @return string
     */
    private function calculateSignature() : string
    {
        $date = (new \DateTimeImmutable())->format('c');
        return sha1($this->apiKey . $this->apiSecret . $date);
    }

    /**
     * @param string $method
     * @param array $payload
     *
     * @return array
     */
    private function parsePayload(string $method, array $payload) : array
    {
        switch (strtolower($method)) {
            case 'get':
                return [
                    'query' => $payload
                ];
            case 'post':
                return [
                    'form_params' => $payload
                ];
            default:
                return [
                    'body' => $payload
                ];
        }
    }

    /**
     * @param string $endpointKey
     * @param array $replacements
     * @param array|null $payload
     *
     * @return array
     * @throws InvalidEndpoint
     * @throws \DataMat\VoPay\Exceptions\InvalidPayload
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function singleCall(string $endpointKey, array $replacements, ?array $payload = []) : array
    {
        $endpoint = $this->getEndpoint($endpointKey);
        $endpoint['uri'] = $this->sanitizeUri($endpoint['uri'], $replacements);

        return $this->response(new VoPayRequest($endpoint, $payload));
    }
}
