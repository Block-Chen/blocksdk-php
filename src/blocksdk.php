<?php

	
	class BlockSDK extends BlockSDK\Base{
		
		public function createClient($name){
			$client = "BlockSDK\\" . $name;
			return new $client($this->api_token);
		}
		
		public function __call($method, $parameters){
			if(strpos($method,'create') !== 0){
				throw new Exception($method . ' not found');
			}
			
			return $this->createClient(substr($method,6));
		}

		public static function __callStatic($method, $parameters){
			return (new static(...$parameters))->$method();
		}
	
	}
?>