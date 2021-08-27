<?php

namespace DataMat\VoPay\Interfaces;

interface VoPayRequestContract
{
    /**
     * @return array
     */
    public function getRequired() : array;

    /**
     * @return array
     */
    public function getPayload() : array;
}
