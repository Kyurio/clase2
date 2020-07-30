<?php

include (RUTA_APP."/control/routes.php");

class pages extends routes{


  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');

  }

  public function Ejemplo(){

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      $data = json_decode(file_get_contents("php://input"), true);
      $columnas = array('pregunta', 'respuesta');
      $datos = array('ulreich','kimmich');
      $insert = $this->ConfigModelo->insert("pregunta", $columnas ,$datos);

    }else {
      $datos = "";
      $columnas = "";
    }

  }

  public function Select(){

    if($product = $this->ConfigModelo->select('select', 'pregunta')){
      echo json_encode($product);
    }else {
      echo json_encode("producto no encontrado");
    }

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
