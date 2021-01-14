<?php

	namespace BlockSDK;
	
	class Tool extends Base{
		
		public function getHashType($request){
			
			return $this->request("GET","/tools/hash-type/" . $request['hash']);
		}
		
	}
?>