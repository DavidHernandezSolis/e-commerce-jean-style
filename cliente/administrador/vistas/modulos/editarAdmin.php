
<h5><p>Agregar Usuario</p></h5>

<form action="" method="post" class="col s12 " enctype="multipart/form-data" >
    <div class="row card-panel ">

        <?php 
        if (isset($_GET["id"])) {
          $verAdmin = new ControladorPlantilla();
          $verAdmin->visualizarEditarAdminController();
        } 
        
          
        if (isset($_POST["envio"])) {
          $registrar = new ControladorPlantilla();
          $registrar -> EditarAdmin();
        }
        ?>
    </div>
</form>


  <style>
    
    .imagenes img{
      margin-top: 15px;
     max-width: 180px;
      max-height: 230px;
      min-width: 120px;
      min-height: 200px;
    }

    .claseImagenPrincipal{
      width: 100px;
      
      border: 1px solid;
      height: 150px;
    }

    .classEspacio{
    
      height: 30px;
    }

  
  .claseImagen1{
    background: #c2c2c2;
    width: 50px;
    height: 80px;
    border: 1px solid;

  }

  .claseImagen2{
    background: #c2c2c2;
    width: 50px;
    height: 80px;
    border: 1px solid;

  }

  .claseImagen3{
    background: #c2c2c2;
    width: 50px;
    height: 80px;
    border: 1px solid;
    

  }

  @media(max-width: 600px){
        .claseImagen3 {
     margin-top: 20px;  
    }}

          #header input.buscador1{
        display: none;
      }
      #header input.buscador2{
        display: block;
      }
      #header input.header-search-input:hover {
        background: rgba(255, 255, 255, 0.3);
      }

</style>
