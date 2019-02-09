<?php 
include '../../conexion/config.php';
$horario=$_POST['horario'];
$id_grado=$_POST['id_grado'];
$id_asignacion_grado_seccion = $_POST['id_asignacion_grado_seccion'];
echo $id_grado." ".$id_asignacion_grado_seccion."<br>";
$e=0;
$minutoAnadir=45;
$nuevaHora_lunes="07:00";
$nuevaHora_martes="07:00";
$nuevaHora_miercoles="07:00";
$nuevaHora_jueves="07:00";
$nuevaHora_viernes="07:00";
foreach ($horario as &$valor) {
	if ($e==0) {
		$horaInicial_lunes=$nuevaHora_lunes;		
		$segundos_horaInicial=strtotime($horaInicial_lunes);
		$segundos_minutoAnadir=$minutoAnadir*60;
		$nuevaHora_lunes=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
		echo "Lunes".$valor." ".$horaInicial_lunes." ".$nuevaHora_lunes."<br>";
		$e++;
		$query="INSERT INTO horario (id_grado,id_asignacion_grado_seccion,hora_inicio,hora_fin,numero_dia,dia,id_pensum) VALUES('$id_grado','$id_asignacion_grado_seccion','$horaInicial_lunes','$nuevaHora_lunes',1,'Lunes','$valor')";
        if ($conexion->query($query) === TRUE) {
            echo "Ingresado Correctamente";
            echo'<script> swal("Grado y sección Ingresado Correctamente") </script';
        } else {
            echo "Error: " . $query . "<br>" . $conexion->error;
        } 
	}
	else{
		if ($e==1) {
			$horaInicial_martes=$nuevaHora_martes;		
			$segundos_horaInicial=strtotime($horaInicial_martes);
			$segundos_minutoAnadir=$minutoAnadir*60;
			$nuevaHora_martes=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
			echo "Martes".$valor." ".$horaInicial_martes." ".$nuevaHora_martes."<br>";
			$e++;
			$query="INSERT INTO horario (id_grado,id_asignacion_grado_seccion,hora_inicio,hora_fin,numero_dia,dia,id_pensum) VALUES('$id_grado','$id_asignacion_grado_seccion','$horaInicial_martes','$nuevaHora_martes',2,'Martes','$valor')";
        	if ($conexion->query($query) === TRUE) {
            	echo "Ingresado Correctamente";
            	echo'<script> swal("Grado y sección Ingresado Correctamente") </script';
       		 } else {
            	echo "Error: " . $query . "<br>" . $conexion->error;
        	} 
		}
		else{
			if ($e==2) {
				$horaInicial_miercoles=$nuevaHora_miercoles;		
				$segundos_horaInicial=strtotime($horaInicial_miercoles);
				$segundos_minutoAnadir=$minutoAnadir*60;
				$nuevaHora_miercoles=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
				echo "Miercoles".$valor." ".$horaInicial_miercoles." ".$nuevaHora_miercoles."<br>";
				$e++;
				$query="INSERT INTO horario (id_grado,id_asignacion_grado_seccion,hora_inicio,hora_fin,numero_dia,dia,id_pensum) VALUES('$id_grado','$id_asignacion_grado_seccion','$horaInicial_miercoles','$nuevaHora_miercoles',3,'Miercoles','$valor')";
        		if ($conexion->query($query) === TRUE) {
           		 	echo "Ingresado Correctamente";
            		echo'<script> swal("Grado y sección Ingresado Correctamente") </script';
        		} else {
            		echo "Error: " . $query . "<br>" . $conexion->error;
        		} 
			}
			else{
				if ($e==3) {
					$horaInicial_jueves=$nuevaHora_jueves;		
					$segundos_horaInicial=strtotime($horaInicial_jueves);
					$segundos_minutoAnadir=$minutoAnadir*60;
					$nuevaHora_jueves=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
					echo "Jueves".$valor." ".$horaInicial_jueves." ".$nuevaHora_jueves."<br>";
					$e++;
					$query="INSERT INTO horario (id_grado,id_asignacion_grado_seccion,hora_inicio,hora_fin,numero_dia,dia,id_pensum) VALUES('$id_grado','$id_asignacion_grado_seccion','$horaInicial_jueves','$nuevaHora_jueves',4,'Jueves','$valor')";
        			if ($conexion->query($query) === TRUE) {
           		 		echo "Ingresado Correctamente";
            			echo'<script> swal("Grado y sección Ingresado Correctamente") </script';
        			} else {
            			echo "Error: " . $query . "<br>" . $conexion->error;
        			} 
				}
				else{
					if ($e==4) {
						$horaInicial_viernes=$nuevaHora_viernes;		
						$segundos_horaInicial=strtotime($horaInicial_viernes);
						$segundos_minutoAnadir=$minutoAnadir*60;
						$nuevaHora_viernes=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
						echo "Viernes".$valor." ".$horaInicial_viernes." ".$nuevaHora_viernes."<br>";
						$e=0;
						$query="INSERT INTO horario (id_grado,id_asignacion_grado_seccion,hora_inicio,hora_fin,numero_dia,dia,id_pensum) VALUES('$id_grado','$id_asignacion_grado_seccion','$horaInicial_viernes','$nuevaHora_viernes',5,'Viernes','$valor')";
        				if ($conexion->query($query) === TRUE) {
           		 			echo "Ingresado Correctamente";
            				echo'<script> swal("Grado y sección Ingresado Correctamente") </script';
        				} else {
            				echo "Error: " . $query . "<br>" . $conexion->error;
        				} 
					}
				}
			}
		}
	}
	

    //echo $valor;
}
?>