<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from

if (isset($_POST['anio'])) 
{
    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['anio']!="") 
    {   // Recibimos los demas datos desde el form
        $anio = $_POST['anio'];

        $sql = "SELECT * FROM anio_ciclo_escolar a where a.anio_ciclo_escolar='$anio'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
        echo'<script> swal("El año '.$anio .' ya fue abierto") </script';
        } else {
            $query="INSERT INTO anio_ciclo_escolar (anio_ciclo_escolar,estado_ciclo_escolar ) VALUES('$anio','Activo')";
            if ($conexion->query($query) === TRUE) {
                echo "Ingresado Correctamente";
                echo'<script> swal("Salon Ingresado Correctamente") </script';
            } else {
                echo "Error: " . $query . "<br>" . $conexion->error;
            }          
        }

    }
}
$sql = "SELECT * FROM anio_ciclo_escolar ";
$result = $conexion->query($sql); 

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Ciclos escolares </h1>
                    <div class="pull-right form-inline"><br>
                \
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ciclo escolares disponibles
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example"> 
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Año</th>                      
										 <th>Imprimir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                   while($row = $result->fetch_assoc()) {
                                        echo "<tr class='odd gradeX'>";
                                        echo '<td ><center>' . $row["id_anio_ciclo_escolar"] . "</td>";
                                        echo "<td><center>" . $row["anio_ciclo_escolar"] . "</td>"; 
                                        $id=  $row["id_anio_ciclo_escolar"];  
                                                                   
                                        echo "<td><center>" ."<a href='ingreso_id_ciclo_imprimir.php?id=$id' class='btn btn-success ' role='button'>Escoger salon a imprimir notas</a>". "</center></td>";  
                                        
                                
                                       
 
                                    }  
                                    $conexion->close();
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




<body style="background: white;">

  


</body>
</html>