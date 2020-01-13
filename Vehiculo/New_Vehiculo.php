<?php
//Conexión a la base de datos
require "../config/conexion.php";
//Llamado a la clase
require "../config/ClassConductor/classCondutor_sel.php";
include "../config/ClassPropietario/classPropietario_sel.php";

$Conductor= new Conductor();
$Conductores= $Conductor->listarConductor();
$Propietario   = new Propietario();
$Propietarios = $Propietario->listarPropietario();
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
    <form method="post" autocomplete="on" id="frm" action="../config/ClassVehiculo/classVehiculo_Ins.php">
    <div class="row">
      <div class="col-md-4">
        <label for="email">Placa:</label>
      </div>
      <div class="col-md-8">
        <input type="text" name="placa" id="placa" placeholder="Placa" class="form-control" maxlength="6" minlength="5" >
        <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Marca:</label>
      </div>
      <div class="col-md-8">
        <input type="text" name="marca" id="marca" placeholder="Marca" class="form-control" maxlength="60" >
        <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Tipo Vehiculo:</label>
      </div>
      <div class="col-md-8">
        <select class="form-control error" name="tipo_vehiculo" id="tipo_vehiculo" aria-invalid="true" >
          <option value="0">Seleccione...</option>
          <option value="PARTICULAR">PARTICULAR</option>
          <option value="PUBLICO">PUBLICO</option>
        </select>
        <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Conductor:</label>
      </div>
      <div class="col-md-8">
        <select class="form-control" name="conductor" id="conductor" >
          <option value="0">Seleccione...</option>
          <?php foreach ($Conductores as $ListarC): ?>
          <option value="<?= $ListarC->idtbl_conductor;?>"><?= $ListarC->primer_nombre." ".$ListarC->segundo_nombre." ".$ListarC->apellidos;?></option>
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
          <option value="<?= $ListarP->idtbl_propietario;?>"><?= $ListarP->primer_nombre." ".$ListarP->segundo_nombre." ".$ListarP->apellidos;?></option>
          <?php endforeach; ?>
        </select>
        <span class="help-block" id="error"></span>
      </div>
    </div>
    <div><br>
      <button type="submit" class="btn btn-primary btn-lg btn-block">Guardar</button>
      <!--<a href="#" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span>Guardar</a>-->
    </div>
    </form>
  </div>
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
          conductor: { required: true, number: true },
          propietario: { required: true, number: true  },
        }
      })
    });
  </script>
</body>
</html>