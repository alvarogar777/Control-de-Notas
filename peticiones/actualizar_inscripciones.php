<?php 
include '../conexion/config.php';
$resultado = $_POST['valorCaja1']; 
$rsult2="Inscripcion";
$sql = "select * from asignacion_grado_seccion ag inner join grado g on ag.id_grado=g.id_grado inner join tipo_pago tp on tp.categoria=g.categoria where id_asignacion_grado_seccion='$resultado' and tipo_pago='Inscripcion'";
$result= $conexion->query($sql); 
while($row = $result->fetch_assoc()) { 
          $resultado = $row["pago"];  
 } 

echo $resultado;
?>