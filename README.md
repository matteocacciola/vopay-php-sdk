# Vopay PHP SDK
This is an SDK for PHP to interface own platform with VoPay payment gateway. Uses [VoPay API v2](https://docs.vopay.com/v2/vopay-api-reference/ref).

## Features

* Follows PSR-0 conventions and coding standards: autoload friendly
* Light and fast thanks to lazy loading of API classes
* Extensively tested
* Usable with Symfony, Laravel and other Web Application Frameworks

## Requirements

* PHP >= 7.4 with [cURL](http://php.net/manual/en/book.curl.php) extension,
* [Guzzle](https://github.com/guzzle/guzzle) >= 7.0.1 library,
* (optional) [PHPUnit](https://phpunit.de) to run tests.

## Installation
It is easiest to use [Composer](https://getcomposer.org/) to install, simply run:

    composer require matteocacciola/vopay-sdk

Or add to the ```require``` section of your ```composer.json``` file:

    "matteocacciola/vopay-sdk"

## Basic usage

```php
use DataMat\VoPay\VoPay;

$client = new VoPay('account_id', 'api-key', 'api_secret');
```

The `$client` object gives you access to the entire VoPay API. E.g.: if you want to access the set of endpoints related to [VoPay Account](https://docs.vopay.com/v2/vopay-api-reference/ref#tag-account-endpoints), you just need to code:

```php
$account = $client->account();
```

Similarly, for example, with [VoPay EFT Endpoints](https://docs.vopay.com/v2/vopay-api-reference/ref#tag-electronic-funds-transfer-endpoints):

```php
$account = $client->electronicFundsTransfer();
```

and so forth.

## API Coverage
Currently, all the APIs are supported by this SDK.

## Tests
The package is provided with mocks for each subset of endpoints: you can easily mimic the successful or failing response by just passing a simple parameter to the mock.

Here is an example.

In a service, for instance, you could have the following method:
```php
/**
 * @param string $endpoint
 *
 * @return VoPayContract
 * @throws \Exception
 */
protected function buildVopayEndpointGroup(string $endpoint) : VoPayContract
{
    return $this->apiVopay->{$endpoint}();
}
```

returning the subset of endpoints, like `account` or `electronicFundsTransfer` etc. Loosely speaking, the `$endpoint` is one of the name of the methods provided by `DataMat\VoPay\VoPay` client.

Then, here is what you could mock in a test:

```php
use Mockery\MockInterface;
use DataMat\VoPay\Endpoints\Mocks\ElectronicFundsTransfer;

// $shouldTestSucceed is a boolean: true if the mocked response from the VoPay API should succeed, false otherwise
$this->partialMock(SomeClass::class, function (MockInterface $mock) use ($shouldTestSucceed) {
    $mock->shouldReceive('buildVopayEndpointGroup')
        ->with('electronicFundsTransfer')
        ->andReturn(new ElectronicFundsTransfer($shouldTestSucceed));
});
```

## Documentation
* Official [API documentation](https://docs.vopay.com/v2/vopay-api-reference/ref).

## Contributing
Pull requests are welcome for improvements to the core library, tests, and documentation.

## No Warranty

This package is a free distribution, provided at no cost. It does not come with any warranty, expressed or implied. Source code is provided for your convenience. VoPay does not assume any responsibilities for its quality or support.

## License

### The MIT License (MIT)

Copyright (c) 2016 Phillip Shipley

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
