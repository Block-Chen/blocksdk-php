<?php

	namespace BlockSDK;
	
	class Bitcoin extends Base{
		public function GetBlockInfo(){
			return $this->request("GET","/btc/block");
		}		
		
		public function GetBlock($block){
			
			return $this->request("GET","/btc/block/{$block}");
		}	
		
		public function ListWallet(){
			
			return $this->request("GET","/btc/wallet");
		}
		
		public function CreateWallet($wallet_name){
			
			return $this->request("POST","/btc/wallet",[
				"wallet_name" => $wallet_name
			]);
		}
		
		public function LoadWallet($wallet_id){
			
			return $this->request("POST","/btc/wallet/{$wallet_id}/load");
		}
		
		public function UnLoadWallet($wallet_id){
			
			return $this->request("POST","/btc/wallet/{$wallet_id}/unload");
		}
		
		public function ListWalletAddress($wallet_id){
			
			return $this->request("GET","/btc/wallet/{$wallet_id}/address");
		}
		
		public function CreateWalletAddress($wallet_id,$seed_wif=''){
			
			return $this->request("POST","/btc/wallet/{$wallet_id}/address",[
				"seed_wif" => $seed_wif
			]);
		}		
		
		public function GetWalletBalance($wallet_id){
			
			return $this->request("GET","/btc/wallet/{$wallet_id}/balance");
		}
				
		
		public function GetWalletTransaction($wallet_id){
			
			return $this->request("GET","/btc/wallet/{$wallet_id}/transaction");
		}
			
		public function SendToAddress($wallet_id,$address,$amuont,$seed_wif=''){
			
			return $this->request("POST","/btc/wallet/{$wallet_id}/sendtoaddress",[
				"address" => $address,
				"amuont" => $amuont,
				"seed_wif" => $seed_wif
			]);
		}
		
		public function SendMany($wallet_id,$to,$seed_wif){
			
			return $this->request("POST","/btc/wallet/{$wallet_id}/sendmany",[
				"to" => $to,
				"seed_wif" => $seed_wif
			]);
		}
		
		public function GetTransaction($hash){
			
			return $this->request("GET","/btc/transaction/{$hash}");
		}
	}
?>