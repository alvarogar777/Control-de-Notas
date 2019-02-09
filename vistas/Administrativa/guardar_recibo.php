<?php  
include '../../conexion/config.php';
if (isset($_POST['id_alumno'])) {
		
echo $id_alumno=$_POST['id_alumno'];
echo $nombre_alumno=$_POST['nombre_alumno'];
echo $ciclo=$_POST['ciclo'];
echo $persona_paga=$_POST['persona_paga'];
echo $pase=$_POST['pase'];
echo $total=$_POST['total'];
$sql = "SELECT * FROM usuarios where tipo='Admin'";
$result_pase= $conexion->query($sql); 
while($row = $result_pase->fetch_assoc()) { 
          $pase_encr = $row["password"];  
 } 
$sql = "select * from asignacion_grado_seccion ag inner join grado g on ag.id_grado=g.id_grado  where id_asignacion_grado_seccion='$ciclo'";
$result= $conexion->query($sql); 
while($row = $result->fetch_assoc()) { 
          $id_tipo_pago = $row["id_tipo_pago"];  
 } 
$hoy = getdate();
echo "<br>";
echo $dia_hora = $hoy['year']."-".$hoy['mon']."-".$hoy['mday']." ".$hoy['hours'].":".$hoy['minutes'].":".$hoy['seconds'];
function generarCodigo($longitud) {
	 $key = '';
	 $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
	 $max = strlen($pattern)-1;
	 for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
	 return $key;
}
  
echo $codigo_unico_recibo= generarCodigo(20); 
$str = $pase;
echo md5($str);
if (md5($str) == $pase_encr)
  {
  $query="INSERT INTO recibo (fecha_hora_pago, tipo_pago , id_alumno, id_asignacion_grado_seccion, nombre_persona_q_paga, codigo_recibo, total) VALUES('$dia_hora', 'Inscripcion' ,'$id_alumno','$ciclo','$persona_paga','$codigo_unico_recibo','$total')";
	        if ($conexion->query($query) === TRUE) {
			    echo "Ingresado Correctamente";
			    echo'<script> swal("Inscripcion Ingresada Correctamente") </script';
			    $url = "asignacion_inscripcion.php?id=".$id_alumno;
				header('Location: '.$url);
			} else {
			    echo "Error: " . $query . "<br>" . $conexion->error;
			}	

  $query="INSERT INTO mensuallidades (id_alumno, id_asignacion_grado_seccion) VALUES('$id_alumno','$ciclo')";
	        if ($conexion->query($query) === TRUE) {
			    echo "Ingresado Correctamente";
			    echo'<script> swal("Inscripcion Ingresada Correctamente") </script';
			    $url = "asignacion_inscripcion.php?id=".$id_alumno;
				header('Location: '.$url);
			} else {
			    echo "Error: " . $query . "<br>" . $conexion->error;
			}
  }
else{
	

	echo'<script> swal("Error ") </script';
	$url = "asignacion_inscripcion.php?id=".$id_alumno."&err="."5";
	header('Location: '.$url);
die();

	
}
	}	




?>
<?php  
$str = "dst7h2ns9f";



?>

