<?php
//Conexión a la base de datos
require "../config/conexion.php";
require "../config/ClassConductor/classCondutor_sel.php";
include "../config/ClassPropietario/classPropietario_sel.php";

/*
if ($_POST) {
  echo "<pre>";
  echo htmlspecialchars(print_r($_POST));
  echo "</pre>";
  exit();
}*/

$Con= new DataBase();
$Conn= $Con->Conexion();
$Conductor= new Conductor();
$Conductores= $Conductor->listarConductor();
$Propietario   = new Propietario();
$Propietarios = $Propietario->listarPropietario();

$id= 1;//$_POST['idtbl_vehiculos'];

try {
  $query="SELECT * FROM acme.tbl_vehiculos A WHERE A.idtbl_vehiculos= ".$id.";";
  $Resul= $Conn->prepare($query);
  $Resul->bindParam(':id', $id);
  $Resul->execute();
  $Resul->setFetchMode(PDO::FETCH_ASSOC);
  $Resul->setFetchMode(PDO::FETCH_ASSOC);
  $Resultado= $Resul->rowCount();

  if($Resultado!=0){
    while ($R= $Resul->fetch()):
  ?>
  <!DOCTYPE html>
  <html lang="es" ng-app>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap núcleo CSS-->
    <link rel="stylesheet" media="screen" href="../assets/bootstrap/themes/Simplex/bootstrap.min.css">
    <!--Biblioteca de iconos monocromáticos y símbolos-->
    <link rel="stylesheet" href="../assets/bootstrap/fonts/glyphicons-pro/css/glyphicons-pro.css">
    <link rel="stylesheet" href="../assets/bootstrap/fonts/font-awesome/css/font-awesome.min.css">
    <!--Paginación, filtrado de registros-->
    <link rel="stylesheet" href="../assets/footable/css/footable.bootstrap.min.css">
    <title>Vehiculos</title>
  </head>

  <body>
    <div class="container">
    <?php   include "../Plantillas/plantilla_Menu.php"; ?>
      <div class="row">
        <div class="col-md-12">
          <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Vehiculos</h3>
          <ol class="breadcrumb">
            <li><a href="#">Inicio</a></li>
            <li><a href="Con_Vehiculo.php">Vehiculos</a></li>
            <li class="active">Nuevo Vehiculo</li>
          </ol>
        </div>
      </div>
      <!-- Formulario -->
      <form method="post" autocomplete="off" id="frm" action="../config/ClassVehiculo/classVehiculo_upd.php">
        <div class="row">
          <div class="col-md-4">
            <label for="email">Placa:</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="placa" id="placa" placeholder="Placa" class="form-control" maxlength="6" minlength="5" value="<?= $R['placa']; ?>" >
            <span class="help-block" id="error"></span>
          </div>
          <div class="col-md-4">
            <label for="email">Marca:</label>
          </div>
          <div class="col-md-8">
            <input type="text" name="marca" id="marca" placeholder="Marca" class="form-control" maxlength="60" value="<?= $R['marca']; ?>" >
            <span class="help-block" id="error"></span>
          </div>
          <div class="col-md-4">
            <label for="email">Tipo Vehiculo:</label>
          </div>
          <div class="col-md-8">
            <select class="form-control error" name="tipo_vehiculo" id="tipo_vehiculo" aria-invalid="true" >
              <option value="0">Seleccione...</option>
              <option value="PARTICULAR" <?php if("PARTICULAR" == $R['tipo_vehiculo']){ echo "selected";} ?> >PARTICULAR</option>
              <option value="PUBLICO" <?php if("PUBLICO" == $R['tipo_vehiculo']){ echo "selected";} ?> >PUBLICO</option>
            </select>
            <span class="help-block" id="error"></span>
          </div>
          <div class="col-md-4">
            <label for="email">Conductor:</label>
          </div>
          <div class="col-md-8">
            <select class="form-control" name="conductor" id="conductor" >
              <option value="0">Seleccione...</option>
              <?php ?>
              <?php foreach ($Conductores as $ListarC): ?>
              <option value="<?= $ListarC->idtbl_conductor;?>" <?php if($ListarC->idtbl_conductor = $R['conductor']){ echo "selected";} ?> ><?= $ListarC->primer_nombre." ".$ListarC->segundo_nombre." ".$ListarC->apellidos;?></option>
              <?php endforeach; ?>
            </select>
            <span class="help-block" id="error"></span>
          </div>
          <div class="col-md-4">
            <label for="email">Propietario:</label>
          </div>
          <div class="col-md-8">
              <select class="form-control" name="propietario" id="propietario" >
              <option value="0">Seleccione...</option>
              <?php foreach ($Propietarios as $ListarP): ?>
              <option value="<?= $ListarP->idtbl_propietario;?>" <?php if($ListarP->idtbl_propietario = $R['propietario']){ echo "selected";} ?> ><?= $ListarP->primer_nombre." ".$ListarP->segundo_nombre." ".$ListarP->apellidos;?></option>
              <?php endforeach; ?>
            </select>
            <span class="help-block" id="error"></span>
          </div>
        </div>
        <div><br>
          <input type="hidden" name="id" id="id" value="<?= $R['idtbl_vehiculos']?>">
          <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
          <!--<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar</a>-->
        </div>
      </form>
    </div>
  </body>
  <!-- LIBRERIAS validadoras-->
  <script src="../assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Plugin para la validación de formularios -->
  <script src="../assets/jquery_validation/dist/jquery.validate.min.js"></script>
  <script src="../assets/jquery_validation/dist/localization/messages_es.js"></script>
  <!-- Plugin para listado, navegación y filtrado en tablas -->
  <script src="../assets/footable/js/footable.min.js"></script>
  <script src="../assets/footable/js/configTable.js"></script>
    <script>
      $(document).ready(function() {
        $("#frm").validate({
          rules: {
            placa: { required: true, minlength: 5, maxlength: 6 },
            marca: {required: true, minlength: 2, maxlength: 60 },
            tipo_vehiculo: {required: true },
            conductor: { required: true, number: true },
          propietario: { required: true, number: true  },
          }
        })
      });
    </script>
    <script>
      // Función para la visualización de la contraseña (cambia el input password por text)
      function mostrarPassword(){
        var cambio = document.getElementById("Contrasena");
        if(cambio.type == "password"){
          cambio.type = "text";
          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
          cambio.type = "password";
          $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
      } 


        function mostrarContrasena(){
        var cambio = document.getElementById("Contrasena2");
        if(cambio.type == "password"){
          cambio.type = "text";
          $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
          cambio.type = "password";
          $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
      } 

    </script>


  </html>
  <?php    
    endwhile;
  }else{
    echo "No se encontraron registros con el ID " .$id;
  }
} catch (PDOException $e) {
  die("Error occurred:" . $e->getMessage());
}
?>
