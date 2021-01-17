<?php

	namespace BlockSDK;
	
	class Token extends Base{
		
		public function getUsages($request){
			
			return $this->request("GET","/token/usage",[
				"start_date" => $request['start_date'],
				"end_date" => $request['end_date']
			]);
		}
		
	}
?>