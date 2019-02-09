<?php 
include '../../conexion/config.php';
require '../fpdf/fpdf.php';
	class PDF extends FPDF
	{
			
	}

	
$id_anio=$_GET['id'];
$id_profesor=$_GET['id_profesor'];


$sql = "SELECT * FROM anio_ciclo_escolar an where an.id_anio_ciclo_escolar='$id_anio'";
$result = $conexion->query($sql);
while($row = $result->fetch_assoc()) {
 $anio_ciclo_escolar = $row["anio_ciclo_escolar"] ;
} 

$sql_alumno = "SELECT * from asignacion_maestro_seccion am inner join asignacion_grado_seccion ag on am.id_asignacion_grado_seccion = ag.id_asignacion_grado_seccion inner join profesores p on p.dpi_profesor = am.id_profesor inner join pensum pe on pe.id_pensum = am.id_pensum inner join grado g on g.id_grado = ag.id_grado where ag.id_anio_ciclo_escolar='$id_anio' and p.dpi_profesor='$id_profesor' ORDER BY `am`.`id_asignacion_grado_seccion` ASC ";
$result_alumno = $conexion->query($sql_alumno);
$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

		
	$cabecera="AÑO: ".$anio_ciclo_escolar;	
	//$this->Image('images/logo.png', 5, 5, 30 );
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(12);
	$pdf->Cell(255,10, utf8_decode($cabecera),1,1,'C');
	$pdf->Cell(12);

	$pdf->Ln(2);
	$pdf->Cell(12);
	$pdf->Cell(10,10,utf8_decode('Id'),1,0,'C');
	$pdf->Cell(75,10,utf8_decode('Nombres y apellidos'),1,0,'C');
	$pdf->Cell(65,10,utf8_decode('Grado'),1,0,'C');
	$pdf->Cell(35,10,utf8_decode('Jornada'),1,0,'C');	
	$pdf->Cell(15,10,utf8_decode('Seccion'),1,0,'C');
	$pdf->Cell(55,10,utf8_decode('Materia'),1,1,'C');


	$contador=1;

while($row = $result_alumno->fetch_assoc()) {

	$id_profesor=$row["dpi_profesor"];
	$nombres=$row["nombres"];
	$apellidos=$row["apellidos"];
	$nombre=$row["nombre"];
	$jornada=$row["jornada"];
	$seccion=$row["seccion"];
	$materia=$row["nombre_materia"];

	$pdf->Cell(12);
	$pdf->Cell(10,6,utf8_decode($id_profesor),1,0,'C');
	$pdf->Cell(75,6,utf8_decode($nombres.' '.$apellidos),1,0,'L');
	$pdf->Cell(65,6,utf8_decode($nombre),1,0,'C');
	$pdf->Cell(35,6,utf8_decode($jornada),1,0,'C');	
	$pdf->Cell(15,6,utf8_decode($seccion),1,0,'C');
	$pdf->Cell(55,6,utf8_decode($materia),1,1,'C');


	$contador++;

}

$pdf->Output();
?>