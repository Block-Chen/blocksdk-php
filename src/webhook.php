<?php

	namespace BlockSDK;
	
	class WebHook extends Base{
		public function create($request){
			
			return $this->request("POST","/hooks",[
				"callback_url" => $request['callback_url'],
				"symbol" => $request['symbol'],
				"address" => $request['address']
			]);
		}
		
		public function getWebhooks($request = null){
			$request['offset'] = empty($request['offset'])?0:$request['offset'];
			$request['limit'] = empty($request['limit'])?10:$request['limit'];
			
			return $this->request("GET","/hooks",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function get($request){

			return $this->request("GET","/hooks/{$request['hook_id']}");
		}
		
		public function delete($request){

			return $this->request("DELETE","/hooks/{$request['hook_id']}");
		}
		
		public function getResponses($request = []){
			$request['offset'] = empty($request['offset'])?0:$request['offset'];
			$request['limit'] = empty($request['limit'])?10:$request['limit'];
			
			return $this->request("GET","/hooks/responses",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);			
		}		
		
		public function getHookResponses($request){
			$request['offset'] = empty($request['offset'])?0:$request['offset'];
			$request['limit'] = empty($request['limit'])?10:$request['limit'];
			
			return $this->request("GET","/hooks/{$request['hook_id']}/responses",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);			
		}
	
	}
?>