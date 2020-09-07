<?php

include (RUTA_APP."/control/routes.php");

class pages extends routes{

  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');

  }


  public function enviar(){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $titulo = trim($_POST['Asunto']);
      $nombre = trim($_POST['Nombre']);
      $correo = trim($_POST['Correo']);
      $fono = trim($_POST['Fono']);
      $mensaje = trim($_POST['Mensaje']);
      $estado = 0;
      $id_empresa = 1;

      $columnas = array("id_empresa", "titulo", "nombre", "correo", "fono", "mensaje", "estado");
      $datos =  array($id_empresa, $titulo, $nombre, $correo, $fono, $mensaje, $estado);

      //ejecyta la insercion
      if($this->ConfigModelo->insert('Mensajes', $columnas, $datos)){

        $_SESSION["success"]=true;
        redireccionar('pages/contacto');

      }else{
        echo false;
      }

    }else{

      $columnas = "";
      $datos = "";

    }

  }

  //cuenta la cantidad de mails entrantes
  public function CounterMail(){

    $CantidadMails = ($this->ConfigModelo->select('rowCountWhere', 'Mensajes', 'estado', '0', 'Id', 'Id'));

    return $CantidadMails;

  }

  //extrae todo los mails recibidos en estado 0
  public function SelectMail(){

    $CantidadMails = ($this->ConfigModelo->select('select', 'Mensajes', 'estado', '0', 'Id', 'Id'));
    return $CantidadMails;

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
