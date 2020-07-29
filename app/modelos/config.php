<?php

class config{
  private $bd;

  public function __construct(){
    //instancia la conexion
    $this->bd = new conn;
  }
  /*----------------------------------------------------------------------------
  consultas select
  ----------------------------------------------------------------------------*/
  public function select($option, $tabla, $condicion, $filtro, $count, $groupby){
    try{
      //reemplazar por un case;
      switch ($option) {

        case "filtro":
        $this->bd->query("SELECT * FROM $tabla WHERE $condicion = $filtro");
        return $this->bd->registros();
        break;

        case "groupby":
        $this->bd->query("SELECT * FROM $tabla  GROUP BY $groupby");
        return $this->bd->registros();
        break;

        case "count":
        $this->bd->query("SELECT *, count($count)AS total FROM $tabla GROUP BY $groupby");
        return $this->bd->registros();
        break;

        case "countWhere":
        $this->bd->query("SELECT count($count)AS total FROM $tabla WHERE $filtro = $condicion GROUP BY $groupby");
        return $this->bd->registros();
        break;

        case "rowCount":
        $this->bd->query("SELECT * FROM $tabla");
        return $this->bd->rowCount();
        break;

        case "rowCountWhere":
        $this->bd->query("SELECT * FROM $tabla WHERE $condicion = $filtro");
        return $this->bd->rowCount();
        break;

        case "select":
        $this->bd->query("SELECT * FROM $tabla");
        return $this->bd->registros();
        break;

        default:
        echo "default";
        break;
      }

    }catch(PDOException $e){
      echo $e;
      //header('location: ' . RUTA_URL . 'pages/error/500');
    }
  }

  /*----------------------------------------------------------------------------
  consultas updates
  ----------------------------------------------------------------------------*/
  public function update($option, $tabla, $ColumnaActualiza, $valor, $Filtro, $ValorFiltrado){
    try {

      switch ($option) {

        case "NoWhere":
        $this->bd->query("UPDATE $tabla SET $ColumnaActualiza = $valor");
        return $this->bd->execute();
        break;

        case "Where":
        $this->bd->query("UPDATE $tabla SET $ColumnaActualiza = $valor WHERE $Filtro = $ValorFiltrado");
        return $this->bd->execute();
        break;

        default:
        echo "default";
        break;
      }



    } catch (\Exception $e){
      header('location: ' . RUTA_URL . 'pages/error/500');
    }

  }

  /*----------------------------------------------------------------------------
  consultas delete
  ----------------------------------------------------------------------------*/
  public function delete($tabla, $condicion, $filtro){
    try {
      //consulta sql
      $this->bd->query("DELETE FROM $tabla WHERE $condicion = $filtro ");

      //ejecutar consulta
      if($this->bd->execute()){
        return json_encode(true);
      }else{
        return json_encode(false);
      }

    } catch (\Exception $e) {

      header('location: ' . RUTA_URL . 'pages/error/500');

    }

  }

  /*----------------------------------------------------------------------------
  consultas insert
  ----------------------------------------------------------------------------*/
  public function insert($tabla, $columnas, $values){

    try {

      // largo de las arrays
      $Llaves ="";
      $Valores ="";

      $columas_length = count($columnas);
      $values_length = count($values);

      // recorre las llaves a insertar
      for ($i=0; $i < $columas_length; $i++) {
        $Llaves = $Llaves.", ".$columnas[$i];
      }

      // recorre los valores de llave
      for ($e=0; $e < $values_length; $e++) {
        $Valores = $Valores.", ". $values[$e];
      }
      // datos limpios
      $Llaves =  ltrim($Llaves, ',');
      $Valores = ltrim($Valores, ',');

      //inserta los valores
      $this->bd->query("INSERT INTO :tabla ($Llaves) VALUES ($Valores)");
      $this->bd->bind(':tabla', $tabla);

      //ejecutar consulta
      if($this->bd->execute()){

        return json_encode(true);

      }else{

        return json_encode(false);

      }

    }catch (\Exception $e) {

      die("error 500 ".$e);

    }
  }


} //end class
