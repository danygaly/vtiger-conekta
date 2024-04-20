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
			$id_conekta = $entity->get('otherphone');

			$data_costume = array(
				'name' => $name,
				'email' => $mail,
				'phone' => $phone
			);
			$data_costume = json_encode($data_costume);


			if($id_conekta == ''){
				$response = json_decode($api->createCostume($data_costume));
				$id_conekta = $response->id;
				$entity->set('otherphone', $id_conekta);
			}

			if($id_conekta != ''){
				$data_costumer = json_decode($api->getACostume($id_conekta));
				$type_object = $data_costumer->object;
				
				if($type_object == 'error'){
					throw new Exception('No existe un cliente con el ID cus_xxxxx de Conekta');
				} 

				try {
					if($type_object == 'customer'){
						$response = json_decode($api->updateCostume($id_conekta,$data_costume));	
					}
				} catch (Exception $e) {
					echo 'Ha habido una excepción: ' . $e->getMessage() . "<br>";
				}
			}
			//Este exit sirve para ver en el navegador el output (echos) de arriba. 
			//Es necesario quitarlo para que al guardar el contacto en la vista de edición, regrese al usuario a la vista de detalle.
			//exit; 
		}
	}
}