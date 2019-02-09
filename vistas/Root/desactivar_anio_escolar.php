<?php 
include '../../conexion/config.php';
$id_ciclo_escolar=$_GET['id'];
$sql = "SELECT * FROM anio_ciclo_escolar a where a.id_anio_ciclo_escolar='$id_ciclo_escolar'";
$result = $conexion->query($sql); 
while($row = $result->fetch_assoc()) {
	$estado=$row["estado_ciclo_escolar"];
}

if ($estado=="Activo") {
	$estado="Inactivo";
}
else{
	$estado="Activo";
}
       $sql = "UPDATE anio_ciclo_escolar SET estado_ciclo_escolar='$estado' where id_anio_ciclo_escolar='$id_ciclo_escolar'";
        if ($conexion->query($sql) === TRUE) {
            echo "Actualizado";
        } else {
            echo "Error: " . $conexion->error;
        }

header('Location: asignacion_ciclo_escolar.php');
exit();
?>