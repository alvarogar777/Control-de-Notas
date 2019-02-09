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
                    <h1 class="page-header">Reporte de Ingresos</h1>
                    <div class="pull-right form-inline"><br>
                        
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <form action="../pdf/reporteFinanciero.php" method="post" target="_blank">
            <div>
                <label for="Tipo">Tipo de Reporte</label>
                    <select class="form-control" name="tipo_reporte" id="tipo_reporte">
                        <option value="anual">Anual</option>
                        <option value="ciclo">Ciclo Escolar</option>   
                        <option value="1">Enero</option> 
                        <option value="2">Febrero</option> 
                        <option value="3">Marzo</option> 
                        <option value="4">Abril</option> 
                        <option value="5">Mayo</option> 
                        <option value="6">Junio</option>         
                        <option value="7">Julio</option> 
                        <option value="8">Agosto</option> 
                        <option value="9">Septiembre</option> 
                        <option value="10">Octubre</option> 
                        <option value="11">Noviembre</option> 
                        <option value="12">Diciembre</option> 
                    </select>
                    <br>
                    <label for="descripcion">Descripción</label>
                    <select class="form-control" name="descripcion" id="descripcion">
                        <option value="inscripcion">Inscripción</option>
                        <option value="mensualidad">Mensualidad</option>
                        <option value="junto">Inscripción y mensualidad</option>          
                    </select>
                    <br>
                    <label for="anio">Ingrese año o ciclo escolar</label>
                    <input type="number"  autocomplete="off" name="anio" class="form-control" id="anio">
                    <br>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Generar Reporte</button>
            </div>
            </form>
            
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

  



</div>
</body>
</html>