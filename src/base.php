<?php

	namespace BlockSDK;
	
	class Base{
		public $api_token;
		
		function __construct(string $api_token = ''){
			$this->api_token = $api_token;
		}
		
		public function getUsage($request = []){
			$request['start_date'] = empty($request['start_date'])?date("Y-m-d",time() - 604800):$request['start_date'];
			$request['end_date'] = empty($request['end_date'])?date("Y-m-d"):$request['end_date'];
			
			return $this->request("GET","/usage",[
				"start_date" => $request['start_date'],
				"end_date" => $request['end_date']
			]);
		}
		
		public function listPrice($request = []){
			
			return $this->request("GET","/price");
		}
		
		public function request($method,$path,$data = []){
			$url = "https://api.blocksdk.com/v1" . $path;
			
			if($method == "GET" && count($data) > 0){
				$url = $url . "?";
				foreach($data as $key => $value){
					if($value === true){
						$url = $url . $key . "=true&";
					}else if($value === false){
						$url = $url . $key . "=false&";
					}else{
						$url = $url . $key . "=" . $value . "&";
					}
				}
			}
			
			$ch = curl_init($url);

			if($method == "POST"){
				$json = json_encode($data);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
			} 
			
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);  
			curl_setopt($ch, CURLOPT_HEADER, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','x-api-key: '. $this->api_token));
			$result = curl_exec($ch);
			curl_close($ch);


			$header_array = array();
			$result_decode = array();
			$result_row = explode("\n",$result);
			for($i=0;$i < count($result_row);$i++){
				$fields = explode(":",$result_row[$i]);
				
				if($i == 0){
					$statusCode = explode(" ",$fields[0]);
					$header_array['statusCode'] = empty($statusCode[1])?0:$statusCode[1];
				}else if($i == count($result_row) - 1){
					$result_decode = json_decode($result_row[$i],true);
				}else if(isset($fields[1]) == false){
					if(substr($fields[0], 0, 1) == "\t"){
						end($header_array);
						$header_array[key($header_array)] .= "\r\n\t".trim($fields[0]);
					}else{
						end($header_array);
						$header_array[key($header_array)] .= trim($fields[0]);
					}
				}else if(empty($fields[1]) === false){
					$field_title = trim($fields[0]);
					if (!isset($header_array[$field_title])){
						$header_array[$field_title]=trim($fields[1]);
					}else if(is_array($header_array[$field_title])){
						$header_array[$field_title] = array_merge($header_array[$fields[0]], array(trim($fields[1])));
					}
				}
			}
			
			$result_decode['HTTP_HEADER'] = $header_array;
			return $result_decode;
		}	
	}
?>