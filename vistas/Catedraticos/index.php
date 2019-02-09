<?php  
include("head.php");
?>

<style type="text/css">
    


/*titulo*/

div#titulo{
    width:100%;
    margin-top:100px;
}

p#header{
    text-align: center;
    font-size: 2.5em;
    color:#9a9a9a;
}

p#subheader{
    text-align: center;
    color:#cecece;
    margin-top:20px;
    font-size: 1.3em;
}

header{
    margin:50px ;
    width:20px;
    height:230px;
    background-color: red;
}

div.contenedor{
    width: 200px;
    height: 230px;
    float:left;
    -webkit-transition: height .4s;
}

div#uno{
    background-color: rgb(208,101,3);
}

div#dos{
    background-color: rgb(233,147,26);
}

div#tres{
    background-color: rgb(22,145,190);
}

div#cuatro{
    background-color: rgb(22,107,162);
}

div#cinco{
    background-color: rgb(27,54,71);
}

div#seis{
    background-color: rgb(21,40,54);
}

img.icon{
    display: block;
    margin:50px auto;
    background-color: rgba(255,255,255,.15);
    width:40px;
    padding:20px;
    -webkit-border-radius: 50%;
    -webkit-box-shadow: 0px 0px 0px 30px rgba(255,255,255,0);
    -webkit-transition:box-shadow .4s;
}

p.texto{
    font-size: 1.4em;
    color:white;
    text-align: center;
    padding-top:12px;
    opacity: .4;
    -webkit-transition: padding-top .4s;
}

div.contenedor:hover{
    height:250px;
}

div.contenedor:hover p.texto{
    padding-top: 50px;
    opacity: 1;
}

div.contenedor:hover img.icon{
    -webkit-box-shadow:0px 0px 0px 0px rgba(255,255,255,.6);
}

</style>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Menu principal</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">


        <header>
        
       <div class="contenedor" id="uno">
        <a href="ingreso_notas_id_profesor.php"><img class="" src="pictures/icon6.png">
            <p class="texto"><h1><center>Ingreso de notas</center></h1></p></a>
        </div>

        
        

    </header>


        
        <!-- /#page-wrapper -->

    </div>
</div>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../../vendor/raphael/raphael.min.js"></script>
    <script src="../../vendor/morrisjs/morris.min.js"></script>
    <script src="../../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../../dist/js/sb-admin-2.js"></script>

</body>

</html>
