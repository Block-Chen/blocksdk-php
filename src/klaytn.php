<?php

	namespace BlockSDK;
	
	class Klaytn extends Base{
		public function getBlockChain(){
			return $this->request("GET","/klay/info");
		}		
		
		public function getBlock($request){
			$request['rawtx'] = isset($request['rawtx'])==false?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/klay/blocks/{$request['block']}",[
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getMemPool($request = array()){
			$request['rawtx'] = isset($request['rawtx'])==false ?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/klay/mempool",[
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}		
		
		public function getAddresses($request){
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/klay/addresses",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function loadAddress($request){

			return $this->request("POST","/klay/addresses/{$request['address']}/load",[
				"private_key" => $request['private_key'],
				"password" => $request['password']
			]);
		}
		
		public function unloadAddress($request){
			
			return $this->request("POST","/klay/addresses/{$request['address']}/unload");
		}
		
		public function createAddress($request){
			$request['name'] = isset($request['name'])==false?null:$request['name'];
			
			return $this->request("POST","/klay/addresses",[
				"name" => $request['name']
			]);
		}
		
		public function getAddressInfo($request){
			$request['reverse'] = isset($request['reverse'])==false?true:$request['reverse'];
			$request['rawtx'] = isset($request['rawtx'])==false?null:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/klay/addresses/{$request['address']}",[
				"reverse" => $request['reverse'],
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getAddressBalance($request){
			
			return $this->request("GET","/klay/addresses/{$request['address']}/balance");
		}
		
		public function sendToAddress($request){
			$request['nonce'] = isset($request['nonce'])==false ?null:$request['nonce'];
			$request['data'] = isset($request['data'])==false ?null:$request['data'];
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			return $this->request("POST","/klay/addresses/{$request['from']}/send",[
				"to" => $request['to'],
				"amount" => $request['amount'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"gas_limit" => $request['gas_limit']
			]);
		}
		
		
		public function sendTransaction($request){
			
			return $this->request("POST","/klay/transactions/send",[
				"hex" => $request['hex']
			]);
		}	
		
		public function getTransaction($request){
			
			return $this->request("GET","/klay/transactions/{$request['hash']}");
		}
		
		public function getKIP7($request){
			return $this->request("GET","/klay/kip7-tokens/{$request['contract_address']}");
		}
		public function getKIP7Balance($request){
			return $this->request("GET","/klay/kip7-tokens/{$request['contract_address']}/{$request['from']}/balance");
		}
		
		public function getKIP7Transfer($request){
			
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			return $this->request("POST","/klay/kip7-tokens/{$request['contract_address']}/{$request['from']}/transfer",[
				"to" => $request['to'],
				"amount" => $request['amount'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"gas_limit" => $request['gas_limit']
			]);
		}	
		
		public function getKIP7Sign($request){
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			return $this->request("POST","/klay/kip7-tokens/{$request['contract_address']}/{$request['from']}/transfer/sign",[
				"to" => $request['to'],
				"amount" => $request['amount'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"gas_limit" => $request['gas_limit']
			]);
		}
		
		public function getKIP7Feedelegated($request){
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			return $this->request("POST","/klay/kip7-tokens/{$request['contract_address']}/{$request['fee_payer']}/transfer/feedelegated",[
				"from" => $request['from'],
				"to" => $request['to'],
				"amount" => $request['amount'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"gwei" => $request['gwei'],
				"gas_limit" => $request['gas_limit'],
				"nonce" => $request['nonce'],
				"v" => $request['v'],
				"r" => $request['r'],
				"s" => $request['s']
			]);
		}
		
		public function getKIP17Tokens($request){
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/klay/kip17-tokens/{$request['contract_address']}/tokens",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getKIP17OwnerTokens($request){
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/klay/kip17-tokens/{$request['contract_address']}/{$request['owner_address']}/owner",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getKIP17CreatorTokens($request){
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			
			return $this->request("GET","/klay/kip17-tokens/{$request['contract_address']}/{$request['creator_address']}/creator",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getKIP17TokenInfo($request){
			
			return $this->request("GET","/klay/kip17-tokens/{$request['contract_address']}/{$request['token_id']}/info",[
			]);
		}
		
		public function getKIP17TokenTransfers($request){
			$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false?10:$request['limit'];
			return $this->request("GET","/klay/kip17-tokens/{$request['contract_address']}/{$request['token_id']}/transfers",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getContractRead($request){
			$request['parameter_type'] = isset($request['parameter_type'])==false ?null:$request['parameter_type'];
			$request['parameter_data'] = isset($request['parameter_data'])==false ?null:$request['parameter_data'];
			
			return $this->request("POST","/klay/contracts/{$request['contract_address']}/read",[
				"method" => $request['method'],
				"return_type" => $request['return_type'],
				"parameter_type" => $request['parameter_type'],
				"parameter_data" => $request['parameter_data'],
			]);
		}
		
		public function getContractWrite($request){
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			$request['parameter_type'] = isset($request['parameter_type'])==false ?null:$request['parameter_type'];
			$request['parameter_data'] = isset($request['parameter_data'])==false ?null:$request['parameter_data'];
			
			return $this->request("POST","/klay/contracts/{$request['contract_address']}/write",[
				"method" => $request['method'],
				"return_type" => $request['return_type'],
				"parameter_type" => $request['parameter_type'],
				"parameter_data" => $request['parameter_data'],
				"from" => $request['from'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"amount" => $request['amount'],
				"gas_limit" => $request['gas_limit'],
			]);
		}
		
		public function getContractWriteSign($request){
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			$request['parameter_type'] = isset($request['parameter_type'])==false ?null:$request['parameter_type'];
			$request['parameter_data'] = isset($request['parameter_data'])==false ?null:$request['parameter_data'];
			
			return $this->request("POST","/klay/contracts/{$request['contract_address']}/write/sign",[
				"method" => $request['method'],
				"return_type" => $request['return_type'],
				"parameter_type" => $request['parameter_type'],
				"parameter_data" => $request['parameter_data'],
				"from" => $request['from'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"amount" => $request['amount'],
				"gas_limit" => $request['gas_limit'],
			]);
		}
		
		public function getContractWriteFeedelegated($request){
			$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			$request['parameter_type'] = isset($request['parameter_type'])==false ?null:$request['parameter_type'];
			$request['parameter_data'] = isset($request['parameter_data'])==false ?null:$request['parameter_data'];
			
			return $this->request("POST","/klay/contracts/{$request['contract_address']}/write/feedelegated",[
				"method" => $request['method'],
				"return_type" => $request['return_type'],
				"parameter_type" => $request['parameter_type'],
				"parameter_data" => $request['parameter_data'],
				"from" => $request['from'],
				"fee_payer" => $request['fee_payer'],
				"private_key" => $request['private_key'],
				"password" => $request['password'],
				"amount" => $request['amount'],
				"gwei" => $request['gwei'],
				"gas_limit" => $request['gas_limit'],
			]);
		}
		
		public function getContractWriteFees($request){
			$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];
			
			$request['parameter_type'] = isset($request['parameter_type'])==false ?null:$request['parameter_type'];
			$request['parameter_data'] = isset($request['parameter_data'])==false ?null:$request['parameter_data'];
			
			return $this->request("POST","/klay/contracts/{$request['contract_address']}/write/fees",[
				"method" => $request['method'],
				"return_type" => $request['return_type'],
				"parameter_type" => $request['parameter_type'],
				"parameter_data" => $request['parameter_data'],
				"from" => $request['from'],
				"amount" => $request['amount'],
				"gas_limit" => $request['gas_limit'],
			]);
		}
	}
?>