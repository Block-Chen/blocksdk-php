<?php

	
	class BlockSDK{
		public static function CreateBitcoin($api_token){
			return new BlockSDK\Bitcoin($api_token);
		}		
			
		public static function CreateWebHook($api_token){
			return new BlockSDK\WebHook($api_token);
		}
	}
?>