<?php

namespace DataMat\VoPay;

use DataMat\VoPay\Exceptions\UndefinedCredentials;
use DataMat\VoPay\Factories\VoPayFactory;
use DataMat\VoPay\Interfaces\VoPayContractEndpoint;
use DataMat\VoPay\Traits\Credentials;
use DataMat\VoPay\Utilities\Utility;

/**
 * @method \DataMat\VoPay\Endpoints\Account account()
 * @method \DataMat\VoPay\Endpoints\AccountOnboarding accountOnboarding()
 * @method \DataMat\VoPay\Endpoints\ClientAccount clientAccount()
 * @method \DataMat\VoPay\Endpoints\Document document()
 * @method \DataMat\VoPay\Endpoints\ElectronicFundsTransfer electronicFundsTransfer()
 * @method \DataMat\VoPay\Endpoints\GlobalCashManagement globalCashManagement()
 * @method \DataMat\VoPay\Endpoints\Interac interac()
 * @method \DataMat\VoPay\Endpoints\Iq11 iq11()
 * @method \DataMat\VoPay\Endpoints\Partner partner()
 * @method \DataMat\VoPay\Endpoints\Paylink payLink()
 * @method \DataMat\VoPay\Endpoints\Setup setup()
 * @method \DataMat\VoPay\Endpoints\SubAccount subAccount()
 * @method \DataMat\VoPay\Endpoints\VisaDirect visaDirect()
 */
class VoPay
{
    use Credentials;

    /**
     * @param string $accountId
     * @param string $apiKey
     * @param string $apiSecret
     *
     * @throws UndefinedCredentials
     */
    public function __construct(string $accountId, string $apiKey, string $apiSecret)
    {
        $this->accountId = $accountId;
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;

        if (!$this->accountId || !$this->apiKey) {
            throw new UndefinedCredentials();
        }
    }

    /**
     * @param string $method
     * @param $args
     *
     * @return VoPayContractEndpoint
     */
    public function __call(string $method, $args) : VoPayContractEndpoint
    {
        $objectEndpoint = VoPayFactory::build(
            __NAMESPACE__ . '\\Endpoints\\' . Utility::classize($method)
        );

        return $objectEndpoint->setCredentials($this->accountId, $this->apiKey, $this->apiSecret);
    }
}
