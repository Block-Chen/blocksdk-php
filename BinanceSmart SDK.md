### 바이낸스 스마트 체인 V3 REST API 문서
[바이낸스 스마트 체인 개발자 문서 바로가기](https://documenter.getpostman.com/view/20292093/Uz5FKwxw#f6ddeb8a-8e34-4900-9706-9aea7c18fbe9)
함수 호출에 필요한 매개변수 또는 반환되는 데이터에 대해서는 REST API 개발자 문서를 참고해 주시길 바랍니다.

### 클라이언트 생성 (테스트넷)
```php
<?php
use BlockSDK;

$blockSDK = new BlockSDK("YOU_TOKEN");
$bscClient = $blockSDK->createBinanceSmart();

//or

$bscClient = BlockSDK::createBinanceSmart("YOU_TOKEN");
```

### 클라이언트 생성 (메인넷)
엔드 포인트를 지정해주지 않는경우 테스트넷으로 기본 설정되어 호출 됩니다 메인넷은 아래 예시와 같이 클라이언트 생성시 두번째 매개변수를 메인넷으로 지정해 주시길 바랍니다.
```php
<?php
use BlockSDK;

$blockSDK = new BlockSDK("YOU_TOKEN","https://mainnet-api.blocksdk.com");
$bscClient = $blockSDK->createBinanceSmart();

//or

$bscClient = BlockSDK::createBinanceSmart("YOU_TOKEN","https://mainnet-api.blocksdk.com");
```

### 규약
모든 URL,Query,Body 매개변수는 모든 함수는 첫번쨰 인수를 Array 형 으로
`key = 매개변수명`
`value = 매개변수값`
형태로 호출하실수 있습니다.
```php
<?php
$nfts = $bscClient->GetSingleNfts([
    "contract_address" => "0xf5de760f2e916647fd766b4ad9e85ff943ce3a2b",
    "includeMetadata" => true,
    "offset" => 0,
    "limit" => 10
]);

```

### 블록체인 정보
```
GET /v3/bsc/info
```
```php
$result = $bscClient->GetBlockChainInfo();
```

### 블록 정보
```
GET /v3/bsc/block/<block>
```
```php
$result = $bscClient->GetBlock([
    'block' => "blockNumber 또는 blockHash"
]);
```

### 주소 목록
```
GET /v3/bsc/address
```
```php
$result = $bscClient->GetAddresses([
    'offset' => 0,
    'limit' => 10
]);
```

### 주소 정보
```
GET /v3/bsc/address/<address>/info
```
```php
$result = $bscClient->GetAddressInfo([
    'address' => "주소",
    'offset' => 0,
    'limit' => 10
]);
```

### 주소 생성
```
POST /v3/bsc/address
```
```php
$result = $bscClient->CreateAddress([
    'name' => "test"
]);
```

### 주소 잔액
```
GET /v3/bsc/address/<address>/balance
```
```php
$result = $bscClient->GetAddressBalance([
    'address' => "주소"
]);
```

### 주소 거래 전송
```
POST /v3/bsc/address/<from_address>/send
```
```php
$result = $bscClient->Send([
    'from_address' => "주소",
    'to' => "주소",
    'amount' => "보낼 양",
    'private_key' => "보내는 주소 키"
]);
```

### 거래 전송
```
POST /v3/bsc/transaction/send
```
```php
$result = $bscClient->SendTransaction([
    'hex' => "서명된 트랜잭션 hex"
]);
```

### 거래 조회
```
GET /v3/bsc/transaction/<tx_hash>
```
```php
$result = $bscClient->GetTransaction([
    'tx_hash' => "트랜잭션 해쉬"
]);
```

### ERC20 토큰 정보
```
GET /v3/bsc/token/<contract_address>/info
```
```php
$result = $bscClient->GetTokenInfo([
    'contract_address' => "ERC20 토큰 컨트렉트 주소"
]);
```

### ERC20 토큰 잔액
```
GET /v3/bsc/token/<contract_address>/<from_address>/balance
```
```php
$result = $bscClient->GetTokenInfo([
    'contract_address' => "ERC20 토큰 컨트렉트 주소",
    'from_address' => "잔액을 조회할 주소"
]);
```

### ERC20 토큰 전송
```
POST /v3/bsc/token/<contract_address>/<from_address>/transfer
```
```php
$result = $bscClient->GetTokenInfo([
    'contract_address' => "ERC20 토큰 컨트렉트 주소",
    'from_address' => "토큰을 전송할 주소",
    'to' => "주소",
    'amount' => "보낼 양",
    'private_key' => "보내는 주소 키"
]);
```

### ERC20 특정 주소 거래 조회
```
GET /v3/bsc/token/<from_address>/transactions
```
```php
$result = $bscClient->GetTokenTxs([
    'from_address' => "거래 내역을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### ERC20 특정 컨트렉트 거래 조회
```
GET /v3/bsc/token/<contract_address>/<from_address>/transactions
```
```php
$result = $bscClient->GetTokenContractTxs([
    'contract_address' => "ERC20 토큰 컨트렉트 주소",
    'from_address' => "거래 내역을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### ERC20 특정 컨트렉트 거래 조회
```
GET /v3/bsc/token/<from_address>/all-balance
```
```php
$result = $bscClient->GetTokenAllBalance([
    'from_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### ERC721(NFT) 특정 컨트렉트 NFT 목록
```
GET /v3/bsc/single-nft/<contract_address>/nfts
```
```php
$result = $bscClient->GetSingleNfts([
    'contract_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 월렛 소유중인 NFT 조회
```
GET /v3/bsc/single-nft/<owner_address>/owner-nfts
```
```php
$result = $bscClient->GetSingleOwnerNfts([
    'owner_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 월렛 생성한 NFT 조회
```
GET /v3/bsc/single-nft/<creator_address>/creator-nfts
```
```php
$result = $bscClient->GetSingleCreatorNfts([
    'creator_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### ERC721(NFT) 특정 월렛 NFT 거래 조회
```
GET /v3/bsc/single-nft/<from_address>/transactions
```
```php
$result = $bscClient->GetSingleTxs([
    'from_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 컨트렉트,월렛 의 소유중인 NFT 조회
```
GET /v3/bsc/single-nft/<contract_address>/<owner_address>/owner-nfts
```
```php
$result = $bscClient->GetSingleNftOwnerNfts([
    'contract_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 컨트렉트,월렛의 생성한 NFT 조회
```
GET /v3/bsc/single-nft/<contract_address>/<creator_address>/creator-nfts
```
```php
$result = $bscClient->GetSingleNftCreatorNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'creator_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 컨트렉트,월렛의 NFT 거래 조회
```
GET /v3/bsc/single-nft/<contract_address>/<from_address>/from-transactions
```
```php
$result = $bscClient->GetSingleNftTxs([
    'contract_address' => "NFT 컨트렉트 주소",
    'from_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 NFT 거래내역 조회
```
GET /v3/bsc/single-nft/<contract_address>/<token_id>/nft-transactions
```
```php
$result = $bscClient->GetSingleNftTokenTxs([
    'contract_address' =>  "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 NFT 정보 조회
```
GET /v3/bsc/single-nft/<contract_address>/<token_id>/info
```
```php
$result = $bscClient->GetSingleNftInfo([
    'contract_address' => "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 컨트렉트 NFT 목록 조회
```
GET /v3/bsc/multi-nft/<contract_address>/nfts
```
```php
$result = $bscClient->GetMultiNfts([
    'contract_address' =>"NFT 컨트렉트 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 월렛 소유하고 있는 NFT 목록 조회
```
GET /v3/bsc/multi-nft/<owner_address>/owner-nfts
```
```php
$result = $bscClient->GetMultiOwnerNfts([
    'owner_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 월렛 생성한 NFT 목록 조회
```
GET /v3/bsc/multi-nft/<creator_address>/creator-nfts
```
```php
$result = $bscClient->GetMultiCreatorNfts([
    'creator_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 월렛 NFT 거래 내역 조회
```
GET /v3/bsc/multi-nft/<from_address>/transactions
```
```php
$result = $bscClient->GetMultiTxs([
    'from_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT)  특정 컨트렉트,월렛이 소유한 NFT 목록 조회
```
GET /v3/bsc/multi-nft/<contract_address>/<owner_address>/owner-nfts
```
```php
$result = $bscClient->GetMultiNftOwnerNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'owner_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 컨트렉트,월렛이 생성한 NFT 목록 조회
```
GET /v3/bsc/multi-nft/<contract_address>/<creator_address>/creator-nfts
```
```php
$result = $bscClient->GetMultiNftCreatorNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'creator_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 컨트렉트,월렛의 NFT 거래 내역 조회
```
GET /v3/bsc/multi-nft/<contract_address>/<from_address>/from-transactions
```
```php
$result = $bscClient->GetMultiNftTxs([
    'contract_address' => "NFT 컨트렉트 주소",
    'from_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 NFT 정보&소유자 조회
```
GET /v3/bsc/multi-nft/<contract_address>/<token_id>/info
```
```php
$result = $bscClient->GetMultiNftInfo([
    'contract_address' => "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 NFT 거래내역 조회
```
GET /v3/bsc/multi-nft/<contract_address>/<token_id>/nft-transactions
```
```php
$result = $bscClient->GetMultiNftTokenTxs([
    'contract_address' => "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```


### 스마트 계약 함수호출(읽기)
```
POST /v3/bsc/contract/<contract_address>/read
```
```php
$result = $bscClient->ReadContract([
    'contract_address' => "컨트렉트 주소",
    'mbscod' => "ownerOf",
    'parameter_type' => ["uint256"],
    'parameter_data' => [1]
]);
```


### 스마트 계약 함수호출(쓰기)
```
POST /v3/bsc/contract/<contract_address>/write
```
```php
$result = $bscClient->WriteContract([
    'contract_address' => "컨트렉트 주소",
    'from' => "트랜잭션을 생성할 주소",
    'private_key' => "from 의 프라이빗키",
    'mbscod' => "transfer",
    'parameter_type' => ["uint256"],
    'parameter_data' => [1]
]);
```


### NFT 마켓 ERC721 경매  진행중인 NFT 목록
```
GET /v3/bsc/single-nft/<contract_address>/auction-nfts
```
```php
$result = $bscClient->GetSingleNftAuctionNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### NFT 마켓 ERC721 특정 월렛 판매 등록한 NFT 목록
```
GET /v3/bsc/single-nft/<contract_address>/<seller_address>/sale-nfts
```
```php
$result = $bscClient->GetSingleNftSellerNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'seller_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### NFT 마켓 ERC721 특정 NFT 입찰 거래 내역
```
GET /v3/bsc/single-nft/<contract_address>/<token_id>/nft-bids
```
```php
$result = $bscClient->GetSingleNftTokenBids([
    'contract_address' => "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```

### NFT 마켓 ERC1155 특정 월렛 판매 등록한 NFT 목록
```
GET /v3/bsc/multi-nft/<contract_address>/<seller_address>/seller-nfts
```
```php
$result = $bscClient->GetMultiNftSellerNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'seller_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```