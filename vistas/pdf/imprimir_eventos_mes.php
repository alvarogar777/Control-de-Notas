<?php 
include '../../conexion/config.php';
require '../fpdf/fpdf.php';
	class PDF extends FPDF
	{
			
	}

	
$anio=$_POST['anio'];
$mes=$_POST['mes']; 
     
switch($mes){
    case 1: $mes2="Enero"; break;
    case 2: $mes2="Febrero"; break;
    case 3: $mes2="Marzo"; break;
    case 4: $mes2="Abril"; break;
    case 5: $mes2="Mayo"; break;
    case 6: $mes2="Junio"; break;
    case 7: $mes2="Julio"; break;
    case 8: $mes2="Agosto"; break;
    case 9: $mes2="Septiembre"; break;
    case 10: $mes2="Octubre"; break;
    case 11: $mes2="Noviembre"; break;
    case 12: $mes2="Diciembre"; break;
}
     
    

$sql = "SELECT * FROM agenda where month(consulta)='$mes' and year(consulta)='$anio'";
$result_evento = $conexion->query($sql);
$pdf = new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();

		
	$cabecera="AÑO: ".$anio. " MES: ".$mes2;	
	//$pdf->Image('../../img/PadLock.png', 10, 10, 40 );
	$pdf->SetFont('Arial','B',10);
	$pdf->SetFillColor(150,25,0);
	
	$pdf->Ln(10);
	$pdf->Cell(10);
	$pdf->Cell(248,10, utf8_decode($cabecera),1,1,'C');
	$pdf->Cell(15);
	
	$pdf->Cell(10);

	$pdf->Ln(2);
	$pdf->Cell(10);
	$pdf->Cell(8,10,utf8_decode('Id'),1,0,'C');
	$pdf->Cell(50,10,utf8_decode('Titulo'),1,0,'C');
	$pdf->Cell(110,10,utf8_decode('Descripción'),1,0,'C');
	$pdf->Cell(40,10,utf8_decode('Inicio'),1,0,'C');
	$pdf->Cell(40,10,utf8_decode('Final'),1,1,'C');


	$contador=1;

while($row = $result_evento->fetch_assoc()) {

	
	$nombres=$row["title"];
	$body=$row["body"];
	$inicio=$row["inicio_normal"];
	$final=$row["final_normal"];
	

	$pdf->Cell(10);
	$pdf->Cell(8,6,utf8_decode($contador),1,0,'L');
	$pdf->Cell(50,6,utf8_decode($nombres),1,0,'L');	
	$pdf->Cell(110,6,utf8_decode($body),1,0,'C');
	$pdf->Cell(40,6,utf8_decode($inicio),1,0,'C');
	$pdf->Cell(40,6,utf8_decode($final),1,1,'C');
	
	



	$contador++;

}

$pdf->Output();
?>