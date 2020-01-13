 <?php
//llamamos a la connecion
require('../conexion.php');

/*if ($_POST) {
  echo "<pre>";
  echo htmlspecialchars(print_r($_POST,true));
  echo "</pre>";
}*/
$cedula= $_POST['nuero_cedula'];
$Nombre= $_POST['primer_nombre'];
$seNombre= $_POST['segundo_nombre'];
$Apellidos= $_POST['apellidos'];
$Dirreccion= $_POST['direccion'];
$Telefono= $_POST['telefono'];
$Ciudad= $_POST['Ciudad'];
$id= $_POST['id'];
$Con= new DataBase();
$Conn= $Con->Conexion();
try
{
  $query = "UPDATE tbl_conductor SET nuero_cedula='$cedula', primer_nombre='$Nombre', segundo_nombre='$seNombre', apellidos='$Apellidos', direccion='$Dirreccion', telefono='$Telefono', Ciudad='$Ciudad' WHERE idtbl_conductor=".$id.";";
  //echo "sentencia: ".$query;
  //exit();
  $Resul= $Conn->prepare($query);
  $Resul->bindParam(':id', $id, PDO::PARAM_STR, 100);
  $Resul->execute();
  $Resul->setFetchMode(PDO::FETCH_ASSOC);
  $Resul->setFetchMode(PDO::FETCH_ASSOC);
  $Resultado= $Resul->rowCount();
  if($Resultado!=0||$Resultado!=null){
    header("Location: ../../Condutor/Con_Conductor.php");
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