<?php 
//header('Status: 301 Moved Permanently', false, 301);
//header('Location: blank.php');
//exit();
include "head.php";
include '../../conexion/config.php';


?>
                  <div id="page-wrapper">
   <div class="row">
                <div class="col-lg-12">
  
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            
                   <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cambio de contraseñas</h1>
                    <div class="pull-right form-inline"><br>

            <?php 
              if (isset($_GET['err'])) {
                echo "<script> swal('Contraseña erronea') </script";
              }
              if (isset($_GET['done'])) {
                    echo "<script> swal('Contraseña cambiada exitosamente') </script";
                }
             
            ?>
                      
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
  
          </ol>
            <div class="container">
            <div class="card card-login mx-auto mt-8">
              <div class="card-body">
                <br><br>
                <form action="cambio_de_contrasenia.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <center><h3>Cambio de contraseñas</h3></center>                     
      
                    <br>
                    <label for="seleccion">Tipo de contraseña</label>
                    <select class="form-control" name="nombre_pago" id="nombre_pago">            
                        <option value="1">Root</option>
                        <option value="2">Administrativo</option> 
                        <option value="3">Profesores</option>  
                    </select>
                        <br>
                    <label for="passe">Ingrese su contraseña actual Root</label>
                        <input type="password" required name="passe" class="form-control" id="passe" value="" placeholder="contraseña"> 
                    <br><br>
                               
                  </div>      
                  <center><button type="Submit" class="btn btn-primary">Entrar</button></center>
                </form>  
              </div>
            </div>
          </div>
        </div>
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
<script type="text/javascript">
/*$(document).ready(function() {  
 
function realizaProceso(){       
        var parametros = {
                        "valorCaja1" : $('#ciclo').val(),               
        };
        $.ajax({
                data:  parametros,
                url:   '../peticiones/actualizar_inscripciones.php',
                type:  'post',
             
                success:  function (response) {
                       // $("#total").html(response);
                        document.getElementById("total").value = response;
                }
        });
}

    setInterval(realizaProceso, 500); 

}); */
</script>
</html>
