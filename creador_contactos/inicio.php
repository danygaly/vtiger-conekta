<?php
date_default_timezone_set('America/Mexico_City');

require_once 'controllers/registro_contacto.controller.php';
require_once 'controllers/consume_api.controller.php';

define('MODE', isset($_REQUEST['ERROR']) ? 'error' : 'regular');

switch (MODE)
{
	case 'regular':
        
	break;
	case 'error':
        
    break;

	default:
}

ini_set('max_execution_time', '300');

$data_nuevo_registro = $_REQUEST;



$registro = new RegistroContactoController($data_nuevo_registro);
$remoto = new ConsumeAPIController();

$data_contact = $registro->getDataForCreateContact();
$data_contact = json_encode($data_contact);

$challenge = $remoto->getChallenge();
$token = $challenge['result']['token'];
$data_login = $remoto->login($token);
$session = $data_login['result']['sessionName'];

$new_contact = $remoto->addContact($session,$data_contact);

$result['success'] = $new_contact['success'];

print (json_encode($result));
return true;