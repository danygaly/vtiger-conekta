<?php


class ConektaConsumeAPI {

	function __construct() {}

    public function sendDataCostume($data_costume){

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.conekta.io/customers",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $data_costume,
            CURLOPT_HTTPHEADER => [
                "accept: application/vnd.conekta-v2.1.0+json",
                "authorization: Bearer key_gvNwyMrCvOZT4GCuS08Izyv",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            //echo "cURL Error #:" . $err;
            return $err;
        } else {
            //echo $response;
            return $response;
        }
    }

}

?>