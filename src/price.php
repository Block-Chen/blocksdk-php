<?php

	namespace BlockSDK;
	
	class Price extends Base{
		
		public function listPrice($request){
			
			return $this->request("GET","/price");
		}
		
	}
	
?>