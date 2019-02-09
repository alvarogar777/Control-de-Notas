<?php 
include '../../conexion/config.php';
require '../fpdf/fpdf.php';
	class PDF extends FPDF
	{
			
	}

	
	
$id_asignacion_grado_seccion = $_GET['id'];
$sql = "SELECT * FROM asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar=ag.id_anio_ciclo_escolar inner join grado g on g.id_grado = ag.id_grado  where ag.id_asignacion_grado_seccion='$id_asignacion_grado_seccion'";
$result = $conexion->query($sql);
while($row = $result->fetch_assoc()) {
 $anio_ciclo_escolar = $row["anio_ciclo_escolar"] ;
 $nombre_grado=$row["nombre"] ;
 $seccion=$row["seccion"] ;
 $jornada=$row["jornada"];
} 

$sql_alumno = "SELECT * from recibo r inner join alumnos a on r.id_alumno=a.id_alumno inner join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion = r.id_asignacion_grado_seccion inner join grado g on g.id_grado = ag.id_grado inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar= ag.id_anio_ciclo_escolar where r.id_asignacion_grado_seccion='$id_asignacion_grado_seccion' and r.tipo_pago ='Inscripcion' ";
$result_alumno = $conexion->query($sql_alumno);
$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

		
	$cabecera="Grado: ".$nombre_grado." Sección: ".$seccion." Jornada: ".$jornada." Ciclo: ".$anio_ciclo_escolar;	
	//$this->Image('images/logo.png', 5, 5, 30 );
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(12);
	$pdf->Cell(255,10, utf8_decode($cabecera),1,1,'C');
	$pdf->Cell(12);
	$pdf->Cell(255,10, utf8_decode('Materia: '),1,1,'L');
	$pdf->Ln(2);
	$pdf->Cell(12);
	$pdf->Cell(10,30,utf8_decode('Id'),1,0,'C');
	$pdf->Cell(75,30,utf8_decode('Nombres y apellidos'),1,0,'C');
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,30,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,30,utf8_decode(''),1,1,'C');	

	$contador=1;

while($row = $result_alumno->fetch_assoc()) {

	$id_alumno=$row["id_alumno"];
	$nombres=$row["nombres"];
	$apellidos=$row["apellidos"];

	$pdf->Cell(12);
	$pdf->Cell(10,6,utf8_decode($contador),1,0,'C');
	$pdf->Cell(75,6,utf8_decode($nombres.' '.$apellidos),1,0,'L');
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');	
	$pdf->Cell(10,6,utf8_decode(''),1,0,'C');
	$pdf->Cell(10,6,utf8_decode(''),1,1,'C');

	$contador++;

}

$pdf->Output();
?>