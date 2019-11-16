<?php
	namespace BlockSDK;
	

	function CreateBitcoin($api_token = ''){
		return new Bitcoin($api_token);
	}		
		
	function CreateWebHook($api_token = ''){
		return new WebHook($api_token);
	}
		
	function request($method,$path,$data = [],$api_token = ''){
		$ch = curl_init("https://api.blocksdk.com/v1" . $path);                                                                      
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);  
		if($method == "POST"){
			$json= json_encode($data);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
		}			
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','x-api-key: '. $api_token));
		$result = curl_exec($ch);
		curl_close($ch);
			
		return json_decode($result,true);
	}
	
?>