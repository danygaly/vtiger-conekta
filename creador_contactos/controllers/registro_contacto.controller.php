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

}

