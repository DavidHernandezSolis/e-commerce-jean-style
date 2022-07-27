<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Sistema administrador del E-Commerce">
    <meta name="keywords" content="Administrator Tienda Virtual">
    <title>Administrador E-Commerce</title>
    <!-- Favicons-->

    <!-- CORE CSS-->
    <link href="vistas/cssAdmin/materialize.css" type="text/css" rel="stylesheet">
    <link href="vistas/cssAdmin/style.css" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="vistas/cssAdmin/custom/custom.css" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="vistas/cssAdmin/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    


    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
      <script type="text/javascript" src="vistas/jsAdmin/jquery-3.2.1.min.js"></script>

  </head>
  <body>
    <!-- Start Page Loading -->
    <!-- <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
    </div> -->
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////// -->
    <!-- START HEADER -->
    <?php 
      include "modulos/encabezado.php";
    ?>
    <!-- END HEADER -->
    <!-- /////////////////////////////////////////////////////////////////// -->
    <!-- START MAIN -->
     <div id="main">
      <!-- START WRAPPER -->
      <div class="wrapper">
        <!-- START LEFT SIDEBAR NAV-->
            <?php 
            include "modulos/menuLateral.php";
            ?>
        <!-- END LEFT SIDEBAR NAV-->
        <!-- //////////////////////////////////////////////////////////////////////////// -->
        <!-- START CONTENT -->
        <section id="content">
          <!--start container-->
            <div class="container">
            
                <!-- ================ COMIENZA CONTENIDO DINAMICO ===================== -->
                <!-- START MAIN DINAMICO -->

                <?php 
                if (isset($_GET["action"])) {

                  ob_start();
                  // $Enlaces=$_GET["ruta"];
                  // $Enlaces="modulos/".$Enlaces.".php";
                  // include $Enlaces;

                      $ruta = new ControladorPlantilla();
                      $ruta -> rutasContenidoDinamico();
                  ob_end_flush();

                }else{
                  include "modulos/salidaProducto.php";
                }
                ?>
                
                <!-- END MAIN DINAMICO-->
                <!-- ================ TERMINA CONTENIDO DINAMICO ====================== -->
            </div>
          <!--end container-->
        </section>
        <!-- END CONTENT -->
      </div>
      <!-- END WRAPPER -->
    </div>

    <!-- END MAIN -->

    <!-- ////////////////////////////////////////////////////////////////// -->
    <!-- START FOOTER -->
    <?php 
     // include "modulos/pie.php";
    ?>
    <!-- END FOOTER -->
    <!-- ====================================================================
    Scripts
    ====================================================================== -->
    <!-- jQuery Library -->
    
    <script type="text/javascript" src="vistas/jsAdmin/jquery-3.2.1.min.js"></script>
    <!--materialize js-->
    <script type="text/javascript" src="vistas/jsAdmin/materialize.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="vistas/jsAdmin/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="vistas/jsAdmin/plugins.js"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="vistas/jsAdmin/custom-script.js"></script>

     <script type="text/javascript" src="vistas/ajax/validarRegistros.js"></script>
    
  </body>
</html>


