<?php

	namespace BlockSDK;
	
	class Bitcoin extends Base{
		public function getBlockChain(){
			return $this->request("GET","/btc/info");
		}		
		
		public function getBlock($request){
			$request['rawtx'] = isset($request['rawtx'])==false ?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/btc/blocks/{$request['block']}",[
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}		
		
		public function getMemPool($request = array()){
			$request['rawtx'] = isset($request['rawtx'])==false ?false:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/btc/mempool",[
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getAddressInfo($request){
			$request['reverse'] = isset($request['reverse'])==false ?true:$request['reverse'];
			$request['rawtx'] = isset($request['rawtx'])==false ?null:$request['rawtx'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/btc/addresses/{$request['address']}",[
				"reverse" => $request['reverse'],
				"rawtx" => $request['rawtx'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function getAddressBalance($request){
			return $this->request("GET","/btc/addresses/{$request['address']}/balance");
		}

		
		 
		public function getWallets($request = null){
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/btc/wallets",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}		
		
		public function getWallet($request){
			
			return $this->request("GET","/btc/wallets/" . $request['wallet_id']);
		}
		
		public function createHdWallet($request = null){
			$request['name'] = isset($request['name'])==false ?null:$request['name'];
			
			return $this->request("POST","/btc/wallets/hd",[
				"name" => $request['name']
			]);
		}
		
		public function loadWallet($request){

			return $this->request("POST","/btc/wallets/{$request['wallet_id']}/load",[
				"wif" => $request['wif'],
				"password" => $request['password']
			]);
		}
		
		public function unloadWallet($request){
			
			return $this->request("POST","/btc/wallets/{$request['wallet_id']}/unload");
		}
		
		public function getWalletAddresses($request){
			$request['address'] = isset($request['address'])==false ?null:$request['address'];
			$request['hdkeypath'] = isset($request['hdkeypath'])==false ?null:$request['hdkeypath'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/btc/wallets/{$request['wallet_id']}/addresses",[
				"address" => $request['address'],
				"hdkeypath" => $request['hdkeypath'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function createWalletAddress($request){
			$request['wif'] = isset($request['wif'])==false ?null:$request['wif'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			
			return $this->request("POST","/btc/wallets/{$request['wallet_id']}/addresses",[
				"wif" => $request['wif'],
				"password" => $request['password']
			]);
		}		
		
		public function getWalletBalance($request){
			
			return $this->request("GET","/btc/wallets/{$request['wallet_id']}/balance");
		}
				
		
		public function getWalletTransactions($request){
			$request['type'] = isset($request['type'])==false ?'all':$request['type'];
			$request['order'] = isset($request['order'])==false ?'desc':$request['order'];
			
			$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
			$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];
			
			return $this->request("GET","/btc/wallets/{$request['wallet_id']}/transaction",[
				"type" => $request['type'],
				"order" => $request['order'],
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
			
		public function sendToAddress($request){
			if(isset($request['kbfee']) == false){
				$blockChain = $this->getBlockChain();
				$request['kbfee'] = $blockChain['medium_fee_per_kb'];
			}
			
			$request['wif'] = isset($request['wif'])==false ?null:$request['wif'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['subtractfeefromamount'] = isset($request['subtractfeefromamount'])==false ?false:$request['subtractfeefromamount'];
			
			return $this->request("POST","/btc/wallets/{$request['wallet_id']}/sendtoaddress",[
				"address" => $request['address'],
				"amount" => $request['amount'],
				"wif" => $request['wif'],
				"password" => $request['password'],
				"kbfee" => $request['kbfee'],
				"subtractfeefromamount" => $request['subtractfeefromamount']
			]);
		}
		
		public function sendMany($request){
			
			$request['wif'] = isset($request['wif'])==false ?null:$request['wif'];
			$request['password'] = isset($request['password'])==false ?null:$request['password'];
			$request['subtractfeefromamount'] = isset($request['subtractfeefromamount'])==false ?false:$request['subtractfeefromamount'];
			
			return $this->request("POST","/btc/wallets/{$request['wallet_id']}/sendmany",[
				"to" => $request['to'],
				"wif" => $request['wif'],
				"password" => $request['password'],
				"subtractfeefromamount" => $request['subtractfeefromamount']
			]);
		}
		
		public function sendTransaction($request){
			
			return $this->request("POST","/btc/transactions/send",[
				"hex" => $request['hex']
			]);
		}		
		
		public function getTransaction($request){
			
			return $this->request("GET","/btc/transactions/{$request['hash']}");
		}
	}
?>
