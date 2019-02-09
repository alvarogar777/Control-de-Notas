<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';
$id_anio_ciclo_escolar = $_GET['id'];
$sql = "SELECT * FROM anio_ciclo_escolar a where a.id_anio_ciclo_escolar='$id_anio_ciclo_escolar'";
$result = $conexion->query($sql);
while($row = $result->fetch_assoc()) {
$anio_ciclo_escolar = $row["anio_ciclo_escolar"] ;
}  
if (isset($_POST['id_grado'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['id_grado']!="") 
    {   // Recibimos los demas datos desde el form
        $id_grado = $_POST['id_grado'];
        $seccion = $_POST['seccion'];
        $profesor = $_POST['profesor'];
        $jornada = $_POST['jornada'];

        $sql = "SELECT * FROM asignacion_grado_seccion a where a.id_anio_ciclo_escolar='$id_anio_ciclo_escolar' and a.seccion ='$seccion' and a.id_grado=$id_grado and a.jornada='$jornada'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
        echo'<script> swal("La sección y el grado ya fueron abiertos") </script';
        } else {
            $query="INSERT INTO asignacion_grado_seccion (id_anio_ciclo_escolar,seccion,id_profesores,id_grado,jornada) VALUES('$id_anio_ciclo_escolar','$seccion','$profesor','$id_grado','$jornada')";
            if ($conexion->query($query) === TRUE) {
                echo "Ingresado Correctamente";
                echo'<script> swal("Grado y sección Ingresado Correctamente") </script';
            } else {
                echo "Error: " . $query . "<br>" . $conexion->error;
            }          
        }

    }
}
$sql = "SELECT g.nombre as nombre_grado, seccion, p.nombres as nombre_profesor, p.apellidos as apellido_profesor, ag.id_asignacion_grado_seccion,jornada, g.id_grado  from asignacion_grado_seccion ag inner join anio_ciclo_escolar ac on ag.id_anio_ciclo_escolar=ac.id_anio_ciclo_escolar inner join profesores p on p.dpi_profesor=ag.id_profesores inner join grado g on g.id_grado = ag.id_grado where ac.id_anio_ciclo_escolar='$id_anio_ciclo_escolar' ";
$result = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Asignacion de secciones para el año <?php echo $anio_ciclo_escolar; ?></h1>
                    <div class="pull-right form-inline"><br>
                        <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'>Añadir grado y Sección</button>
                        <button class="btn btn-info" onClick="window.location = 'asignacion_ciclo_escolar.php';">Regresar</button>
                  
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Grado y secciones abiertas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Grado</th>
                                        <th>Sección</th>
                                        <th>Jornada</th>
                                        <th>Profesor Guía</th>
                                        <th>Ver y editar</th>
                                        <th>Asignar Catedraticos</th>
                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                   while($row = $result->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo '<td><center>' . $row["id_asignacion_grado_seccion"] . "</center></td>";
                                        echo "<td><center>" . $row["nombre_grado"] . "</td>"; 
                                        echo '<td class="table-primary"><center>' . $row["seccion"] . "</td>";
                                        echo '<td class="table-primary"><center>' . $row["jornada"] . "</td>";
                                        echo '<td class="table-primary"><center>' . $row["nombre_profesor"]." ".$row["apellido_profesor"] . "</td>";  
                                        $id=  $row["id_asignacion_grado_seccion"];      
                                        echo "<td><center>" ."<a href='editar_asignacio_de_secciones.php?id=$id' class='btn btn-success ' role='button'>Editar</a>". "</center></td>";                          
                                       
                                        echo "<td><center>" . "<a href=\"asignacion_catedraticos.php?id=".$row["id_grado"]."&id_asignacion_grado_seccion=".$row["id_asignacion_grado_seccion"]."\" class='btn btn-success ' role='button'>Asignar</a></td>"; 
                                                                            
                                    }  
                                   
                                    ?>                                       
                           
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
     
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

   <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../../vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../../vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

</body>

</html>

<?php 
$sql = "SELECT * FROM grado";
$result_grado = $conexion->query($sql);
$sql = "SELECT * FROM profesores";
$result_profesores = $conexion->query($sql);
 
?>


<body style="background: white;">

  

<div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Agregar nuevo </h4>
      </div>
      <div class="modal-body">
        <form action="" method="post"> 
                    <label for="id_grado">Grado</label>
                    <select class="form-control" name="id_grado" id="id_grado"> 
                        <?php while($row = $result_grado->fetch_assoc()) { ?>
                        <option value="<?php echo $row["id_grado"]; ?>"> <?php echo $row["nombre"]  ?></option>  
                        <?php }?>
                    </select>
                    <br>  
                    <label for="seccion">Sección</label>
                    <select class="form-control" name="seccion" id="seccion"> 
                        <option value="A">A</option>  
                        <option value="B">B</option>
                        <option value="C">C</option>  
                        <option value="D">D</option>
                        <option value="E">E</option>  
                        <option value="F">F</option>
                    </select>
                    <br> 
                    <label for="profesor">Profesor Guía</label>
                    <select class="form-control" name="profesor" id="profesor"> 
                        <?php while($row = $result_profesores->fetch_assoc()) { ?>
                        <option value="<?php echo $row["dpi_profesor"]; ?>"> <?php echo $row["nombres"]." ".$row["apellidos"]  ?></option>  
                        <?php }?>
                    </select>
                    <br>
                    <label for="jornada">Jornada</label>
                    <select class="form-control" name="jornada" id="jornada">                 
                        <option value="Matutina">Matutina</option>          
                        <option value="Vespertina">Vespertina</option>  
                        <option value="Sabado">Sabado</option>  
                    </select>                      
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
        </form>
    </div>
  </div>
</div>
</div>
</body>
</html>