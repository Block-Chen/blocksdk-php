<?php

	namespace BlockSDK;
	
	class Solc extends Base{

		public function genContract($request){
			return $this->request("GET","/solc/{$request['net']}/{$request['type']}",$request);
		}		
	}
?>
