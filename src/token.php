<?php

	namespace BlockSDK;
	
	class Token extends Base{
		
		public function getUsages($request){
			
			return $this->request("GET","/token/usage",[
				"stat_date" => $request['stat_date'],
				"end_date" => $request['end_date']
			]);
		}
		
	}
?>