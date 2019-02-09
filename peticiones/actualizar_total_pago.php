<?php 
include '../conexion/config.php';
$resultado = $_POST['valorCaja1']; 

$sql = "select * from tipo_pago where id_tipo_pago='$resultado'";
$result= $conexion->query($sql); 
while($row = $result->fetch_assoc()) { 
          $resultado = $row["pago"];  
 } 

echo $resultado;
?>