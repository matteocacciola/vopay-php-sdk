<?php

namespace DataMat\VoPay\Traits;

use DataMat\VoPay\Exceptions\InvalidEndpoint;
use DataMat\VoPay\Requests\VoPayRequestMock;
use DataMat\VoPay\Utilities\Utility;
use GuzzleHttp\Psr7\Utils;

trait MockEndpoint
{
    /** @var array $endpoints */
    protected $endpoints = [];

    /** @var bool $success */
    private $success;

    public function __construct(?bool $success = true)
    {
        $this->success = $success;
        $this->endpoints = $this->getMock();
    }

    /**
     * @param string $function
     * @param $args
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws InvalidEndpoint
     * @throws \VoPay\Exceptions\InvalidPayload
     * @throws \Exception
     */
    public function __call(string $function, $args) : \Psr\Http\Message\StreamInterface
    {
        $endpointKey = Utility::endpointize($function);

        if (!array_key_exists($endpointKey, $this->endpoints)) {
            throw new \BadMethodCallException();
        }

        $endpoint = $this->getEndpoint($endpointKey);
        return $this->mock(new VoPayRequestMock($endpoint, $args[0]));
    }

    /**
     * @param string $key
     *
     * @return array|null
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
     * @param VoPayRequestMock $requestMock
     *
     * @return \Psr\Http\Message\StreamInterface
     * @throws \Exception
     */
    private function mock(VoPayRequestMock $requestMock) : \Psr\Http\Message\StreamInterface
    {
        $response = $requestMock->getResponse();

        if (!$response['Success']) {
            throw new \Exception();
        }

        return Utils::streamFor(json_encode($response));
    }
}
