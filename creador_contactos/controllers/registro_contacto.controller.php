<?php
date_default_timezone_set('America/Mexico_City');
/**
 * 	Clase para validar y enviar los datos proporcionados por el formulario
 */

class RegistroContactoController {

   private $nombre,$apellido,$mail,$telefono;

   public function __CONSTRUCT($data) {

      $this->nombre = $data['nombre'];
      $this->apellido = $data['apellido'];
      $this->mail = $data['mail'];
      $this->telefono = $data['phone'];
      
   }

   public function getDataForCreateContact(){

      $data_contact = array(
         'firstname' => $this->nombre, 
         'lastname' => $this->apellido, 
         'email' => $this->mail, 
         'phone' => $this->telefono,
         'assigned_user_id' => 'administrator'
     );

     return $data_contact;
   }

   public function dataValidate($data){

      $message_invalido = 'Debe llenar todos los campos.';

      $result['success'] = true;
      $result['msg'] = '';

      if(empty($data['firstname']) || empty($data['lastname']) || empty($data['email']) ||empty($data['phone'])) {
       
         $result['success'] = false;
         $result['msg'] = $message_invalido;
         return $result;
         exit;

      }
  
      $sanitiza_firstname = htmlspecialchars($data['firstname'],ENT_HTML5);
      if (!preg_match("/^[a-zA-Z\s]+$/", $sanitiza_firstname)) {
         $result['success'] = false;
         $result['msg'] = 'Nombre o apellido no validos';
         return $result;
         exit;
      }

      $sanitiza_lastname = htmlspecialchars($data['lastname'],ENT_HTML5);
      if (!preg_match("/^[a-zA-Z\s]+$/", $sanitiza_lastname)) {
         $result['success'] = false;
         $result['msg'] = 'Nombre o apellido no validos';
         return $result;
         exit;
      }

      $sanitiza_mail = htmlspecialchars($data['email']);
      if (!filter_var($sanitiza_mail, FILTER_VALIDATE_EMAIL)) {
         $result['success'] = false;
         $result['msg'] = 'Correo no valido';
         return $result;
         exit;
      }

      $sanitiza_phone = htmlspecialchars($data['phone'],ENT_HTML5);
      if (!preg_match("/^[0-9]{10}$/", $sanitiza_phone) ) {
         $result['success'] = false;
         $result['msg'] = 'Telefono no valido';
         return $result;
         exit;
      }
      
      return $result;
   }

}

