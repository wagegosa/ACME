 <?php
 //llamamos a la connecion
require('../conexion.php');
/*
if ($_POST) {
  echo "<pre>";
  echo htmlspecialchars(print_r($_POST,true));
  echo "</pre>";
  exit();
}*/
//capturamos
$placa= $_POST['placa'];
$marca= $_POST['marca'];
$tipo_vehiculo= $_POST['tipo_vehiculo'];
$conductor= $_POST['conductor'];
$propietario= $_POST['propietario'];
//Validamos que el metodo POST este enviando datos.
if ($placa != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $sql = "INSERT INTO tbl_vehiculos(placa, marca, tipo_vehiculo, conductor, propietario) VALUES ('$placa', '$marca', '$tipo_vehiculo', '$conductor', '$propietario');";
    //echo "querry: ".$sql."<br>";
    //exit();
    $Conexion->query($sql);
    echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    header("Location: ../../Vehiculo/Con_Vehiculo.php");
  }
  catch ( PDOException $e ){
    die("Ha ocurrido un error inesperado en la base de datos.<br>".$e->getMessage());
    echo "Por favor revisar los datos que se estan insertando.";
  }
}
//si no esta enviando datos, nos notifica por un scritp y nos muestra que nos trae.
else{
  echo "<script>alert('¡Por favor revisar los datos ingresados, estos no pueden estar vacíos! ');</script>";
  exit();
  header("Location:../../Area/Con_Area.php");
}
?>