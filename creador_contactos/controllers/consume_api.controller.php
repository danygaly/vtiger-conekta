<?php
date_default_timezone_set('America/Mexico_City');
/**
 * 	Clase para consumir API de Vtiger
 */
class ConsumeAPIController {
    private $url_api;
    private $user_api;
    private $access_key_api;
    private $operation;

    public function __CONSTRUCT($url,$user,$key) {
        $this->url_api = $url;
        $this->user_api = $user;
        $this->access_key_api = $key;
    }

    public function getChallenge(){

        $this->operation = "getchallenge";
        $data = 'operation='.$this->operation;
        $data.='&';
        $data.='username='.$this->user_api;

        $response = json_decode($this->sendGetToEndPoint($data),true);

        return $response;
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

    public function addContact($session_name,$data_contact){

        $operation = $this->operation = "create";
        $session_name = $session_name;
        $element = $data_contact;
        $element_type = 'Contacts';
        $data = array(
            'operation' => $operation,
            'sessionName' => $session_name,
            'element' => $element,
            'elementType' => $element_type
        );
        $response = json_decode($this->sendPostToEndPoint($data),true);
        return $response;

    }

    private function sendPostToEndPoint($data){
        $curl = curl_init($this->url_api);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        curl_close($curl);
        return $result;
    }

    private function sendGetToEndPoint($data){
        $curl = curl_init($this->url_api.'?'.$data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);

        curl_close($curl);
        return $result;
    }

}
