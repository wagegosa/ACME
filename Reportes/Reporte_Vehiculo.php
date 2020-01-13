<?php
require "../config/conexion.php";
$R=$_GET['Reporte'];//5;

switch ($R) {
		case '1':
			//Para generar reporte de los vehiculos.
			require '../Plantillas/plantilla_Vehiculo.php';
			include "../config/ClassVehiculo/classVehiculo_sel.php";
			$Vehiculos   = new Vehiculos();
			$Lista = $Vehiculos->listarVehiculos();

			$pdf= new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage();

			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(7,6,'No.',1,0,'C',1);
			$pdf->Cell(15,6,'Placa',1,0,'C',1);
			$pdf->Cell(25,6,'Tipo vehiculo',1,0,'C',1);
			$pdf->Cell(60,6,'Conductor',1,0,'C',1);
			$pdf->Cell(60,6,'Propietario',1,1,'C',1);

			$pdf->SetFont('Arial', 'i', '7');
			foreach($Lista as $libro):
				$pdf->Cell(7,6,utf8_decode($libro->idtbl_vehiculos),1,0,'C');
				$pdf->Cell(15,6,$libro->placa,1,0,'C');
				$pdf->Cell(25,6,utf8_decode($libro->tipo_vehiculo),1,0,'C');
				$pdf->Cell(60,6,$libro->conductor,1,0,'C');
				$pdf->Cell(60,6,utf8_decode($libro->propietario),1,1,'C');
			endforeach;
			$pdf->Output();
			break;

		case '2':
			//Para generar reporte de los conductores
			require "../Plantillas/plantilla_Conductor.php";
			include "../config/ClassConductor/classCondutor_sel.php";
			$Cond = new Conductor();
			$Lista = $Cond->listarConductor();

			$pdf= new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage();

			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(7,6,'No.',1,0,'C',1);
			$pdf->Cell(20,6,'No cedula',1,0,'C',1);
			$pdf->Cell(60,6,'Nombre',1,0,'C',1);
			$pdf->Cell(50,6,'direccion',1,0,'C',1);
			$pdf->Cell(20,6,'telefono',1,0,'C',1);
			$pdf->Cell(15,6,'Ciudad',1,1,'C',1);

			$pdf->SetFont('Arial', 'i', '7');
			foreach($Lista as $libro):
				$pdf->Cell(7,6,utf8_decode($libro->idtbl_conductor),1,0,'C');
				$pdf->Cell(20,6,$libro->nuero_cedula,1,0,'C');
				$pdf->Cell(60,6,utf8_decode($libro->primer_nombre." ".$libro->apellidos),1,0,'C');
				$pdf->Cell(50,6,$libro->direccion,1,0,'C');
				$pdf->Cell(20,6,$libro->telefono,1,0,'C');
				$pdf->Cell(15,6,utf8_decode($libro->Ciudad),1,1,'C');
			endforeach;
			$pdf->Output();
			break;

		default:
			//Para generar reporte de los propietarios
			require "../Plantillas/plantilla_Propietario.php";
			include "../config/ClassPropietario/classPropietario_sel.php";
			$Cond = new Propietario();
			$Lista = $Cond->listarPropietario();

			$pdf= new PDF();
			$pdf->AliasNbPages();
			$pdf->AddPage();

			$pdf->SetFillColor(232,232,232);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(7,6,'No.',1,0,'C',1);
			$pdf->Cell(20,6,'No cedula',1,0,'C',1);
			$pdf->Cell(60,6,'Nombre',1,0,'C',1);
			$pdf->Cell(50,6,'direccion',1,0,'C',1);
			$pdf->Cell(20,6,'telefono',1,0,'C',1);
			$pdf->Cell(15,6,'Ciudad',1,1,'C',1);

			$pdf->SetFont('Arial', 'i', '7');
			foreach($Lista as $libro):
				$pdf->Cell(7,6,utf8_decode($libro->idtbl_propietario),1,0,'C');
				$pdf->Cell(20,6,$libro->nuero_cedula,1,0,'C');
				$pdf->Cell(60,6,utf8_decode($libro->primer_nombre." ".$libro->apellidos),1,0,'C');
				$pdf->Cell(50,6,$libro->direccion,1,0,'C');
				$pdf->Cell(20,6,$libro->telefono,1,0,'C');
				$pdf->Cell(15,6,utf8_decode($libro->Ciudad),1,1,'C');
			endforeach;
			$pdf->Output();
			break;
}
?>