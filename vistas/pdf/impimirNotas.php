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

$sql_alumno = "SELECT * FROM notas_alumno na inner join alumnos al on al.id_alumno=na.id_alumno inner join pensum pe on pe.id_pensum = na.id_pensum where na.id_asignacion_grado_seccion='$id_asignacion_grado_seccion' ORDER BY na.id_alumno ASC  ";
$result_alumno = $conexion->query($sql_alumno);
$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$id_alumno_compar=0;
	$pagina_siguiente=0;
while($row = $result_alumno->fetch_assoc()) {

	

	
	$id_alumno=$row["nombres"];
	$id_alumno=$row["id_alumno"];
	$nombre_materia=$row["nombre_materia"];
	$unidad1=$row["unidad1"];
	$unidad2=$row["unidad2"];
	$unidad3=$row["unidad3"];
	$unidad4=$row["unidad4"];
	$promedio=intval($row["promedio"]);
	intval($row["promedio"]); 
	
	if ($id_alumno_compar!=$id_alumno) {
		if ($pagina_siguiente==2) {
			$pdf->addPage();
			$pagina_siguiente=0;
		}
		$cabecera2="Boleta de calificaciones de: ".$row["nombres"]." ".$row["apellidos"];
		$cabecera="Grado: ".$nombre_grado." Sección: ".$seccion." Jornada: ".$jornada." Ciclo: ".$anio_ciclo_escolar;
		$pdf->SetFillColor(150,25,0);
		$pdf->SetFont('Arial','B',12);
		//$pdf->Cell(160,0, $pdf->Image('../../img/logo.jpg'),1,1,'C');
		$pdf->Cell(15);

		$pdf->Cell(200,6,utf8_decode(' '),2,1,'C');

		$pdf->Cell(15);
		//$pdf->Cell(160,10, utf8_decode($cabecera),1,1,'C');
		$pdf->Cell(160,35, $pdf->Image('../../img/logo.jpg', $pdf->GetX()+30, $pdf->GetY(),110),1,1);
		//$pdf->Cell(160,60, $pdf->Image('../../img/logo.jpg'),1,1,'C');
		$pdf->Cell(15);
		
		$pdf->Cell(160,10, utf8_decode($cabecera),1,1,'C');
		
		$pdf->Cell(15);
		$pdf->Cell(160,10, utf8_decode($cabecera2),1,1,'C');
		$pdf->Cell(15);
		$pdf->Cell(60,6,utf8_decode('Nombre Materia'),1,0,'C');
		$pdf->Cell(20,6,utf8_decode('unidad 1'),1,0,'C');
		$pdf->Cell(20,6,utf8_decode('unidad 2'),1,0,'C');
		$pdf->Cell(20,6,utf8_decode('unidad 3'),1,0,'C');
		$pdf->Cell(20,6,utf8_decode('unidad 4'),1,0,'C');
		$pdf->Cell(20,6,utf8_decode('promedio'),1,1,'C');
		$id_alumno_compar=$id_alumno;
		$pagina_siguiente++;
	}
	

	
	$pdf->Cell(15);
	$pdf->Cell(60,6,utf8_decode($nombre_materia),1,0,'C',false);
	if ($unidad1>0 and $unidad1<60) {
		$pdf->Cell(20,6,utf8_decode($unidad1),1,0,'C',true);
	}
	else{ $pdf->Cell(20,6,utf8_decode($unidad1),1,0,'C',false);  }

	if ($unidad2>0 and $unidad2<60) {
		$pdf->Cell(20,6,utf8_decode($unidad2),1,0,'C',true);
	}
	else{ $pdf->Cell(20,6,utf8_decode($unidad2),1,0,'C',false);  }

	if ($unidad3>0 and $unidad3<60) {
		$pdf->Cell(20,6,utf8_decode($unidad3),1,0,'C',true);
	}
	else{ $pdf->Cell(20,6,utf8_decode($unidad3),1,0,'C',false);  }

	if ($unidad4>0 and $unidad4<60) {
		$pdf->Cell(20,6,utf8_decode($unidad4),1,0,'C',true);
	}
	else{ $pdf->Cell(20,6,utf8_decode($unidad4),1,0,'C',false);  }

	if ($promedio>0 and $promedio<60) {
		$pdf->Cell(20,6,utf8_decode($promedio),1,1,'C',true);
	}
	else{ $pdf->Cell(20,6,utf8_decode($promedio),1,1,'C',false);  }
	







}

$pdf->Output();
?>