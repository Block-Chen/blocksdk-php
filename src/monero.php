<?php

	namespace BlockSDK;
	
	class Monero extends Base{
		public function getBlockChain(){
			return $this->request("GET","/xmr/info");
		}		
		
		public function getBlock($request){
			$request['rawtx'] = isset($request['rawtx'])==false ?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/xmr/blocks/{$request['block']}",[
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getMemPool($request = array()){
			$request['rawtx'] = isset($request['rawtx'])==false ?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/xmr/mempool",[
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getAddresses($request){
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/xmr/addresses",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function createAddress($request){
			$request['name'] = empty($request['name'])==false?null:$request['name'];
			
			return $this->request("POST","/xmr/addresses",[
				"name" => $request['name']
			]);
		}
		
		public function getAddressInfo($request){
			$request['private_spend_key'] = isset($request['private_spend_key'])==false ?null:$request['private_spend_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/xmr/addresses/{$request['address_id']}",[
				"private_spend_key" => $request['private_spend_key'],
				"password" => $request['password'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getAddressBalance($request){
			$request['private_spend_key'] = isset($request['private_spend_key'])==false ?null:$request['private_spend_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			
			return $this->request("GET","/xmr/addresses/{$request['address_id']}/balance",[
				"private_spend_key" => $request['private_spend_key'],
				"password" => $request['password']
			]);
		}
		
		public function loadAddress($request){

			return $this->request("POST","/xmr/addresses/{$request['address_id']}/load",[
				"private_spend_key" => $request['private_spend_key'],
				"password" => $request['password']
			]);
		}
		
		public function unloadAddress($request){
			
			return $this->request("POST","/xmr/addresses/{$request['address_id']}/unload");
		}
		
		public function sendToAddress($request){
			if(empty($request['kbfee']) == true){
				$blockChain = $this->getBlockChain();
				$request['kbfee'] = $blockChain['medium_fee_per_kb'];
			}
			
			$request['private_spend_key'] = isset($request['private_spend_key'])==false ?null:$request['private_spend_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['subtractfeefromamount'] = isset($request['subtractfeefromamount'])==false ?false:$request['subtractfeefromamount'];
			
			return $this->request("POST","/xmr/addresses/{$request['address_id']}/sendtoaddress",[
				"address" => $request['address'],
				"amount" => $request['amount'],
				"private_spend_key" => $request['private_spend_key'],
				"password" => $request['password'],
				"kbfee" => $request['kbfee'],
				"subtractfeefromamount" => $request['subtractfeefromamount']
			]);
		}
		
		public function sendTransaction($request){
			
			return $this->request("POST","/xmr/transactions/send",[
				"hex" => $request['hex']
			]);
		}	
		
		public function getTransaction($request){
			
			return $this->request("GET","/xmr/transactions/{$request['hash']}");
		}
	}
?>
