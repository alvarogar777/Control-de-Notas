<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
$nuevaHora="07:00";
$id_contador=0;
include '../../conexion/config.php';
$id_grado=$_GET['id'];
$id_asignacion_grado_seccion = $_GET['id_asignacion_grado_seccion'];
$sql = "SELECT * from asignacion_grado_seccion ag inner join grado g on g.id_grado=ag.id_grado inner join anio_ciclo_escolar ac on ac.id_anio_ciclo_escolar=ag.id_anio_ciclo_escolar where g.id_grado='$id_grado' and ag.id_asignacion_grado_seccion='$id_asignacion_grado_seccion' ";
$result_materia = $conexion->query($sql); 
while($row = $result_materia->fetch_assoc()) { 
	$nombre_grado=$row['nombre'];
	$seccion=$row['seccion'];
	$jornada=$row['jornada'];
	$anio_ciclo_escolar=$row['anio_ciclo_escolar'];
}
$o=0;
$sql1 = "SELECT * FROM pensum p inner join grado g on p.id_grado = g.id_grado where p.id_grado='$id_grado' and p.estado='activo'";
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Horario de: <?php echo $nombre_grado." Sección: ".$seccion." Jornada: ".$jornada." Año: ".$anio_ciclo_escolar; ?></h1>    
                </div>
                <!-- /.col-lg-12 -->

            <div class="modal-body">
            <form action="editar_horario.php" method="post"> 
                <div class="panel-body">
                    <input type="text" required autocomplete="off" name="id_grado" class="form-control" id="id_grado" value="<?php echo $id_grado  ?>">
                    <input type="text" required autocomplete="off" name="id_asignacion_grado_seccion" class="form-control" id="id_asignacion_grado_seccion" value="<?php echo $id_asignacion_grado_seccion  ?>">
                    <br> 
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
				  <thead>
				    <tr>
				      <th scope="col">Hora </th>
				      <th scope="col">Lunes</th>
				      <th scope="col">Martes</th>
				      <th scope="col">Miércoles</th>
				      <th scope="col">Jueves </th>
				      <th scope="col">Viernes</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php for ($i=0; $i<4 ; $i++) { 
				  	$horaInicial=$nuevaHora;
					$minutoAnadir=45;
					$segundos_horaInicial=strtotime($horaInicial);
					$segundos_minutoAnadir=$minutoAnadir*60;
					$nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
					$sql = "SELECT * from horario h INNER join grado g on g.id_grado=h.id_grado INNER join pensum p on p.id_pensum = h.id_pensum INNER join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=h.id_asignacion_grado_seccion where h.hora_inicio='$horaInicial' and g.id_grado='$id_grado' and ag.id_asignacion_grado_seccion='$id_asignacion_grado_seccion' ORDER BY `h`.`numero_dia` ASC ";
					$result_materia_electa = $conexion->query($sql); 		  	
				   ?>
				    <tr>
				      <th scope="row"><?php echo $horaInicial." a ".$nuevaHora; ?></th>	
				      <?php  while($row_materia_actual = $result_materia_electa->fetch_assoc()) {   $o++;   ?>
				      <td><center> <select id="horario<?php echo "[".$o."]"; ?>" for="horario<?php echo "[".$o."]"; ?>" name="horario<?php echo "[".$o."]"; ?>">
				      		<option value="<?php echo $row_materia_actual["id_horario"].",".$row_materia_actual["id_pensum"]?>"><?php echo $row_materia_actual["nombre_materia"]?></option> 
					    	<?php   $result_materia = $conexion->query($sql1); 
					    	while($row = $result_materia->fetch_assoc()) { ?>
                			<option value="<?php echo$row_materia_actual["id_horario"].",". $row["id_pensum"]?>"><?php echo $row["nombre_materia"]?></option>  
                	  <?php } ?> 
                	  	
					  </select> </center></td>
				      <?php }?>	     	
				      
								     			     
				    </tr>
					<?php } ?>
					<?php for ($i=0; $i<4 ; $i++) { 
				  	$horaInicial=$nuevaHora;
					$minutoAnadir=45;
					$segundos_horaInicial=strtotime($horaInicial);
					$segundos_minutoAnadir=$minutoAnadir*60;
					$nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
					$sql = "SELECT * from horario h INNER join grado g on g.id_grado=h.id_grado INNER join pensum p on p.id_pensum = h.id_pensum INNER join asignacion_grado_seccion ag on ag.id_asignacion_grado_seccion=h.id_asignacion_grado_seccion where h.hora_inicio='$horaInicial' and g.id_grado='$id_grado' and ag.id_asignacion_grado_seccion='$id_asignacion_grado_seccion' ORDER BY `h`.`numero_dia` ASC ";
					$result_materia_electa = $conexion->query($sql); 		  	
				   ?>
				    <tr>
				      <th scope="row"><?php echo $horaInicial." a ".$nuevaHora; ?></th>	
				      <?php  while($row_materia_actual = $result_materia_electa->fetch_assoc()) {   $o++;   ?>
				      <td><center> <select id="horario<?php echo "[".$o."]"; ?>" for="horario<?php echo "[".$o."]"; ?>" name="horario<?php echo "[".$o."]"; ?>">
				      		<option value="<?php echo $row_materia_actual["id_horario"].",".$row_materia_actual["id_pensum"]?>"><?php echo $row_materia_actual["nombre_materia"]?></option> 
					    	<?php   $result_materia = $conexion->query($sql1); 
					    	while($row = $result_materia->fetch_assoc()) { ?>
                			<option value="<?php echo$row_materia_actual["id_horario"].",". $row["id_pensum"]?>"><?php echo $row["nombre_materia"]?></option>  
                	  <?php } ?> 
                	  	
					  </select> </center></td>


				      <?php }?>	     	
				      
								     			     
				    </tr>
					<?php } ?>
				    
				  </tbody>
				</table>

				</div>
			<div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Imprimir</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
			</form>	
		</div>
 
      <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->