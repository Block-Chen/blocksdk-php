<?php

	namespace BlockSDK;
	
	class Ethereum extends Base{
		public function getBlockChain(){
			return $this->request("GET","/eth/block");
		}		
		
		public function getBlock($request){
			$request['rawtx'] = isset($request['rawtx'])==false?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/eth/block/{$request['block']}",[
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getMemPool($request = array()){
			$request['rawtx'] = isset($request['rawtx'])==false ?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/eth/mempool",[
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}		
		
		public function listAddress($request){
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/eth/address",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function loadAddress($request){

			return $this->request("POST","/eth/address/{$request['address']}/load",[
				"seed_wif" => $request['seed_wif'],
				"password" => $request['password']
			]);
		}
		
		public function unLoadAddress($request){
			
			return $this->request("POST","/eth/address/{$request['address']}/unload");
		}
		
		public function createAddress($request){
			$request['name'] = isset($request['name'])==false?null:$request['name'];
			
			return $this->request("POST","/eth/address",[
				"name" => $request['name']
			]);
		}
		
		public function getAddressInfo($request){
			$request['reverse'] = isset($request['reverse'])==false?true:$request['reverse'];
			$request['rawtx'] = isset($request['rawtx'])==false?null:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/eth/address/{$request['address']}",[
				"reverse" => $request['reverse'],
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getAddressBalance($request){
			
			return $this->request("GET","/eth/address/{$request['address']}/balance");
		}
		
		public function sendToAddress($request){
			if(isset($request['gwei']) == false){
				$blockChain = $this->getBlockChain();
				$request['gwei'] = $blockChain['medium_gwei'];
			}
			
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['password'])==false ?null:$request['gas_limit'];
			
			return $this->request("POST","/eth/address/{$request['from']}/sendtoaddress",[
				"address" => $request['to'],
				"amount" => $request['amount'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"gwei" => $request['gwei'],
				"gas_limit" => $request['gas_limit']
			]);
		}
		
		
		public function sendTransaction($request){
			
			return $this->request("POST","/eth/transaction",[
				"sign_hex" => $request['sign_hex']
			]);
		}	
		
		public function getTransaction($request){
			
			return $this->request("GET","/eth/transaction/{$request['hash']}");
		}
	}
?>
