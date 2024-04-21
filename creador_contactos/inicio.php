<?php
date_default_timezone_set('America/Mexico_City');

require_once 'controllers/registro_contacto.controller.php';
require_once 'controllers/consume_api.controller.php';

define('MODE', ($_REQUEST['error'] === 'true') ? 'error' : 'regular');

$url_api;
$user_api;
$access_key_api;

switch (MODE)
{
	case 'regular':
		$url_api = "http://localhost/vtigercrm/webservice.php";
		$user_api = "admin";
		$access_key_api = "oFpRPYOP7DyMGvv4";
	break;
	case 'error':
        $url_api = "http://localhost/vtigercrm/webservice.php";
		$user_api = "fake";
		$access_key_api = "";
    break;

	default:
}

ini_set('max_execution_time', '300');

$data_nuevo_registro = $_REQUEST;

$registro = new RegistroContactoController($data_nuevo_registro);
$remoto = new ConsumeAPIController($url_api,$user_api,$access_key_api);

$data_contact = $registro->getDataForCreateContact();
$validate_data = $registro->dataValidate($data_contact);

if($validate_data['success'] == false){
	print (json_encode($validate_data));
	return true;
	exit;
}

$data_contact = json_encode($data_contact);

$challenge = $remoto->getChallenge();
$token = $challenge['result']['token'];
$data_login = $remoto->login($token);
$session = $data_login['result']['sessionName'];

$new_contact = $remoto->addContact($session,$data_contact);

$result['success'] = $new_contact['success'];

print (json_encode($result));
return true;