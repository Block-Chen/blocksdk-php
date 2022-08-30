<?php

	namespace BlockSDK;
	
	class Solc extends Base{

		public function GenContract($request){
			return $this->request("GET","/solc/{$request['net']}/{$request['type']}",$request);
		}		
		
		public function EncodeFunction($request){
			return $this->request("POST","/solc/encodefunction",$request);
		}
		
	}
?>
