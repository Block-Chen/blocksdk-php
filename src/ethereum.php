<?php

namespace BlockSDK;

class Ethereum extends Base{
	public function getBlockChain(){
		return $this->request("GET","/eth/info");
	}

	public function getBlock($request){
		$request['rawtx'] = isset($request['rawtx'])==false?false:$request['rawtx'];

		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/blocks/{$request['block']}",[
			"rawtx" => $request['rawtx'],
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getMemPool($request = array()){
		$request['rawtx'] = isset($request['rawtx'])==false ?false:$request['rawtx'];

		$request['offset'] = isset($request['offset'])==false ?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false ?10:$request['limit'];

		return $this->request("GET","/eth/mempool",[
			"rawtx" => $request['rawtx'],
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getAddresses($request){
		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/addresses",[
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function loadAddress($request){

		return $this->request("POST","/eth/addresses/{$request['address']}/load",[
			"private_key" => $request['private_key'],
			"password" => $request['password']
		]);
	}

	public function unloadAddress($request){

		return $this->request("POST","/eth/addresses/{$request['address']}/unload");
	}

	public function createAddress($request){
		$request['name'] = isset($request['name'])==false?null:$request['name'];

		return $this->request("POST","/eth/addresses",[
			"name" => $request['name']
		]);
	}

	public function getAddressInfo($request){
		$request['reverse'] = isset($request['reverse'])==false?true:$request['reverse'];
		$request['rawtx'] = isset($request['rawtx'])==false?null:$request['rawtx'];

		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/addresses/{$request['address']}",[
			"reverse" => $request['reverse'],
			"rawtx" => $request['rawtx'],
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getAddressBalance($request){

		return $this->request("GET","/eth/addresses/{$request['address']}/balance");
	}

	public function sendToAddress($request){
		if(isset($request['gwei']) == false){
			$blockChain = $this->getBlockChain();
			$request['gwei'] = $blockChain['medium_gwei'];
		}

		$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
		$request['password'] = isset($request['password'])==false ?null:$request['password'];
		$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];

		return $this->request("POST","/eth/addresses/{$request['from']}/sendtoaddress",[
			"to" => $request['to'],
			"amount" => $request['amount'],
			"private_key" => $request['private_key'],
			"password" => $request['password'],
			"gwei" => $request['gwei'],
			"gas_limit" => $request['gas_limit']
		]);
	}


	public function sendTransaction($request){

		return $this->request("POST","/eth/transactions/send",[
			"hex" => $request['hex']
		]);
	}

	public function getTransaction($request){

		return $this->request("GET","/eth/transactions/{$request['hash']}");
	}

	public function getErc20($request){
		return $this->request("GET","/eth/erc20-tokens/{$request['contract_address']}");
	}
	public function getErc20Balance($request){
		return $this->request("GET","/eth/erc20-tokens/{$request['contract_address']}/{$request['from']}/balance");
	}
	public function getErc20Transfer($request){
		if(isset($request['gwei']) == false){
			$blockChain = $this->getBlockChain();
			$request['gwei'] = $blockChain['high_gwei'];
		}

		$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
		$request['password'] = isset($request['password'])==false ?null:$request['password'];
		$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];

		return $this->request("POST","/eth/erc20-tokens/{$request['contract_address']}/{$request['from']}/transfer",[
			"to" => $request['to'],
			"amount" => $request['amount'],
			"private_key" => $request['private_key'],
			"password" => $request['password'],
			"gwei" => $request['gwei'],
			"gas_limit" => $request['gas_limit']
		]);
	}

	public function getNfts($request){
		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/erc721-tokens/{$request['contract_address']}/tokens",[
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getOwnerNfts($request){
		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/erc721-tokens/{$request['contract_address']}/{$request['owner_address']}/owner",[
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getCreatorNfts($request){
		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/erc721-tokens/{$request['contract_address']}/{$request['creator_address']}/creator",[
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getAuctionNfts($request){
		$request['order_by'] = isset($request['order_by'])==false?'end_time':$request['order_by'];
		$request['order_direction'] = isset($request['order_direction'])==false?'desc':$request['order_direction'];

		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/erc721-tokens/{$request['contract_address']}/auction",[
			"order_by" => $request['order_by'],
			"order_direction" => $request['order_direction'],
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getSaleNfts($request){
		$request['order_direction'] = isset($request['order_direction'])==false?'desc':$request['order_direction'];

		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/erc721-tokens/{$request['contract_address']}/{$request['seller_address']}/sale",[
			"order_direction" => $request['order_direction'],
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getNftBids($request){
		$request['rawtx'] = isset($request['rawtx'])==false?0:$request['rawtx'];
		$request['order_direction'] = isset($request['order_direction'])==false?'desc':$request['order_direction'];

		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/erc721-tokens/{$request['contract_address']}/{$request['token_id']}/bid",[
			"order_direction" => $request['order_direction'],
			"rawtx" => $request['rawtx'],
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}

	public function getNftInfo($request){

		return $this->request("GET","/eth/erc721-tokens/{$request['contract_address']}/{$request['token_id']}/info",[
		]);
	}

	public function getNftTransfers($request){
		$request['rawtx'] = isset($request['rawtx'])==false?0:$request['rawtx'];

		$request['offset'] = isset($request['offset'])==false?0:$request['offset'];
		$request['limit'] = isset($request['limit'])==false?10:$request['limit'];

		return $this->request("GET","/eth/erc721-tokens/{$request['contract_address']}/{$request['token_id']}/transfers",[
			"rawtx" => $request['rawtx'],
			"offset" => $request['offset'],
			"limit" => $request['limit']
		]);
	}
	
	public function getMultiNft($request){
            $request['offset'] = isset($request['offset'])==false?0:$request['offset'];
            $request['limit'] = isset($request['limit'])==false?10:$request['limit'];

            return $this->request("GET","/eth/erc1155-tokens/{$request['contract_address']}/tokens",[
                "offset" => $request['offset'],
                "limit" => $request['limit']
            ]);
        }
	
	public function getMultiNftOwnerList($request){
            $request['offset'] = isset($request['offset'])==false?0:$request['offset'];
            $request['limit'] = isset($request['limit'])==false?10:$request['limit'];

            return $this->request("GET","/eth/erc1155-tokens/{$request['contract_address']}/{$request['token_id']}/list",[
                "offset" => $request['offset'],
                "limit" => $request['limit']
            ]);
        }

        public function getMultiNftContractOwner($request){
            $request['offset'] = isset($request['offset'])==false?0:$request['offset'];
            $request['limit'] = isset($request['limit'])==false?10:$request['limit'];

            return $this->request("GET","/eth/erc1155-tokens/{$request['contract_address']}/{$request['owner_address']}/owners",[
                "offset" => $request['offset'],
                "limit" => $request['limit']
            ]);
        }

        public function getMultiNftOwner($request){
            $request['offset'] = isset($request['offset'])==false?0:$request['offset'];
            $request['limit'] = isset($request['limit'])==false?10:$request['limit'];

            return $this->request("GET","/eth/erc1155-tokens/{$request['owner_address']}/owner",[
                "offset" => $request['offset'],
                "limit" => $request['limit']
            ]);
        }

        public function getMultiNftContractCreator($request){
            $request['offset'] = isset($request['offset'])==false?0:$request['offset'];
            $request['limit'] = isset($request['limit'])==false?10:$request['limit'];

            return $this->request("GET","/eth/erc1155-tokens/{$request['contract_address']}/{$request['creator_address']}/creators",[
                "offset" => $request['offset'],
                "limit" => $request['limit']
            ]);
        }

        public function getMultiNftCreator($request){
            $request['offset'] = isset($request['offset'])==false?0:$request['offset'];
            $request['limit'] = isset($request['limit'])==false?10:$request['limit'];

            return $this->request("GET","/eth/erc1155-tokens/{$request['creator_address']}/creator",[
                "offset" => $request['offset'],
                "limit" => $request['limit']
            ]);
        }

        public function getMultiNftInfo($request){

            return $this->request("GET","/eth/erc1155-tokens/{$request['contract_address']}/{$request['token_id']}/info",[
            ]);
        }

        public function getMultiNftTransfers($request){
            $request['rawtx'] = isset($request['rawtx'])==false?0:$request['rawtx'];

            $request['offset'] = isset($request['offset'])==false?0:$request['offset'];
            $request['limit'] = isset($request['limit'])==false?10:$request['limit'];

            return $this->request("GET","/eth/erc1155-tokens/{$request['contract_address']}/{$request['token_id']}/transfers",[
                "rawtx" => $request['rawtx'],
                "offset" => $request['offset'],
                "limit" => $request['limit']
            ]);
        }
	
	public function getMultiSaleNfts($request){
            $request['order_direction'] = isset($request['order_direction'])==false?'desc':$request['order_direction'];

            $request['offset'] = isset($request['offset'])==false?0:$request['offset'];
            $request['limit'] = isset($request['limit'])==false?10:$request['limit'];

            return $this->request("GET","/eth/erc1155-tokens/{$request['contract_address']}/{$request['seller_address']}/sale",[
                "order_direction" => $request['order_direction'],
                "offset" => $request['offset'],
                "limit" => $request['limit']
            ]);
        }

	public function getContractRead($request){
		$request['parameter_type'] = isset($request['parameter_type'])==false ?null:$request['parameter_type'];
		$request['parameter_data'] = isset($request['parameter_data'])==false ?null:$request['parameter_data'];

		return $this->request("POST","/eth/contracts/{$request['contract_address']}/read",[
			"method" => $request['method'],
			"return_type" => $request['return_type'],
			"parameter_type" => $request['parameter_type'],
			"parameter_data" => $request['parameter_data'],
		]);
	}

	public function getContractWrite($request){
		$request['private_key'] = isset($request['private_key'])==false ?null:$request['private_key'];
		$request['password'] = isset($request['password'])==false ?null:$request['password'];
		$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];

		$request['parameter_type'] = isset($request['parameter_type'])==false ?null:$request['parameter_type'];
		$request['parameter_data'] = isset($request['parameter_data'])==false ?null:$request['parameter_data'];

		return $this->request("POST","/eth/contracts/{$request['contract_address']}/write",[
			"method" => $request['method'],
			"return_type" => $request['return_type'],
			"parameter_type" => $request['parameter_type'],
			"parameter_data" => $request['parameter_data'],
			"from" => $request['from'],
			"private_key" => $request['private_key'],
			"password" => $request['password'],
			"amount" => $request['amount'],
			"gas_limit" => $request['gas_limit'],
		]);
	}

	public function getContractWriteFees($request){
		$request['gas_limit'] = isset($request['gas_limit'])==false ?null:$request['gas_limit'];

		$request['parameter_type'] = isset($request['parameter_type'])==false ?null:$request['parameter_type'];
		$request['parameter_data'] = isset($request['parameter_data'])==false ?null:$request['parameter_data'];

		return $this->request("POST","/eth/contracts/{$request['contract_address']}/write/fees",[
			"method" => $request['method'],
			"return_type" => $request['return_type'],
			"parameter_type" => $request['parameter_type'],
			"parameter_data" => $request['parameter_data'],
			"from" => $request['from'],
			"amount" => $request['amount'],
			"gas_limit" => $request['gas_limit'],
		]);
	}
}
?>
