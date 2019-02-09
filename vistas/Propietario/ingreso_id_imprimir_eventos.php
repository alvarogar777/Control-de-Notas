<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
// incluimos el archivo de configuracion
include '../../conexion/config.php';

// Verificamos si se ha enviado el campo con name from

//$conexion->close();
?>

  <!-- Page Content -->
    
                     <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Imprimir eventos </h1>
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
                            Imprimir eventos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          
                            <form action="../pdf/imprimir_eventos_mes.php" method="POST" enctype="multipart/form-data" target="_blank">
                              <div class="form-group">
                                <center><h3>Ingreso de datos</h3></center>                  
                                                                    
                                    <label for="anio">Ingrese Año del ciclo escolar</label>
                                    <input type="number" required name="anio" class="form-control" id="anio" value="" placeholder="Ingrese año del ciclo escolar"> 
                                    <br>
                                    <label for="mes">Ingrese Mes</label>
                                    <select class="form-control" name="mes" id="mes">                                      
                                      <option value="1"> Enero </option> 
                                      <option value="2"> Febrero </option>
                                      <option value="3"> Marzo </option>
                                      <option value="4"> Abril </option>
                                      <option value="5"> Mayo </option>
                                      <option value="6"> Junio </option>
                                      <option value="7"> Julio </option>
                                      <option value="8"> Agosto </option>
                                      <option value="9"> Septiembre</option>
                                      <option value="10"> Octubre </option>
                                      <option value="11"> Noviembre </option>
                                      <option value="12"> Diciembre </option>                                                  
                                    </select>             
                                </div>      
                              <center><button type="Submit" class="btn btn-primary">Entrar</button></center>
                            </form>  
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