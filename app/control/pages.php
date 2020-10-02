<?php

include (RUTA_APP."/control/routes.php");

class pages extends routes{

  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');

  }


  public function InsertTask(){

    $data = json_decode(file_get_contents("php://input"), true);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $titulo_tarea = trim($data['titulo_tarea']),
      $estado_tarea = trim($data['estado_tarea']),

      $columnas = array("titulo", "estado");
      $datos =  array($titulo_tarea, $estado_tarea);

      //ejecyta la insercion
      if($this->ConfigModelo->insert('task', $columnas, $datos)){
        echo json_encode(true);
      }else{
        echo json_encode(false);
      }

    }else{

      $formNuevoPost = [
        'titulo_tarea' => '',
        'estado_tarea' => '',
      ];

    }

  }

}//end class
?>
