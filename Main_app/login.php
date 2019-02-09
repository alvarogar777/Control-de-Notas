<?php


function isXmlHttpRequest()
{
    $header = isset($_SERVER['HTTP_X_REQUESTED_WITH']) ? $_SERVER['HTTP_X_REQUESTED_WITH'] : null;
    return ($header === 'XMLHttpRequest');
}

if (isXmlHttpRequest()) {
	require('../conexion/config.php');
	sleep(1);
	session_start();


	$conexion->set_charset("utf8");


	$usuario = $conexion->real_escape_string($_POST['usuariolg']);
	$pass = $conexion->real_escape_string($_POST['passlg']);
	$pass = md5($pass);

	if ($nueva_consulta= $conexion->prepare("SELECT nombres,tipo From usuarios Where usuario= ? AND password= ? ")) {
	
		$nueva_consulta->bind_param('ss', $usuario, $pass);
		$nueva_consulta->execute();
		$resultado = $nueva_consulta->get_result();

		if ($resultado->num_rows==1) {
			$datos=$resultado->fetch_assoc();
			echo json_encode(array('error'=>false,'tipo'=>$datos['tipo']));
			$_SESSION['usuario'] = $datos; 
		}
		else{
			echo json_encode(array('error'=>true)); 
		}
		$nueva_consulta->close();
	}
}

else{

	echo json_encode(array('error'=>true)); 
}




$conexion->close();
 ?>
