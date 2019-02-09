<?php
include('head.php');

?>

      <div id="content-wrapper">
        <div class="container-fluid">
          <ol class="breadcrumb">
            <h1><li class="breadcrumb-item active">Subir Excel</li></h1>
          </ol>
            <div class="container">
            <div class="card card-login mx-auto mt-5">
              <div class="card-header">Subir Excel</div>
              <div class="card-body">
                <form action="leer_excel.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <h3>Todo documento debe tener extension .xlsx</h3>
                  </div>
                  <input type="file" name="documento" />
       
                  <center><button type="Submit" class="btn btn-primary">Subir</button></center>
                </form>  
              </div>
            </div>
          </div>
        </div>
      </div>
  

<?php include('modal.php'); ?>