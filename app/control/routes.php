<?php

class routes extends control{

  public function __construct(){

    $this->SessionModelo = $this->modelo('session');

  }
  // abre el constructor principal de la app
  public function index(){

    $this->vista('pages/constructor');

  }

  public function error(){

    

  }





}//end class
?>
