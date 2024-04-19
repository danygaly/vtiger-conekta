<?php
date_default_timezone_set('America/Mexico_City');
/*require_once 'model/reporte.model.php';
require_once 'lib/auth/auth.factory.php';*/
/**
 * 	Clase para consumir API de Vtiger
 */
class ConsumeAPIController {
    const VTIGER_API_URL = "http://localhost/vtigercrm/webservice.php";
    const USER_NAME_API = "Admin";
    private $url_api;
    private $user_api;
    private $operation;

    public function __CONSTRUCT() {
        $this->url_api = self::VTIGER_API_URL;
        $this->user_api = self::USER_NAME_API;
    }

    public function getChallenge($operation){

        $this->operation = "getchallenge";
        $data = 'operation='.$this->operation;
        $data.='&';
        $data.='username='.$this->user_api;

        $response = json_decode($this->sendToEndPoint($data));
        return $response;
    }

    public function sendToEndPoint($data){
        $curl = curl_init($this->url_api);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($curl);

        curl_close($curl);
        return $result;
    }


}
