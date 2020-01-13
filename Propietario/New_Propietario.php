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
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Propietarios</h3>
        <ol class="breadcrumb">
          <li><a href="#">Inicio</a></li>
          <li><a href="Con_Propietario.php">Propietarios</a></li>
          <li class="active">Nuevo Propietario</li>
        </ol>
      </div>
    </div>
    <!-- Formulario -->
    <form method="post" autocomplete="on" id="frm" action="../config/ClassPropietario/classPropietario_Ins.php">
    <div class="row">
      <div class="col-md-4">
        <label for="email">No. Cedula:</label>
      </div>
      <div class="col-md-8">
        <input type="text" name="nuero_cedula" id="nuero_cedula" placeholder="No. Cedula" class="form-control" maxlength="10">
        <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Primer Nombre:</label>
      </div>
      <div class="col-md-8">
        <input type="text" name="primer_nombre" id="primer_nombre" placeholder="Primer Nombre" class="form-control" maxlength="60">
        <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Segundo Nombre:</label>
      </div>
      <div class="col-md-8">
        <input type="text" name="segundo_nombre" id="segundo_nombre" placeholder="Segundo Nombre" class="form-control" maxlength="20">
        <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Apellidos:</label>
      </div>
      <div class="col-md-8">
        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" class="form-control" maxlength="20">
        <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Dirección:</label>
      </div>
      <div class="col-md-8">
          <input type="text" name="direccion" id="direccion" placeholder="Dirección" class="form-control" maxlength="120">
          <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Telefono:</label>
      </div>
      <div class="col-md-8">
          <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control" maxlength="20">
          <span class="help-block" id="error"></span>
      </div>
      <div class="col-md-4">
        <label for="email">Ciudad</label>
      </div>
      <div class="col-md-8" >
        <input type="text" class="form-control" name="Ciudad" id="Ciudad" placeholder="Ciudad">
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
          nuero_cedula: { required: true, minlength: 3, maxlength: 10, number: true },
          primer_nombre: {required: true, minlength: 2 },
          segundo_nombre: {required: true, minlength: 2 },
          apellidos: { required: true, maxlength: 60},
          direccion: { required: true maxlength: 120},
          telefono: { required: true, minlength: 7, maxlength: 10 },
          Ciudad: { required: true},
        }
      })
    });
  </script>
</body>
</html>