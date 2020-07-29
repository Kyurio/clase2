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

  public function Insert(){


    //if ($_SERVER['REQUEST_METHOD'] == 'POST'){

      //$data = json_decode(file_get_contents("php://input"), true);
      //$consulta = $data['consultaRecibida'];


      $datos = array('ulreich','kimmich','Lampard','inmobile');
      $columnas = array('columna1', 'columna2', 'columna3', 'columan4');
      $insert = $this->ConfigModelo->insert("juanchis", $columnas ,$datos);




      echo $insert;
    //}

  }


}//end class
?>
