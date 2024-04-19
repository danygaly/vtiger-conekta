<?php
date_default_timezone_set('America/Mexico_City');
/**
 * 	Clase para consumir API de Vtiger
 */
class ConsumeAPIController {
    const VTIGER_API_URL = "http://localhost/vtigercrm/webservice.php";
    const USER_NAME_API = "admin";
    const ACCESS_KEY_API = "oFpRPYOP7DyMGvv4";
    private $url_api;
    private $user_api;
    private $access_key_api;
    private $operation;

    public function __CONSTRUCT() {
        $this->url_api = self::VTIGER_API_URL;
        $this->user_api = self::USER_NAME_API;
        $this->access_key_api = self::ACCESS_KEY_API;
    }

    public function getToken(){

        $this->operation = "getchallenge";
        $data = 'operation='.$this->operation;
        $data.='&';
        $data.='username='.$this->user_api;

        $response = json_decode($this->sendGetToEndPoint($data),true);

        $token = $response['result']['token'];

        return $token;
    }

    public function login($token){

        $access_key = md5($token.$this->access_key_api);

        $operation = $this->operation = "login";
        $username = $this->user_api;
        $data = array(
            'operation' => $operation,
            'username' => $username,
            'accessKey' => $access_key
        );
        $response = json_decode($this->sendPostToEndPoint($data),true);
        return $response;

    }


    public function sendPostToEndPoint($data){
        $curl = curl_init($this->url_api);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        curl_close($curl);
        return $result;
    }

    public function sendGetToEndPoint($data){
        $curl = curl_init($this->url_api.'?'.$data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        curl_close($curl);
        return $result;
    }


}
