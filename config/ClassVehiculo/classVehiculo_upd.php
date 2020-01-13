 <?php
//llamamos a la connecion
require('../conexion.php');

/*if ($_POST) {
  echo "<pre>";
  echo htmlspecialchars(print_r($_POST,true));
  echo "</pre>";
}*/
$placa= $_POST['placa'];
$marca= $_POST['marca'];
$tipo_vehiculo= $_POST['tipo_vehiculo'];
$conductor= $_POST['conductor'];
$propietario= $_POST['propietario'];
$id= $_POST['id'];
$Con= new DataBase();
$Conn= $Con->Conexion();
try
{
  $query = "UPDATE acme.tbl_vehiculos SET placa='$placa', marca='$marca', tipo_vehiculo='$tipo_vehiculo', conductor='$conductor', propietario='$propietario' WHERE idtbl_vehiculos=".$id.";";
  //echo "sentencia: ".$query;
  //exit();
  $Resul= $Conn->prepare($query);
  $Resul->bindParam(':id', $id, PDO::PARAM_STR, 100);
  $Resul->execute();
  $Resul->setFetchMode(PDO::FETCH_ASSOC);
  $Resul->setFetchMode(PDO::FETCH_ASSOC);
  $Resultado= $Resul->rowCount();
  if($Resultado!=0||$Resultado!=null){
    header("Location: ../../Vehiculo/Con_Vehiculo.php");
    exit();
  }else{
      echo "Fallo la redirección";
      exit();
  }
}
catch ( PDOException $e )
{
  die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
}

?>