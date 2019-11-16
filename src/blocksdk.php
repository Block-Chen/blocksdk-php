<?php

	
	class BlockSDK{
		public static function CreateBitcoin($api_token){
			return new Bitcoin($api_token);
		}		
			
		public static function CreateWebHook($api_token){
			return new WebHook($api_token);
		}
	}
?>