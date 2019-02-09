<?php 
include '../../conexion/config.php';
require '../fpdf/fpdf.php';
	class PDF extends FPDF
	{
			
	}
	
$tipo_reporte=$_POST['tipo_reporte'];
$descripcion=$_POST['descripcion'];
$anio=$_POST['anio'];
if ($tipo_reporte=="anual") {
	if ($descripcion=="inscripcion") {
		$cabecera="Reporte anual por inscripción año: ".$anio;
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno where year(r.fecha_hora_pago)=$anio and r.tipo_pago='inscripcion' ORDER BY r.id_recibo ASC";		
	}
	else if ($descripcion=="mensualidad") {
		$cabecera="Reporte anual por mensualidad año: ".$anio;
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno where year(r.fecha_hora_pago)=$anio and (r.tipo_pago='enero' or r.tipo_pago='febrero' or r.tipo_pago='marzo' or r.tipo_pago='abril' or r.tipo_pago='mayo' or r.tipo_pago='junio' or r.tipo_pago='julio' or r.tipo_pago='agosto' or r.tipo_pago='septiembre' or r.tipo_pago='octubre' or r.tipo_pago='noviembre' or r.tipo_pago='diciembre') ORDER BY r.id_recibo ASC";			
	}
	else{
		$cabecera="Reporte anual por inscripción y mensualidad año: ".$anio;
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno where year(r.fecha_hora_pago)=$anio and (r.tipo_pago='enero' or r.tipo_pago='febrero' or r.tipo_pago='marzo' or r.tipo_pago='abril' or r.tipo_pago='mayo' or r.tipo_pago='junio' or r.tipo_pago='julio' or r.tipo_pago='agosto' or r.tipo_pago='septiembre' or r.tipo_pago='octubre' or r.tipo_pago='noviembre' or r.tipo_pago='diciembre' or r.tipo_pago='inscripcion' ) ORDER BY r.id_recibo ASC";

	}
}
else if ($tipo_reporte=="ciclo") {
	if ($descripcion=="inscripcion") {
		$cabecera="Reporte del ciclo: ".$anio." por inscripción";
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=r.id_asignacion_grado_seccion inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar= ag.id_anio_ciclo_escolar where ac.anio_ciclo_escolar=$anio and r.tipo_pago='inscripcion' ORDER BY r.id_recibo ASC ";		
	}
	else if ($descripcion=="mensualidad") {
		$cabecera="Reporte del ciclo: ".$anio." por mensualidad";
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=r.id_asignacion_grado_seccion inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar= ag.id_anio_ciclo_escolar where ac.anio_ciclo_escolar=$anio and (r.tipo_pago='enero' or r.tipo_pago='febrero' or r.tipo_pago='marzo' or r.tipo_pago='abril' or r.tipo_pago='mayo' or r.tipo_pago='junio' or r.tipo_pago='julio' or r.tipo_pago='agosto' or r.tipo_pago='septiembre' or r.tipo_pago='octubre' or r.tipo_pago='noviembre' or r.tipo_pago='diciembre') ORDER BY r.id_recibo ASC";			
	}
	else{
		$cabecera="Reporte del ciclo: ".$anio ." por inscripción y mensualidad";
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=r.id_asignacion_grado_seccion inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar= ag.id_anio_ciclo_escolar where ac.anio_ciclo_escolar=$anio and (r.tipo_pago='enero' or r.tipo_pago='febrero' or r.tipo_pago='marzo' or r.tipo_pago='abril' or r.tipo_pago='mayo' or r.tipo_pago='junio' or r.tipo_pago='julio' or r.tipo_pago='agosto' or r.tipo_pago='septiembre' or r.tipo_pago='octubre' or r.tipo_pago='noviembre' or r.tipo_pago='diciembre' or r.tipo_pago='inscripcion') ORDER BY r.id_recibo ASC";

	}	
	
}
else{
	if ($descripcion=="inscripcion") {
		$cabecera="Reporte del mes: ".$tipo_reporte." por inscripción año: ".$anio;
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno where year(r.fecha_hora_pago)=$anio and month(r.fecha_hora_pago)=$tipo_reporte and r.tipo_pago='inscripcion' ORDER BY r.id_recibo ASC";		
	}
	else if ($descripcion=="mensualidad") {
		$cabecera="Reporte del mes: ".$tipo_reporte." por mensualidad año: ".$anio;
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno where year(r.fecha_hora_pago)=$anio and month(r.fecha_hora_pago)=$tipo_reporte and  (r.tipo_pago='enero' or r.tipo_pago='febrero' or r.tipo_pago='marzo' or r.tipo_pago='abril' or r.tipo_pago='mayo' or r.tipo_pago='junio' or r.tipo_pago='julio' or r.tipo_pago='agosto' or r.tipo_pago='septiembre' or r.tipo_pago='octubre' or r.tipo_pago='noviembre' or r.tipo_pago='diciembre') ORDER BY r.id_recibo ASC";			
	}
	else{
		$cabecera="Reporte del mes: ".$tipo_reporte. "  por inscripción y mensualidad año: ".$anio;
		$sql = "SELECT * FROM recibo r inner join alumnos a on r.id_alumno=a.id_alumno where year(r.fecha_hora_pago)=$anio and month(r.fecha_hora_pago)=$tipo_reporte and (r.tipo_pago='enero' or r.tipo_pago='febrero' or r.tipo_pago='marzo' or r.tipo_pago='abril' or r.tipo_pago='mayo' or r.tipo_pago='junio' or r.tipo_pago='julio' or r.tipo_pago='agosto' or r.tipo_pago='septiembre' or r.tipo_pago='octubre' or r.tipo_pago='noviembre' or r.tipo_pago='diciembre' or r.tipo_pago='inscripcion' ) ORDER BY r.id_recibo ASC";

	}
}

	$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

	//$pdf->Image('../../img/PadLock.png', 10, 10, 40 );
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(150,25,0);
	
	$pdf->Ln(10);
	$pdf->Cell(25);
	$pdf->Cell(222,10, utf8_decode($cabecera),1,1,'C');


	$pdf->Ln(2);
	$pdf->Cell(25);
	$pdf->Cell(17,10,utf8_decode('Id recibo'),1,0,'C');
	$pdf->Cell(45,10,utf8_decode('Codigo recibo'),1,0,'C');
	$pdf->Cell(65,10,utf8_decode('Alumno'),1,0,'C');
	$pdf->Cell(30,10,utf8_decode('Tipo'),1,0,'C');
	$pdf->Cell(25,10,utf8_decode('Fecha de pago'),1,0,'C');
	$pdf->Cell(40,10,utf8_decode('Total'),1,1,'C');

	$result = $conexion->query($sql);
		$total=0;
		while($row = $result->fetch_assoc()) {
			$id_recibo = $row["id_recibo"] ;
			$codigo_recibo=$row["codigo_recibo"] ;
			$fecha_hora_pago=$row["fecha_hora_pago"] ;
			$tipo_pago=$row["tipo_pago"];
			$nombre_persona_q_paga=$row["nombre_persona_q_paga"];
			$nombres = $row["nombres"];
			$apellidos = $row["apellidos"];
			$subtotal= $row["total"];
			$hora= date( "d-m-Y", strtotime( $fecha_hora_pago ) );
			$total=$subtotal+$total;

			$pdf->Cell(25);
			$pdf->Cell(17,4,utf8_decode($id_recibo),1,0,'L');
			$pdf->Cell(45,4,utf8_decode($codigo_recibo),1,0,'L');
			$pdf->Cell(65,4,utf8_decode($nombres.' '.$apellidos),1,0,'L');
			$pdf->Cell(30,4,utf8_decode($tipo_pago),1,0,'L');
			$pdf->Cell(25,4,utf8_decode($hora),1,0,'L');
			$pdf->Cell(40,4,utf8_decode($subtotal),1,1,'C',false);
		} 
			$pdf->Cell(25);
			$pdf->Cell(182,4,utf8_decode("Total"),1,0,'C',false);
			$pdf->Cell(40,4,utf8_decode($total),1,1,'C',false);
	

	$pdf->Output();

?>