<?php

include (RUTA_APP."/control/routes.php");

class pages extends routes{

  public function __construct(){
    //configuracion incial
    $this->ConfigModelo = $this->modelo('config');
    $this->SessionModelo = $this->modelo('session');

  }

  public function CrearProducto(){

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {


      $NombreProducto = trim($_POST['NombreProducto']);
      $CantidadProducto = trim($_POST['CantidadProductos']);
      $PrecioProducto = trim($_POST['PrecioProducto']);
      $Estado = 1;
      $id_empresa =1;

      $columnas = array("id_empresa", "cantidad", "precio", "nombre", "estado");
      $datos =  array($id_empresa, $CantidadProducto, $PrecioProducto, $NombreProducto, $Estado);

      //ejecyta la insercion
      if($this->ConfigModelo->insert('productos', $columnas, $datos)){

        $_SESSION["success"]=true;
        redireccionar('pages/intranet');

      }else{
        echo false;
      }

    }else{

      $columnas = "";
      $datos = "";

    }
  }

  //registra un mail
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

  //marca el mensaje como recibido y cambia de estado
  public function MensajeLeido(){

    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id_mensaje'];

    if($this->ConfigModelo->update('Where', 'Mensajes', 'estado', '1', 'Id', $id)){
      echo json_encode(true);
    }else{
      echo json_encode(false);
    }


  }

  //seleccionar productos
  public function SelectProductos(){

    $CantidadMails = ($this->ConfigModelo->select('select', 'productos', '', '', '', ''));
    return $CantidadMails;

  }

  //eliminar productos
  public function DeleteProductos($id){

    $CantidadMails = ($this->ConfigModelo->delete('productos', 'id_producto', '', '', '', ''));
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
