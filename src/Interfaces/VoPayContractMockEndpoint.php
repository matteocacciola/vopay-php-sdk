<?php

namespace DataMat\VoPay\Interfaces;

interface VoPayContractMockEndpoint extends VoPayContract
{
    /**
     * @return array
     */
    public function getMock() : array;
}
