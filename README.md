# PHP REST API SDK for BLOCKSDK V3
[![@BLOCKSDK on Twitter](https://img.shields.io/badge/twitter-%40BLOCKSDK-blue.svg)](https://twitter.com/BlockSdk)
[![@BLOCKSDK on Facebook](https://img.shields.io/badge/facebook-%40BLOCKSDK-blue.svg)](https://www.facebook.com/blocksdk)
[![Total Downloads](https://img.shields.io/packagist/dt/block-chen/blocksdk-php.svg?style=flat)](https://packagist.org/packages/block-chen/blocksdk-php)

__BlockSDK PHP__에 오신 것을 환영합니다. 이 저장소에는 BlockSDK의 PHP SDK와 REST API용 샘플이 포함되어 있습니다.

## 지원중인 블록체인 네트워크
비트코인 , 라이트코인 , 비트코인 캐시 , 웹후크 는 V2버전 에서 지원되고 있습니다.
```
1.이더리움
2.클레이튼  
3.바이낸스 스마트 체인
4.폴리곤
5.아발란체
6.이더리움 클래식
```
## 개발자 문서
* [BlockSDK REST API V3 문서](https://documenter.getpostman.com/view/20292093/Uz5FKwxw)
* [BlockSDK REST API V2 문서](https://docs-v2.blocksdk.com/ko/#fa255f0ccc)
* [BLOCKSDK PHP SDK V3 문서](https://github.com/Block-Chen/blocksdk-php/wiki)

## 요구 사양

   - PHP 7버전 이상
   - [curl](http://php.net/manual/en/book.curl.php), [json](http://php.net/manual/en/book.json.php) & [openssl](http://php.net/manual/en/book.openssl.php) extensions must be enabled
   
## 시작하기
   SDK 설치 – Composer를 사용하여 설치 것이 BLOCKSDK PHP SDK를 설치하는 권장 방법입니다. 
   SDK는 block-chen/blocksdk-php 패키지의 Packagist를 통해 사용할 수 있습니다. 
   Composer가 시스템에 전역으로 설치된 경우 프로젝트의 기본 디렉터리에서 다음을 실행하여 SDK를 종속성으로 추가할 수 있습니다.
   ```
   composer require block-chen/blocksdk-php
   ```

## 코드 샘플
### 이더리움 테스트넷 클라이언트 생성
```php
<?php
use BlockSDK;

$blockSDK = new BlockSDK("YOU_TOKEN");
$ethereumClient = $blockSDK->createEthereum();

//or

$ethereumClient = BlockSDK::createEthereum("YOU_TOKEN");
```
### 이더리움 메인넷 클라이언트 생성
엔드 포인트를 지정해주지 않는경우 테스트넷으로 기본 설정되어 호출 됩니다
메인넷은 아래 예시와 같이 클라이언트 생성시 두번째 매개변수를 메인넷으로 지정해 주시길 바랍니다.
```php
<?php
use BlockSDK;

$blockSDK = new BlockSDK("YOU_TOKEN","https://mainnet-api.blocksdk.com");
$ethereumClient = $blockSDK->createEthereum();

//or

$ethereumClient = BlockSDK::createEthereum("YOU_TOKEN","https://mainnet-api.blocksdk.com");
```
### 이더리움 테스트넷 특정 컨트렉트 NFT 목록 가져오기
```php
<?php
$nfts = $ethereumClient->GetSingleNfts([
    "contract_address" => "0xf5de760f2e916647fd766b4ad9e85ff943ce3a2b",
    "includeMetadata" => true,
    "offset" => 0,
    "limit" => 10
]);

var_dump($nfts);
```

### 이더리움 주소 생성
```php
<?php
$address = $ethereumClient->CreateAddress([
    "name" => "test"
]);
```

[install-packagist]: https://packagist.org/packages/block-chen/blocksdk-php
[composer]: http://getcomposer.org
[packagist]: http://packagist.org
[BlockSDK Developer Docs]: https://documenter.getpostman.com/view/20292093/Uz5FKwxw
