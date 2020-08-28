<?php

include (RUTA_APP."/control/routes.php");

class pages extends routes{

  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');

  }


  public function Logout(){

    if($this->SessionModelo->out()){
      echo json_encode(true);
    }else {
      echo json_encode(false);
    }

  }

}//end class
?>
