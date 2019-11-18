<?php

	namespace BlockSDK;
	
	class Ethereum extends Base{
		public function getBlockInfo(){
			return $this->request("GET","/eth/block");
		}		
		
		public function getBlock($request){
			
			return $this->request("GET","/eth/block/{$request['block']}");
		}
		
		public function listAddress($request){
			$request['offset'] = empty($request['offset'])?0:$request['offset'];
			$request['limit'] = empty($request['limit'])?10:$request['limit'];
			
			return $this->request("GET","/eth/address",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function createAddress($request){
			$request['name'] = empty($request['name'])?null:$request['name'];
			
			return $this->request("POST","/eth/address",[
				"name" => $request['name']
			]);
		}
		
		public function getAddressInfo($request){
			
			return $this->request("GET","/eth/address/{$request['address']}");
		}
		
		public function getAddressBalance($request){
			
			return $this->request("GET","/eth/address/{$request['address']}/balance");
		}
		
		public function sendToAddress($request,){
			
			return $this->request("POST","/eth/address/{$request['address']}/sendtoaddress",[
				"address" => $request['address'],
				"amount" => $request['amount'],
				"private_spend_key" => $request['private_spend_key']
			]);
		}
		
		public function getTransaction($request){
			
			return $this->request("GET","/eth/transaction/{$request['hash']}");
		}
	}
?>