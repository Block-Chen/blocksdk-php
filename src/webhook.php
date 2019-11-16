<?php

	namespace BlockSDK;
	
	class WebHook extends Base{
		public function Create($callback,$category,$address){
			
			return $this->request("POST","/hook",[
				"callback" => $callback,
				"category" => $category,
				"address" => $address
			]);
		}
		
		public function List(){

			return $this->request("GET","/hook");
		}
		
		public function Get($hook_id){

			return $this->request("GET","/hook/{$hook_id}");
		}
		
		public function Delete($hook_id){

			return $this->request("POST","/hook/{$hook_id}/delete");
		}
	
	}
?>