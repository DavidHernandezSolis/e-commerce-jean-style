
<h5><p>Generar Categoria</p></h5>

<form action="" method="post" class="col s12 " enctype="multipart/form-data" >
    <div class="row card-panel">

      <?php 

  $verProducto = new ControladorPlantilla();
  $verProducto->EditarProductosController();

    $EditarProducto = new ControladorPlantilla();
      $EditarProducto->ActualizarProductos();
    
 

   ?>

      

  

          
         
     <!--  <div class="col s12 m6 l6 claseImagenPrincipal">
        
        <button  type="submit">Seleccionar</button>
          imagen Principal    
      </div> -->

     <!-- <div class="col s12 classEspacio"> -->
       <!--  para divir las imagnes para que se bajen  -->
    <!--   </div>  -->


      <!-- <div class="col s1  m2"></div>
      <div class="col s4 m2 claseImagen1">    
          imagen1
      </div>

      <div class="col s1 m1"></div>

      <div class="col s4 m2 claseImagen2">    
          imagen2
      </div>


      <div class="col s3 m1"></div>

      <div class="col s5 m2 claseImagen3">    
          imagen3
      </div> -->


        <div class="col s7 m5"></div>

          <div class="input-field col s4 m4 ">
            <button class="btn green" type="submit">enviar</button>
          </div>
            <?php 
              // $registrar = new ControladorPlantilla();
              // $registrar -> registroProductos();
              // if (isset($_GET["action"])) {
              //    if ($_GET["action"]=="ok") {
              //      echo "se Realizo la consulta";
              //    }
              // }
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
    }

</style>


<script>
  var openFile = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };


  var openFile2 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output2');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };



  var openFile3 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('output3');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
</script>

