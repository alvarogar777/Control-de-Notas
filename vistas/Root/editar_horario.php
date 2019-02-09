<?php 
include '../../conexion/config.php';
$horario=$_POST['horario'];



foreach ($horario as &$valor) {
$claves = preg_split("/[\s,]+/", $valor);
echo $claves[0]." ".$claves[1];
$id_horario=$claves[0];
$id_pensum=$claves[1];
 $sql = "UPDATE horario SET id_pensum='$id_pensum' where id_horario='$id_horario'";
        if ($conexion->query($sql) === TRUE) {
            echo "Actualizado"."<br>";
        } else {
            echo "Error: " . $conexion->error;
        }
}

?>