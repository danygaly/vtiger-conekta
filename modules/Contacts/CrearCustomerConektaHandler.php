<?php 

require_once('include/utils/utils.php');
require_once('modules/Conekta/Conekta.php');

//Coloca este archivo en vtigercrm/modules/Contacts/
//Debes registrar el handler ejecutando regisrarEventHandler.php desde la carpeta principal de Vtiger.

class CrearCustomerConektaHandler extends VTEventHandler 
{
	public function handleEvent($eventType, $entity)
	{
		$api = new ConektaConsumeAPI();
		$moduleName = $entity->getModuleName();
		if ($moduleName == 'Contacts' && $eventType == 'vtiger.entity.beforesave') {
			$idContacto = $entity->getId();
			$camposContacto = $entity->getData();

			$name = $entity->get('firstname').' '.$entity->get('lastname');
			$mail = $entity->get('email');
			$phone = $entity->get('phone');

			$data_costume = array(
				'name' => $name,
				'email' => $mail,
				'phone' => $phone
			);
			$data_costume = json_encode($data_costume);
			$response = json_decode($api->sendDataCostume($data_costume));

			$id_conekta = $response->id;

			$entity->set('otherphone', $id_conekta);

			//Este exit sirve para ver en el navegador el output (echos) de arriba. 
			//Es necesario quitarlo para que al guardar el contacto en la vista de edición, regrese al usuario a la vista de detalle.
			//exit; 
		}
	}
}