 <?php

class Conductor extends DataBase
{
	public $idtbl_conductor;
  public $nuero_cedula;
	public $primer_nombre;
  public $segundo_nombre;
  public $apellidos;
  public $direccion;
  public $telefono;
  public $Ciudad;
	
  public function listarConductor()
  {
    try
    {
      parent::Conexion();
      $sql = "SELECT * FROM acme.tbl_conductor";
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
