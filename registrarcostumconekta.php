<?php

//Colocar este archivo en la carpeta raíz de vtiger y ejecutar desde navegador o línea de comandos.

require_once 'vtlib/Vtiger/Event.php';

Vtiger_Event::register(
    'Contacts', 
    'vtiger.entity.beforesave', 
    'EjemploBeforeSaveHandler', 
    'modules/Contacts/EjemploBeforeSaveHandler.php'
);