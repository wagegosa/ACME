 <?php

class Vehiculos extends DataBase
{
	public $idtbl_vehiculos;
  public $placa;
	public $marca;
  public $tipo_vehiculo;
  public $conductor;
  public $propietario;
	
  public function listarVehiculos()
  {
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM acme.vs_vehiculos";
      $qry = $this->dbCon->prepare($sql);
      $qry->execute();
      $row = $qry->fetchAll(PDO::FETCH_OBJ);
      $qry->closeCursor();
      return $row;
      $this->dbCon = null;
    }
    catch ( PDOException $e )
    {
      die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    }
  }
}

?>
