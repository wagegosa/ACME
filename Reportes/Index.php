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
  <title>Reportes</title>
  <script src="../assets/js/angular.min.js"></script>
</head>

<body>
  <div class="container">
  	<?php 	include "../Plantillas/plantilla_Menu.php"; ?>
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-header"><span class="glyphicons glyphicons-group"></span> Reportes</h3>
        <ol class="breadcrumb">
          <li><a href="#">Inicio</a></li>
          <li><a href="">Informes</a></li>
          <li class="active">Reportes</li>
        </ol>
      </div>
    </div>
    <div class="row">
      <form action="Reporte_Vehiculo.php?Reporte=" method="get">
	    	<div class="col-md-12"><br>	
		    	<div class="col-md-2">
		        <label for="email">Vehiculo.</label>
		      </div>
		      <div class="col-md-4">
		      	<input type="hidden" name="Reporte" value="1">
		        <button type="submit" class="btn btn-primary" value="1"><span class="glyphicon glyphicon-import"></span> Descargar</a></button>
		      </div>
		    </div>
      </form>
      <form action="Reporte_Vehiculo.php?Reporte=" method="get">
		    <div class="col-md-12"><br>	
		    	<div class="col-md-2">
		        <label for="email">Conductores.</label>
		      </div>
		      <div class="col-md-4">
		      	<input type="hidden" name="Reporte" value="2">
		        <button type="submit" class="btn btn-primary" value="2"><span class="glyphicon glyphicon-import"></span> Descargar</a></button>
		      </div>
		    </div>
      </form>
      <form action="Reporte_Vehiculo.php?Reporte=" method="get">
		    <div class="col-md-12"><br>	
		    	<div class="col-md-2">
		        <label for="email">Propietarios.</label>
		      </div>
		      <div class="col-md-4">
		      	<input type="hidden" name="Reporte" value="3">
		        <button type="submit" class="btn btn-primary" value="2"><span class="glyphicon glyphicon-import"></span> Descargar</a></button>
		      </div>
		    </div>
		  </form>
    </div>

    <script src="../assets/js/plugins/jquery/jquery-3.2.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/footable/js/footable.min.js"></script>
    <script src="../assets/footable/js/configTable.js"></script>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, j, visible;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    visible = false;
    /* Obtenemos todas las celdas de la fila, no sólo la primera */
    td = tr[i].getElementsByTagName("td");
    for (j = 0; j < td.length; j++) {
      if (td[j] && td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
        visible = true;
      }
    }
    if (visible === true) {
      tr[i].style.display = "";
    } else {
      tr[i].style.display = "none";
    }
  }
}
</script>

</body>

</html>