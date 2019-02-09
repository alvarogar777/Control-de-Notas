<?php 

include '../../conexion/config.php';
$nota1=$_POST["nota1"];
$nota2=$_POST["nota2"];
$nota3=$_POST["nota3"];
$nota4=$_POST["nota4"];
$id_alumo=$_POST["id_alum"];
$id_notas_alumno=$_POST["id_notas_alumno"];
$id_asignacion_grado_seccion=$_POST["id_asignacion_grado_seccion"];
$id_pensum=$_POST["id_pensum"];
$contador=0;
foreach ($id_notas_alumno as $key => $value) {
 	$unidad1=$nota1[$contador];
 	$unidad2=$nota2[$contador];
 	$unidad3=$nota3[$contador];
 	$unidad4= $nota4[$contador];
	echo $id_alumno=$id_alumo[$contador];
 	echo $id_notas_alumno=$value;
 	$contador++;

 	$promedio = ($unidad1+$unidad2+$unidad3+$unidad4)/4;
 	$sql = "UPDATE notas_alumno SET unidad1='$unidad1', unidad2='$unidad2', unidad3='$unidad3', unidad4='$unidad4', promedio='$promedio' where id_notas_alumno='$id_notas_alumno'";
        if ($conexion->query($sql) === TRUE) {
            echo "Actualizado";
          
            
        } else {
            echo "Error: " . $conexion->error;
        }
}
$url = "ingreso_notas_alumno.php?id=".$id_asignacion_grado_seccion."&id_pensum=".$id_pensum."&correcto=true";
		header('Location: '.$url);
?>