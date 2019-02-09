<?php

	require '../../conexion/config.php';
	require '../fpdf/fpdf.php';
	$id=$_GET["id_ciclo"];
	$mes=$_GET["mes"];
	class PDF extends FPDF
	{
		function Header()
		{
			//$this->Image('images/logo.png', 5, 5, 30 );
			$this->Image('../../img/logo.jpg', 60, 15, 80 );
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'RECIBO DE MENSUALIDADES',0,1,'C');
			//$this->Cell(180,10, utf8_decode('Colegio la sagrada enseñanza'),0,0,'C');
			$this->Ln(20);
		}
		
		function Footer()
		{
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			//$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
	$query = "SELECT * FROM recibo r inner join alumnos a on a.id_alumno = r.id_alumno inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=r.id_asignacion_grado_seccion where r.id_asignacion_grado_seccion = '$id' and r.tipo_pago='$mes' ";
	$resultado = $conexion->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(80,6,utf8_decode('Titulo'),2,0,'C',1);
	
	$pdf->Cell(80,6,utf8_decode('Descripción'),2,1,'C',1);
	
	$pdf->SetFont('Arial','',12);
	
	while($row = $resultado->fetch_assoc())
	{
		$id_recibo=$row['id_recibo'];
		$codigo_recibo=$row['codigo_recibo'];
		$nombre_pago="Pago del mes: ".$mes;
		$fecha_pago=date("d/m/Y", strtotime($row["fecha_hora_pago"]));
		$hora_pago=date("G:i:s", strtotime($row["fecha_hora_pago"]));
		$nombres=$row["nombres"];
		$apellidos=$row["apellidos"];
		$nombre_persona_q_paga=$row["nombre_persona_q_paga"];
		$pago=$row["total"];;
		$id_asignacion_grado_seccion=$row["id_asignacion_grado_seccion"];
	}

$sql = "SELECT g.nombre as nombre_grado, seccion, p.nombres as nombre_profesor, p.apellidos as apellido_profesor, ag.id_asignacion_grado_seccion,jornada, g.id_grado, ac.anio_ciclo_escolar, g.categoria from asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ag.id_anio_ciclo_escolar=ac.id_anio_ciclo_escolar inner join profesores p on p.dpi_profesor=ag.id_profesores inner join grado g on g.id_grado = ag.id_grado where id_asignacion_grado_seccion=$id ";
$result= $conexion->query($sql); 
while($row = $result->fetch_assoc()) { 
      $resultado= "Año: ". $row["anio_ciclo_escolar"]." Grado: ".$row["nombre_grado"]." sección: ".$row["seccion"]." Jornada: ".$row["jornada"]; 
 } 

	$pdf->Cell(80,6,utf8_decode("Id recibo"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode($id_recibo),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Codigo Recibo"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode($codigo_recibo),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Nombre de Pago"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode($nombre_pago),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Fecha del pago"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode($fecha_pago),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Hora del pago"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode($hora_pago),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Nombre del Alumno"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode($nombres." ".$apellidos),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Grado"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode($resultado),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("A nombre de"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode($nombre_persona_q_paga),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Total"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode("Q".$pago),2,1,'C');

	$pdf->Cell(80,6,utf8_decode(" "),2,0,'C');
	$pdf->Cell(80,6,utf8_decode(" "),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Firma"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode("_____________"),2,1,'C');

	$pdf->Cell(80,6,utf8_decode(" "),2,0,'C');
	$pdf->Cell(80,6,utf8_decode(" "),2,1,'C');

	$pdf->Cell(80,6,utf8_decode("Sello"),2,0,'C');
	$pdf->Cell(80,6,utf8_decode("_____________"),2,1,'C');


	$pdf->Output();
?>