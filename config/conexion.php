<?php

// Archivo de conexion a la base de datos MySQL

class DataBase {
  //Propiedades de la clase

  //Servidor de la Base de datos.
  protected $svr = "localhost";
  //Usuario del Servidor de la Base de datos.
  protected $usr = "root";
  //Contraseña del Usuario de la Base de datos.
  //protected $pwd = "W@lt3rG0nz4l3z@2019";
  protected $pwd = "";
  //Nombre de la Base de datos.
  protected $dbh = "acme";
  //Enlace con la base de datos MySQL
  protected $dbCon;

     
  /**
   * Función en php para la conexión con el servidor de
   * la base de datos MySQL, a través de PDO.
   * @return [[Type]] [[Description]]
   */
  public function Conexion() {
    try 
    {
      $this->dbCon = new PDO('mysql:host='.$this->svr.';dbname='.$this->dbh, $this->usr, $this->pwd);
      $this->dbCon->exec("SET CHARACTER SET utf8");
      $this->dbCon->exec("SET lc_time_names = 'es_CO'");
      $this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->dbCon->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $this->dbCon->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
      $this->dbCon->setAttribute(PDO::ATTR_PERSISTENT, true);
      return $this->dbCon;
    }
    /**
     * Captura la excepción
     */
    catch (PDOException $e) 
    {
      exit("<h5 class='text-danger'>¡Error en la conexión! <br/> &#8220;".$e->getMessage()."&#8221;</h5><h6 class='text-warning'>Error presente en la línea ".$e->getLine().", código de excepción ".$e->getCode().".</h6>");
    }
  }
}
?>
