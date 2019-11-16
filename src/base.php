<?php

	namespace BlockSDK;
	
	class Base{
		public $api_token;
		
		function __construct(string $api_token){
			$this->api_token = $api_token;
		}
		
		public function request($method,$path,$data = []){
			$ch = curl_init("https://api.blocksdk.com/v1" . $path);                                                                      
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);  
			if($method == "POST"){
				$json= json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
			}			
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','x-api-key: '. $this->api_token));
			$result = curl_exec($ch);
			curl_close($ch);
				
			return json_decode($result,true);
		}
	}
?>