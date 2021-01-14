<?php

	namespace BlockSDK;
	
	class Market extends Base{
		
		public function getExchanges(){
			
			return $this->request("GET","/market/exchanges");
		}
		
		public function getTrades($request){
			$request['from'] = isset($request['from'])==false ?null:$request['from'];
			$request['to'] = isset($request['to'])==false ?"USD":$request['to'];
			
			return $this->request("GET","/market/trades",[
				'from' => $request['from'],
				'to' => $request['to'],
			]);
		}
		
		public function getRates($request){
			
			return $this->request("GET","/market/rates/" . $request['from'],[
				'to' => $request['to'],
				'from_amount' => $request['from_amount']
			]);
		}
		
		public function getExchangeTrades($request){
			$request['from'] = isset($request['from'])==false ?null:$request['from'];
			$request['to'] = isset($request['to'])==false ?"USD":$request['to'];
			
			return $this->request("GET","/market/trades/" . $request['exchage_id'],[
				'from' => $request['from'],
				'to' => $request['to'],
			]);
		}
		
		public function getExchangeRates($request){
			$request['to'] = isset($request['to'])==false ?"USD":$request['to'];
			
			return $this->request("GET","/market/rates/{$request['exchage_id']}/{$request['from']}",[
				'to' => $request['to'],
				'from_amount' => $request['from_amount']
			]);
		}
		
	}
?>