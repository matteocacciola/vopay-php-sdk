<?php

namespace DataMat\VoPay\Interfaces;

interface VoPayContractEndpoint extends VoPayContract
{
    /**
     * @return array
     */
    public function getEndpoints() : array;

    /**
     * @return $this
     */
    public function setPrefixUri() : VoPayContractEndpoint;

    /**
     * @param string $accountId
     * @param string $apiKey
     * @param string $apiSecret
     *
     * @return VoPayContractEndpoint
     */
    public function setCredentials(string $accountId, string $apiKey, string $apiSecret) : VoPayContractEndpoint;
}
