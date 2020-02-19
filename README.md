# PHP REST API SDK for BlockSDK
[![@BLOCKSDK on Twitter](https://img.shields.io/badge/twitter-%40BLOCKSDK-blue.svg)](https://twitter.com/BlockSdk)
[![@BLOCKSDK on Facebook](https://img.shields.io/badge/facebook-%40BLOCKSDK-blue.svg)](https://www.facebook.com/blocksdk)
[![Total Downloads](https://img.shields.io/packagist/dt/block-chen/blocksdk-php.svg?style=flat)](https://packagist.org/packages/block-chen/blocksdk-php)

__Welcome to BlockSDK PHP__. This repository contains BlockSDK's PHP SDK and samples for REST API.

## SDK Documentation
[ Our BlockSDK-PHP Page ](https://docs.blocksdk.com/) includes all the documentation related to PHP SDK. Sample Codes, to Releases. Here are few quick links to get you there faster.
* [ BlockSDK Developer Docs]

## Prerequisites

   - PHP 5.5+
   - [curl](http://php.net/manual/en/book.curl.php), [json](http://php.net/manual/en/book.json.php) & [openssl](http://php.net/manual/en/book.openssl.php) extensions must be enabled
   
## Getting Started
**Install the SDK** – Using [Composer] is the recommended way to install the
   BlockSDK for PHP. The SDK is available via [Packagist] under the
   [`block-chen/blocksdk-php`][install-packagist] package. If Composer is installed globally on your system, you can run the following in the base directory of your project to add the SDK as a dependency:
   ```
   composer require block-chen/blocksdk-php
   ```

## Quick Examples
### Create an Bitcoin client
```php
<?php
use BlockSDK;

$blockSDK = new BlockSDK("YOU_TOKEN");
$btcClient = $blockSDK->createBitcoin();

//or

$btcClient = BlockSDK::createBitcoin("YOU_TOKEN");
```
### Get Address info
```php
<?php
$addressInfo = $btcClient->getAddressInfo([
    "address" => "18cBEMRxXHqzWWCxZNtU91F5sbUNKhL5PX",
    "rawtx" => true,
    "reverse" => true,
    "offset" => 0,
    "limit" => 10
]);

var_dump($addressInfo);
```

### Create an Bitcoin Wallet
```php
<?php
$wallet = $btcClient->createWallet([
    "name" => "test"
]);
```

[install-packagist]: https://packagist.org/packages/block-chen/blocksdk-php
[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[BlockSDK Developer Docs]: https://docs.blocksdk.com
