<?php

class routes extends control{

  public function __construct(){

    $this->SessionModelo = $this->modelo('session');

  }

  // abre el constructor principal de la app
  public function index(){

    $this->vista('pages/inicio');
  }

  // abre la pagina de conectos
  public function contacto(){

    $this->vista('pages/contacto');
  }

  // abre la intranet
  public function intranet(){

    $this->vista('pages/intranet');
  }


  public function productos(){

    $this->vista('pages/intranet');
  }


  // redirecciona a la pagina de error
  public function error($err = null){

    if (is_null($err)) {
      redireccionar('pages/index');
    }else {

      switch ($err) {
        case 404:
        $this->vista('error/404');
        break;

        case 403:
        $this->vista('error/403');
        break;

        case 500:
        $this->vista('error/500');
        break;

        default:
        redireccionar('pages/index');
        break;

      }

    }//end if


  }

  // grabar simulacion
  public function test(){

    $this->vista('pages/test');
  }

}//end class
?>
