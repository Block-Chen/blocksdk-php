<?php

namespace BlockSDK;

class Klaytn extends Base{
	public function GetBlockChainInfo(){
		return $this->request("GET","/klay/info");
	}
	public function GetBlock($request){
		return $this->request("GET","/klay/block/{$request['block']}",$request);
	}
	public function GetAddresses($request){
		return $this->request("GET","/klay/address",$request);
	}
	public function CreateAddress($request){
		return $this->request("POST","/klay/address",$request);
	}
	public function GetAddressInfo($request){
		return $this->request("GET","/klay/address/{$request['address']}",$$request);
	}
	public function GetAddressBalance($request){

		return $this->request("GET","/klay/address/{$request['address']}/balance");
	}
	public function Send($request){
		return $this->request("POST","/klay/address/{$request['from']}/send",$request);
	}
	public function SendTransaction($request){
		return $this->request("POST","/klay/transaction/send",$request);
	}
	public function GetTransaction($request){

		return $this->request("GET","/klay/transaction/{$request['hash']}");
	}


	public function GetTokenInfo($request){
		return $this->request("GET","/klay/token/{$request['contract_address']}/info");
	}
	public function SendToken($request){
		return $this->request("POST","/klay/token/{$request['contract_address']}/{$request['from']}/transfer",$request);
	}
	public function GetTokenBalance($request){
		return $this->request("GET","/klay/token/{$request['contract_address']}/{$request['from']}/balance");
	}
	public function GetTokenTxs($request){
		return $this->request("GET","/klay/token/{$request['from_address']}/transactions",$request);
	}
	public function GetTokenContractTxs($request){
		return $this->request("GET","/klay/token/{$request['contract_address']}/{$request['from_address']}/transactions",$request);
	}
	public function GetTokenAllBalance($request){
		return $this->request("GET","/klay/token/{$request['from_address']}/all-balance",$request);
	}


	public function GetSingleNfts($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/nfts",$request);
	}
	public function GetSingleOwnerNfts($request){
		return $this->request("GET","/klay/single-nft/{$request['owner_address']}/owner-nfts",$request);
	}
	public function GetSingleCreatorNfts($request){
		return $this->request("GET","/klay/single-nft/{$request['creator_address']}/creator-nfts",$request);
	}
	public function GetSingleTxs($request){
		return $this->request("GET","/klay/single-nft/{$request['from_address']}/transactions",$request);
	}
	public function GetSingleNftOwnerNfts($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/{$request['owner_address']}/owner-nfts",$request);
	}
	public function GetSingleNftCreatorNfts($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/{$request['creator_address']}/creator-nfts",$request);
	}
	public function GetSingleNftTxs($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/{$request['from_address']}/from-transactions",$request);
	}
	public function GetSingleNftInfo($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/{$request['token_id']}/info",$request);
	}
	public function GetSingleNftTokenTxs($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/{$request['token_id']}/nft-transactions",$request);
	}

	public function GetSingleNftAuctionNfts($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/auction-nfts",$request);
	}
	public function GetSingleNftSellerNfts($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/{$request['seller_address']}/seller-nfts",$request);
	}
	public function GetSingleNftTokenBids($request){
		return $this->request("GET","/klay/single-nft/{$request['contract_address']}/{$request['token_id']}/nft-bids",$request);
	}


	public function GetMultiNfts($request){
		return $this->request("GET","/klay/multi-nft/{$request['contract_address']}/nfts",$request);
	}
	public function GetMultiOwnerNfts($request){
		return $this->request("GET","/klay/multi-nft/{$request['owner_address']}/owner-nfts",$request);
	}
	public function GetMultiCreatorNfts($request){
		return $this->request("GET","/klay/multi-nft/{$request['creator_address']}/creator-nfts",$request);
	}
	public function GetMultiTxs($request){
		return $this->request("GET","/klay/multi-nft/{$request['from_address']}/transactions",$request);
	}
	public function GetMultiNftOwnerNfts($request){
		return $this->request("GET","/klay/multi-nft/{$request['contract_address']}/{$request['owner_address']}/owner-nfts",$request);
	}
	public function GetMultiNftCreatorNfts($request){
		return $this->request("GET","/klay/multi-nft/{$request['contract_address']}/{$request['creator_address']}/creator-nfts",$request);
	}
	public function GetMultiNftTxs($request){
		return $this->request("GET","/klay/multi-nft/{$request['contract_address']}/{$request['from_address']}/from-transactions",$request);
	}
	public function GetMultiNftInfo($request){
		return $this->request("GET","/klay/multi-nft/{$request['contract_address']}/{$request['token_id']}/info",$request);
	}
	public function GetMultiNftTokenTxs($request){
		return $this->request("GET","/klay/multi-nft/{$request['contract_address']}/{$request['token_id']}/nft-transactions",$request);
	}
	public function GetMultiNftSellerNfts($request){
		return $this->request("GET","/klay/multi-nft/{$request['contract_address']}/{$request['seller_address']}/seller-nfts",$request);
	}

	public function ReadContract($request){
		return $this->request("POST","/klay/contract/{$request['contract_address']}/read",$request);
	}

	public function WriteContract($request){
		return $this->request("POST","/klay/contract/{$request['contract_address']}/write",$request);
	}

}
?>
