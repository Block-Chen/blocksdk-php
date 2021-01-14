<?php

	namespace BlockSDK;
	
	class Ethereum extends Base{
		public function getBlockChain(){
			return $this->request("GET","/eth/info");
		}		
		
		public function getBlock($request){
			$request['rawtx'] = isset($request['rawtx'])==false?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/eth/blocks/{$request['block']}",[
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
		
		public function getAddresses($request){
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/eth/addresses",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function loadAddress($request){

			return $this->request("POST","/eth/addresses/{$request['address']}/load",[
				"private_key" => $request['private_key'],
				"password" => $request['password']
			]);
		}
		
		public function unloadAddress($request){
			
			return $this->request("POST","/eth/addresses/{$request['address']}/unload");
		}
		
		public function createAddress($request){
			$request['name'] = isset($request['name'])==false?null:$request['name'];
			
			return $this->request("POST","/eth/addresses",[
				"name" => $request['name']
			]);
		}
		
		public function getAddressInfo($request){
			$request['reverse'] = isset($request['reverse'])==false?true:$request['reverse'];
			$request['rawtx'] = isset($request['rawtx'])==false?null:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/eth/addresses/{$request['address']}",[
				"reverse" => $request['reverse'],
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getAddressBalance($request){
			
			return $this->request("GET","/eth/addresses/{$request['address']}/balance");
		}
		
		public function sendToAddress($request){
			if(isset($request['gwei']) == false){
				$blockChain = $this->getBlockChain();
				$request['gwei'] = $blockChain['medium_gwei'];
			}
			
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			return $this->request("POST","/eth/addresses/{$request['from']}/sendtoaddress",[
				"to" => $request['to'],
				"amount" => $request['amount'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"gwei" => $request['gwei'],
				"gas_limit" => $request['gas_limit']
			]);
		}
		
		
		public function sendTransaction($request){
			
			return $this->request("POST","/eth/transactions/send",[
				"hex" => $request['hex']
			]);
		}	
		
		public function getTransaction($request){
			
			return $this->request("GET","/eth/transactions/{$request['hash']}");
		}
		
		public function getErc20($request){
			return $this->request("GET","/eth/erc20-tokens/{$request['contract_address']}");
		}
		public function getErc20Balance($request){
			return $this->request("GET","/eth/erc20-tokens/{$request['contract_address']}/{$request['from']}/balance");
		}
		public function getErc20Transfer($request){
			if(isset($request['gwei']) == false){
				$blockChain = $this->getBlockChain();
				$request['gwei'] = $blockChain['high_gwei'];
			}
			
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			return $this->request("POST","/eth/erc20-tokens/{$request['contract_address']}/{$request['from']}/transfer",[
				"to" => $request['to'],
				"amount" => $request['amount'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"gwei" => $request['gwei'],
				"gas_limit" => $request['gas_limit']
			]);
		}
	}
?>
