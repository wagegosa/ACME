 <?php
 //llamamos a la connecion
require('../conexion.php');
//capturamos
$cedula= $_POST['nuero_cedula'];
$Nombre= $_POST['primer_nombre'];
$seNombre= $_POST['segundo_nombre'];
$Apellidos= $_POST['apellidos'];
$Dirreccion= $_POST['direccion'];
$Telefono= $_POST['telefono'];
$Ciudad= $_POST['Ciudad'];
//Validamos que el metodo POST este enviando datos.
if ($Nombre != "" ){
  try{
    $Con= new DataBase();
    $Conexion= $Con->Conexion();
    $sql = "INSERT INTO tbl_conductor(nuero_cedula, primer_nombre, segundo_nombre, apellidos, direccion, telefono, Ciudad) VALUES ('$cedula', '$Nombre', '$seNombre', '$Apellidos', '$Dirreccion', '$Telefono', '$Ciudad');";
    //echo "querry: ".$sql."<br>";
    //exit();
    $Conexion->query($sql);
    echo "<script>alert('¡Se almaceno correctamente.!');</script>";
    header("Location:../../Condutor/Con_Conductor.php");
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