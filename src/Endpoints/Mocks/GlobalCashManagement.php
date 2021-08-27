<?php

namespace DataMat\VoPay\Endpoints\Mocks;

use DataMat\VoPay\Interfaces\VoPayContractMockEndpoint;
use DataMat\VoPay\Traits\MockEndpoint;

/**
 * @method array currencies(array $payload)
 * @method array conversion(array $payload)
 * @method array conversionTransaction(array $payload)
 * @method array conversionRate(array $payload)
 * @method array conversionQuote(array $payload)
 */
class GlobalCashManagement implements VoPayContractMockEndpoint
{
    use MockEndpoint;

    /**
     * @inheritDoc
     */
    public function getMock() : array
    {
        return [
            'currencies' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'Currencies' => '{CAD, USD}',
                ],
            ],
            'conversion' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'TransactionDateTime' => '2019-11-02 12:00:00',
                    'TransactionStatus' => 'pending',
                    'SellCurrency' => 'CAD',
                    'BuyCurrency' => 'USD',
                    'ConversionRate' => '0.769328',
                    'SellAmount' => '129.98',
                    'BuyAmount' => '100.00',
                ],
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
            'conversion-transaction' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'TransactionID' => '1122',
                    'SellCurrency' => 'USD',
                    'BuyCurrency' => 'CAD',
                    'ConversionRate' => '0.769328',
                    'SellAmount' => '129.98',
                    'BuyAmount' => '100.00',
                ],
                'required' => ['TransactionID']
            ],
            'conversion-rate' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'SellCurrency' => 'USD',
                    'BuyCurrency' => 'CAD',
                    'ConversionRate' => '0.769328',
                ],
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
            'conversion-quote' => [
                'mock' => [
                    'Success' => $this->success,
                    'ErrorMessage' => '-',
                    'SellCurrency' => 'USD',
                    'BuyCurrency' => 'CAD',
                    'ConversionRate' => '0.769328',
                    'SellAmount' => '129.98',
                    'BuyAmount' => '100.00',
                ],
                'required' => ['SellCurrency', 'BuyCurrency']
            ],
        ];
    }
}
