<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();

include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from
$id_grado=$_GET['id'];
$id_asignacion_grado_seccion = $_GET['id_asignacion_grado_seccion'];
$sql = "SELECT * FROM grado g INNER join asignacion_grado_seccion ag on g.id_grado=ag.id_grado  where ag.id_asignacion_grado_seccion='$id_asignacion_grado_seccion'";
$result = $conexion->query($sql);
while($row = $result->fetch_assoc()) {
	$jornada = $row["jornada"] ;
}  
if ($jornada=="Matutina") {
	header('Location: asignacion_horario_curso_matutino.php?id='.$id_grado."&id_asignacion_grado_seccion=".$id_asignacion_grado_seccion);
}
if ($jornada=="Vespertina") {
	header('Location: blank.php');
}
if ($jornada=="Sabado") {
	header('Location: blank.php');
}
?>