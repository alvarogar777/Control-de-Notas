<?php 
include '../../conexion/config.php';
require '../fpdf/fpdf.php';
	class PDF extends FPDF
	{
			
	}

	
$id_asignacion_grado_seccion=$_POST['ciclo'];
$mes=$_POST['mes'];


$sql = "SELECT * FROM asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar=ag.id_anio_ciclo_escolar inner join grado g on g.id_grado = ag.id_grado  where ag.id_asignacion_grado_seccion='$id_asignacion_grado_seccion'";
$result = $conexion->query($sql);
while($row = $result->fetch_assoc()) {
 $anio_ciclo_escolar = $row["anio_ciclo_escolar"] ;
 $nombre_grado=$row["nombre"] ;
 $seccion=$row["seccion"] ;
 $jornada=$row["jornada"];
} 

$sql_alumno = "SELECT a.nombres, a.apellidos, m.$mes as mes FROM mensuallidades m inner join alumnos a on a.id_alumno = m.id_alumno where m.id_asignacion_grado_seccion='$id_asignacion_grado_seccion' ";
$result_alumno = $conexion->query($sql_alumno);
$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

		
	$cabecera="AÑO: ".$anio_ciclo_escolar." Grado: ".$nombre_grado." Seccion: ".$seccion." Jornada: ".$jornada;	
	//$pdf->Image('../../img/PadLock.png', 10, 10, 40 );
	$pdf->SetFont('Arial','B',12);
	$pdf->SetFillColor(150,25,0);
	
	$pdf->Ln(12);
	$pdf->Cell(15);
	$pdf->Cell(155,10, utf8_decode($cabecera),1,1,'C');
	$pdf->Cell(15);
	$pdf->Cell(155,12, utf8_decode('Mes: '.$mes),1,1,'C');
	$pdf->Cell(15);

	$pdf->Ln(2);
	$pdf->Cell(15);
	$pdf->Cell(15,10,utf8_decode('Id'),1,0,'C');
	$pdf->Cell(85,10,utf8_decode('Nombres y apellidos'),1,0,'C');
	$pdf->Cell(55,10,utf8_decode('Estado'),1,1,'C');
	


	$contador=1;

while($row = $result_alumno->fetch_assoc()) {

	
	$nombres=$row["nombres"];
	$apellidos=$row["apellidos"];
	$mes1=$row["mes"];
	

	$pdf->Cell(15);
	$pdf->Cell(15,6,utf8_decode($contador),1,0,'L');
	$pdf->Cell(85,6,utf8_decode($nombres.' '.$apellidos),1,0,'L');
	if ($mes1=="pagado") {
		$pdf->Cell(55,6,utf8_decode($mes1),1,1,'C',false);
	}
	else{
		$pdf->Cell(55,6,utf8_decode('Insolvente'),1,1,'C',true);
	}
	



	$contador++;

}

$pdf->Output();
?>