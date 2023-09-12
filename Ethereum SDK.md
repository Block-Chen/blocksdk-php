### 이더리움 V3 REST API 문서
[이더리움 개발자 문서 바로가기](https://documenter.getpostman.com/view/20292093/Uz5FKwxw#3dc0d320-c1b1-449f-b950-daca8249d474)
함수 호출에 필요한 매개변수 또는 반환되는 데이터에 대해서는 REST API 개발자 문서를 참고해 주시길 바랍니다.

### 클라이언트 생성 (테스트넷)
```php
<?php
use BlockSDK;

$blockSDK = new BlockSDK("YOU_TOKEN");
$ethereumClient = $blockSDK->createEthereum();

//or

$ethereumClient = BlockSDK::createEthereum("YOU_TOKEN");
```

### 클라이언트 생성 (메인넷)
엔드 포인트를 지정해주지 않는경우 테스트넷으로 기본 설정되어 호출 됩니다 메인넷은 아래 예시와 같이 클라이언트 생성시 두번째 매개변수를 메인넷으로 지정해 주시길 바랍니다.
```php
<?php
use BlockSDK;

$blockSDK = new BlockSDK("YOU_TOKEN","https://mainnet-api.blocksdk.com");
$ethereumClient = $blockSDK->createEthereum();

//or

$ethereumClient = BlockSDK::createEthereum("YOU_TOKEN","https://mainnet-api.blocksdk.com");
```

### 규약
모든 URL,Query,Body 매개변수는 모든 함수는 첫번쨰 인수를 Array 형 으로
`key = 매개변수명`
`value = 매개변수값`
형태로 호출하실수 있습니다.
```php
<?php
$nfts = $ethereumClient->GetSingleNfts([
    "contract_address" => "0xf5de760f2e916647fd766b4ad9e85ff943ce3a2b",
    "includeMetadata" => true,
    "offset" => 0,
    "limit" => 10
]);

```

### 블록체인 정보
```
GET /v3/eth/info
```
```php
$result = $ethereumClient->GetBlockChainInfo();
```

### 블록 정보
```
GET /v3/eth/block/<block>
```
```php
$result = $ethereumClient->GetBlock([
    'block' => "blockNumber 또는 blockHash"
]);
```

### 주소 목록
```
GET /v3/eth/address
```
```php
$result = $ethereumClient->GetAddresses([
    'offset' => 0,
    'limit' => 10
]);
```

### 주소 정보
```
GET /v3/eth/address/<address>/info
```
```php
$result = $ethereumClient->GetAddressInfo([
    'address' => "주소",
    'offset' => 0,
    'limit' => 10
]);
```

### 주소 생성
```
POST /v3/eth/address
```
```php
$result = $ethereumClient->CreateAddress([
    'name' => "test"
]);
```

### 주소 잔액
```
GET /v3/eth/address/<address>/balance
```
```php
$result = $ethereumClient->GetAddressBalance([
    'address' => "주소"
]);
```

### 주소 거래 전송
```
POST /v3/eth/address/<from_address>/send
```
```php
$result = $ethereumClient->Send([
    'from_address' => "주소",
    'to' => "주소",
    'amount' => "보낼 양",
    'private_key' => "보내는 주소 키"
]);
```

### 거래 전송
```
POST /v3/eth/transaction/send
```
```php
$result = $ethereumClient->SendTransaction([
    'hex' => "서명된 트랜잭션 hex"
]);
```

### 거래 조회
```
GET /v3/eth/transaction/<tx_hash>
```
```php
$result = $ethereumClient->GetTransaction([
    'tx_hash' => "트랜잭션 해쉬"
]);
```

### ERC20 토큰 정보
```
GET /v3/eth/token/<contract_address>/info
```
```php
$result = $ethereumClient->GetTokenInfo([
    'contract_address' => "ERC20 토큰 컨트렉트 주소"
]);
```

### ERC20 토큰 잔액
```
GET /v3/eth/token/<contract_address>/<from_address>/balance
```
```php
$result = $ethereumClient->GetTokenBalance([
    'contract_address' => "ERC20 토큰 컨트렉트 주소",
    'from_address' => "잔액을 조회할 주소"
]);
```

### ERC20 토큰 전송
```
POST /v3/eth/token/<contract_address>/<from_address>/transfer
```
```php
$result = $ethereumClient->SendToken([
    'contract_address' => "ERC20 토큰 컨트렉트 주소",
    'from_address' => "토큰을 전송할 주소",
    'to' => "주소",
    'amount' => "보낼 양",
    'private_key' => "보내는 주소 키"
]);
```

### ERC20 특정 주소 거래 조회
```
GET /v3/eth/token/<from_address>/transactions
```
```php
$result = $ethereumClient->GetTokenTxs([
    'from_address' => "거래 내역을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### ERC20 특정 컨트렉트 거래 조회
```
GET /v3/eth/token/<contract_address>/<from_address>/transactions
```
```php
$result = $ethereumClient->GetTokenContractTxs([
    'contract_address' => "ERC20 토큰 컨트렉트 주소",
    'from_address' => "거래 내역을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### ERC20 소유내역 조회
```
GET /v3/eth/token/<from_address>/all-balance
```
```php
$result = $ethereumClient->GetTokenAllBalance([
    'from_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### ERC721(NFT) 특정 컨트렉트 NFT 목록
```
GET /v3/eth/single-nft/<contract_address>/nfts
```
```php
$result = $ethereumClient->GetSingleNfts([
    'contract_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 월렛 소유중인 NFT 조회
```
GET /v3/eth/single-nft/<owner_address>/owner-nfts
```
```php
$result = $ethereumClient->GetSingleOwnerNfts([
    'owner_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 월렛 생성한 NFT 조회
```
GET /v3/eth/single-nft/<creator_address>/creator-nfts
```
```php
$result = $ethereumClient->GetSingleCreatorNfts([
    'creator_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### ERC721(NFT) 특정 월렛 NFT 거래 조회
```
GET /v3/eth/single-nft/<from_address>/transactions
```
```php
$result = $ethereumClient->GetSingleTxs([
    'from_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 컨트렉트,월렛 의 소유중인 NFT 조회
```
GET /v3/eth/single-nft/<contract_address>/<owner_address>/owner-nfts
```
```php
$result = $ethereumClient->GetSingleNftOwnerNfts([
    'contract_address' => "목록을 조회할 주소",
    'owner_address' => "월렛 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 컨트렉트,월렛의 생성한 NFT 조회
```
GET /v3/eth/single-nft/<contract_address>/<creator_address>/creator-nfts
```
```php
$result = $ethereumClient->GetSingleNftCreatorNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'creator_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 컨트렉트,월렛의 NFT 거래 조회
```
GET /v3/eth/single-nft/<contract_address>/<from_address>/from-transactions
```
```php
$result = $ethereumClient->GetSingleNftTxs([
    'contract_address' => "NFT 컨트렉트 주소",
    'from_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 NFT 거래내역 조회
```
GET /v3/eth/single-nft/<contract_address>/<token_id>/nft-transactions
```
```php
$result = $ethereumClient->GetSingleNftTokenTxs([
    'contract_address' =>  "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC721(NFT) 특정 NFT 정보 조회
```
GET /v3/eth/single-nft/<contract_address>/<token_id>/info
```
```php
$result = $ethereumClient->GetSingleNftInfo([
    'contract_address' => "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 컨트렉트 NFT 목록 조회
```
GET /v3/eth/multi-nft/<contract_address>/nfts
```
```php
$result = $ethereumClient->GetMultiNfts([
    'contract_address' =>"NFT 컨트렉트 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 월렛 소유하고 있는 NFT 목록 조회
```
GET /v3/eth/multi-nft/<owner_address>/owner-nfts
```
```php
$result = $ethereumClient->GetMultiOwnerNfts([
    'owner_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 월렛 생성한 NFT 목록 조회
```
GET /v3/eth/multi-nft/<creator_address>/creator-nfts
```
```php
$result = $ethereumClient->GetMultiCreatorNfts([
    'creator_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 월렛 NFT 거래 내역 조회
```
GET /v3/eth/multi-nft/<from_address>/transactions
```
```php
$result = $ethereumClient->GetMultiTxs([
    'from_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT)  특정 컨트렉트,월렛이 소유한 NFT 목록 조회
```
GET /v3/eth/multi-nft/<contract_address>/<owner_address>/owner-nfts
```
```php
$result = $ethereumClient->GetMultiNftOwnerNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'owner_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 컨트렉트,월렛이 생성한 NFT 목록 조회
```
GET /v3/eth/multi-nft/<contract_address>/<creator_address>/creator-nfts
```
```php
$result = $ethereumClient->GetMultiNftCreatorNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'creator_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 컨트렉트,월렛의 NFT 거래 내역 조회
```
GET /v3/eth/multi-nft/<contract_address>/<from_address>/from-transactions
```
```php
$result = $ethereumClient->GetMultiNftTxs([
    'contract_address' => "NFT 컨트렉트 주소",
    'from_address' => "목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 NFT 정보&소유자 조회
```
GET /v3/eth/multi-nft/<contract_address>/<token_id>/info
```
```php
$result = $ethereumClient->GetMultiNftInfo([
    'contract_address' => "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```


### ERC1155(NFT) 특정 NFT 거래내역 조회
```
GET /v3/eth/multi-nft/<contract_address>/<token_id>/nft-transactions
```
```php
$result = $ethereumClient->GetMultiNftTokenTxs([
    'contract_address' => "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```


### 스마트 계약 함수호출(읽기)
```
POST /v3/eth/contract/<contract_address>/read
```
```php
$result = $ethereumClient->ReadContract([
    'contract_address' => "컨트렉트 주소",
    'method' => "ownerOf",
    'return_type' => "address",
    'parameter_type' => ["uint256"],
    'parameter_data' => [1]
]);
```


### 스마트 계약 함수호출(쓰기)
```
POST /v3/eth/contract/<contract_address>/write
```
```php
$result = $ethereumClient->WriteContract([
    'contract_address' => "컨트렉트 주소",
    'from' => "트랜잭션을 생성할 주소",
    'private_key' => "from 의 프라이빗키",
    'method' => "transfer",
    'parameter_type' => ["uint256"],
    'parameter_data' => [1]
]);
```


### NFT 마켓 ERC721 경매  진행중인 NFT 목록
```
GET /v3/eth/single-nft/<contract_address>/auction-nfts
```
```php
$result = $ethereumClient->GetSingleNftAuctionNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'offset' => 0,
    'limit' => 10
]);
```


### NFT 마켓 ERC721 특정 월렛 판매 등록한 NFT 목록
```
GET /v3/eth/single-nft/<contract_address>/<seller_address>/sale-nfts
```
```php
$result = $ethereumClient->GetSingleNftSellerNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'seller_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```

### NFT 마켓 ERC721 특정 NFT 입찰 거래 내역
```
GET /v3/eth/single-nft/<contract_address>/<token_id>/nft-bids
```
```php
$result = $ethereumClient->GetSingleNftTokenBids([
    'contract_address' => "NFT 컨트렉트 주소",
    'token_id' =>  "NFT 토큰 ID",
    'offset' => 0,
    'limit' => 10
]);
```

### NFT 마켓 ERC1155 특정 월렛 판매 등록한 NFT 목록
```
GET /v3/eth/multi-nft/<contract_address>/<seller_address>/seller-nfts
```
```php
$result = $ethereumClient->GetMultiNftSellerNfts([
    'contract_address' => "NFT 컨트렉트 주소",
    'seller_address' => "토큰 목록을 조회할 주소",
    'offset' => 0,
    'limit' => 10
]);
```