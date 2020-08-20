<?php

// Motrar todos los errores de PHP
error_reporting(-1);

require_once 'config/config.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/alerts.php';

//auto load php
spl_autoload_register(function($nombreClase){
  require_once 'librerias/' . $nombreClase. '.php';
});

?>
