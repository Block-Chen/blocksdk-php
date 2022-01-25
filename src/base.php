<?php

namespace BlockSDK;

class Base{
    public $api_token;

    function __construct(string $api_token = ''){
        $this->api_token = $api_token;
    }

    public function request($method,$path,$data = []){
        $url = "https://api.blocksdk.com/v2" . $path;

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

        if($method == "POST" || $method == "DELETE"){
            $json = json_encode($data);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
        }

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','x-api-token: '. $this->api_token));
        $result = curl_exec($ch);
        curl_close($ch);


        return json_decode($result,true);
    }
}
?>