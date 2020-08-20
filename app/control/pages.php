<?php

include (RUTA_APP."/control/routes.php");

class pages extends routes{

  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');

  }

  public function test(){

    $notification =  array('title' => "dasdasd", 'description' => "sasdasasdasdasdsadasd123123", 'type' => "success", 'button' => "ok");
    notification($notification);
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
