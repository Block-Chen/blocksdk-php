<?php

	namespace BlockSDK;
	
	class Dash {
		use Base;
		 
		public function getBlockInfo(){
			return $this->request("GET","/dash/block");
		}		
		
		public function getBlock($request){
			
			return $this->request("GET","/dash/block/{$request['block']}");
		}	
		 
		public function listWallet(){
			
			return $this->request("GET","/dash/wallet");
		}
		
		public function createWallet($request){
			
			return $this->request("POST","/dash/wallet",[
				"wallet_name" => $request['wallet_name']
			]);
		}
		
		public function loadWallet($request){
			
			return $this->request("POST","/dash/wallet/{$request['wallet_id']}/load");
		}
		
		public function unLoadWallet($request){
			
			return $this->request("POST","/dash/wallet/{$request['wallet_id']}/unload");
		}
		
		public function listWalletAddress($request){
			
			return $this->request("GET","/dash/wallet/{$request['wallet_id']}/address");
		}
		
		public function createWalletAddress($wallet_id,$seed_wif=''){
			
			return $this->request("POST","/dash/wallet/{$wallet_id}/address",[
				"seed_wif" => $seed_wif
			]);
		}		
		
		public function getWalletBalance($request){
			
			return $this->request("GET","/dash/wallet/{$request['wallet_id']}/balance");
		}
				
		
		public function getWalletTransaction($request){
			
			return $this->request("GET","/dash/wallet/{$request['wallet_id']}/transaction");
		}
			
		public function sendToAddress($request){
			
			$request['seed_wif'] = empty($request['seed_wif'])?'':$request['seed_wif'];
			
			return $this->request("POST","/dash/wallet/{$request['wallet_id']}/sendtoaddress",[
				"address" => $request['address'],
				"amuont" => $request['amuont'],
				"seed_wif" => $request['seed_wif']
			]);
		}
		
		public function sendMany($request){
			
			return $this->request("POST","/dash/wallet/{$request['wallet_id']}/sendmany",[
				"to" => $request['to'],
				"seed_wif" => $request['seed_wif']
			]);
		}
		
		public function sendTransaction($request){
			
			return $this->request("POST","/dash/transaction",[
				"sign_hex" => $request['sign_hex']
			]);
		}		
		
		public function getTransaction($request){
			
			return $this->request("GET","/dash/transaction/{$request['hash']}");
		}
	}
?>