<?php

	namespace BlockSDK;
	
	class Monero extends Base{
		public function getBlockInfo(){
			return $this->request("GET","/xmr/block");
		}		
		
		public function getBlock($request){
			
			return $this->request("GET","/xmr/block/{$request['block']}");
		}
		
		public function listAddress($request){
			$request['offset'] = empty($request['offset'])?0:$request['offset'];
			$request['limit'] = empty($request['limit'])?10:$request['limit'];
			
			return $this->request("GET","/xmr/address",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function createAddress($request){
			$request['name'] = empty($request['name'])?null:$request['name'];
			
			return $this->request("POST","/xmr/address",[
				"name" => $request['name']
			]);
		}
		
		public function getAddressInfo($request){
			
			return $this->request("GET","/xmr/address/{$request['address_id']}");
		}
		
		public function getAddressBalance($request){
			
			return $this->request("GET","/xmr/address/{$request['address_id']}/balance");
		}
		
		public function sendToAddress($request,){
			
			return $this->request("POST","/xmr/address/{$request['address_id']}/sendtoaddress",[
				"address" => $request['address'],
				"amount" => $request['amount'],
				"private_spend_key" => $request['private_spend_key']
			]);
		}
		
		public function getTransaction($request){
			
			return $this->request("GET","/xmr/transaction/{$request['hash']}");
		}
	}
?>