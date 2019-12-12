<?php

	namespace BlockSDK;
	
	class WebHook extends Base{
		public function create($request){
			
			return $this->request("POST","/hook",[
				"callback" => $request['callback'],
				"category" => $request['category'],
				"address" => $request['address']
			]);
		}
		
		public function list($request = null){
			$request['offset'] = empty($request['offset'])?0:$request['offset'];
			$request['limit'] = empty($request['limit'])?10:$request['limit'];
			
			return $this->request("GET","/hook",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);
		}
		
		public function get($request){

			return $this->request("GET","/hook/{$request['hook_id']}");
		}
		
		public function delete($request){

			return $this->request("POST","/hook/{$request['hook_id']}/delete");
		}
		
		public function listResponse($request = []){
			$request['offset'] = empty($request['offset'])?0:$request['offset'];
			$request['limit'] = empty($request['limit'])?10:$request['limit'];
			
			return $this->request("GET","/hook/response",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);			
		}		
		
		public function getResponse($request){
			$request['offset'] = empty($request['offset'])?0:$request['offset'];
			$request['limit'] = empty($request['limit'])?10:$request['limit'];
			
			return $this->request("GET","/hook/{$request['hook_id']}/response",[
				"offset" => $request['offset'],
				"limit" => $request['limit']
			]);			
		}
	
	}
?>