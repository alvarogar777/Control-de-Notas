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
$sql = "SELECT * FROM pensum p inner join grado g on p.id_grado = g.id_grado where p.id_grado='$id_grado' and p.estado='activo'";
$result_materia = $conexion->query($sql); 
$o=0;
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ingreso de horario para</h1>    
                </div>
                <!-- /.col-lg-12 -->

            <div class="modal-body">
            <form action="guardar_horario.php" method="post"> 
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
				  <?php for ($i=0; $i<8 ; $i++) { 
				  	$horaInicial=$nuevaHora;
					$minutoAnadir=45;
					$segundos_horaInicial=strtotime($horaInicial);
					$segundos_minutoAnadir=$minutoAnadir*60;
					$nuevaHora=date("H:i",$segundos_horaInicial+$segundos_minutoAnadir);
							  	
				   ?>
				    <tr>
				      <th scope="row"><?php echo $horaInicial." a ".$nuevaHora; ?></th>	
				      <?php for ($e=1; $e<6 ; $e++) { $o++; ?>	
				      <td><center> <select id="horario<?php echo "[".$o."]"; ?>" for="horario<?php echo "[".$o."]"; ?>" name="horario<?php echo "[".$o."]"; ?>">
					    	<?php   $result_materia = $conexion->query($sql); 
					    	while($row = $result_materia->fetch_assoc()) { ?>
                			<option value="<?php echo $row["id_pensum"]?>"><?php echo $row["nombre_materia"]?></option>  
                	  <?php } ?> 
                	  	
					  </select> </center></td>	
					  <?php }?>				     			     
				    </tr>
					<?php } ?>
				    
				  </tbody>
				</table>

				</div>
			<div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
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