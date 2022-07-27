
<h5><p>Agregar Producto</p></h5>

<form action="" method="post" class="col s12 " enctype="multipart/form-data" >
    <div class="row card-panel">

        <div class="input-field col s12 m8 l2">
              <input type="text"  id="idCodigo" name="nameCodigo" class="validate" required>
              <label for="idCodigo" >No. Código* </label>
        </div>

        <div class="input-field col s12 m6 l6">
              <input type="text"  id="idTitulo" name="nameTitulo" class="validate" required>
              <label for="idTitulo" >Titulo*</label>
        </div>

        <div class="input-field col s12 m6 l4">
              <input type="date"  id="idFecha" name="nameFecha" class="validate" required>
              <label for="idFecha" ></label>
        </div>

        <div class="input-field col s12 m6 l4">
              <select name="nameCategoria" class="validate" required>
                  <option value=""  disabled selected>Categoria*</option>
                  <?php 
                      $Categoria =ControladorPlantilla::listaCategoriasPlantilla();
                        var_dump($Categoria);
                      foreach ($Categoria as $key => $value) {
                        echo ' 
                          <input type="text"  id="nombreCategoria" name="nombreCategoria" class="validate" >
                          <option value="'.$value["idCategorias"].'">'.$value["Nombres"].'</option>
                        ';
                      }
                  ?>
               </select>   
        </div>
             
        <div class="input-field col s12 m6 l4">
              <select name="nameTalla" required class="validate">
                <option value="" disabled selected>Talla*</option>


                <option value="Extra Pequeño">Extra Pequeño</option>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
                <option value="Extra Granda">Extra Granda</option>
                <option value="Extra Extra Grande">Extra Extra Grande</option>

              </select> 
            
        </div>


        <div class="input-field col s12 m6 l4">
          <select name="nameMarca" required>
            <option value="" disabled selected>Marca*</option>
            <?php  
            $marca =ControladorPlantilla::listaMarcaPlantilla();
                //var_dump($Categoria);
                foreach ($marca as $key => $value) {
                 echo ' 
            
            <option value="'.$value["idMarca"].'">'.$value["Nombre"].'</option>
             ';
                }
            

            ?>
            
          </select>
         
        </div>

        <div class="input-field col s12 m6 l3">
          <input type="text"  id="idColor" name="namecolor" class="validate" required>
          <label for="idColor" >Color*</label>
        </div>
          
        <div class="input-field col s12 m6 l3">
          <input type="number"  id="idCantidad" name="nameCantidad" class="validate" required>
          <label for="idCantidad" >Cantidad*</label>
        </div>

        <div class="input-field col s12 m6 l3">
          <input type="number"  id="idPrecioProvee" name="namePrecioProvee" class="validate" required>
          <label for="idPrecioProvee" >Precio Proveedor*</label>
        </div>

        <div class="input-field col s12 m6 l3">
          <input type="number"  id="idPrecioPubli" name="namePrecioPubli" class="validate" required>
          <label for="idPrecioPubli" >Precio Publico*</label>
        </div>
          

    
        <div class="input-field col s12 m6 l6">
          <input type="number" placeholder="ingresar la Cantidad" value="0" id="idOferta"  name="nameOferta" class="validate" required>
          <label for="idOferta" >Oferta</label>
        </div>

         <div class="input-field col s12 m6 l6">
              <select name="namePublicidad" required>
                <option value="" disabled selected >Tipo de Publicidad*</option>


                <option value="1">Ninguno</option>
                <option value="2">Publicidad Gral.</option>
                <option value="3">Prunlicidad Banner</option>
             

              </select> 
            
        </div>


          <div class="input-field col s12 m6 l6">
          <textarea placeholder="Descripción*" name="nameDescripcion" class="materialize-textarea"></textarea>
        </div>


        <div class="col s12"><center><p class="" style="text-align: center;">Foto del producto</p></center></div>
        <div class="col m3 classEspacio">
        <!-- para divir las imagnes para que se bajen --> 
        </div>




          <div class="col s12 imagenes">
            <div class="col s3 ">
             <input type='file' accept='image/*' name="imagen1" onchange='openFileG(event)'><br>
              <img id='outputG'>
            </div>
            <div class="col s3 offset-s1 ">
              <input type='file' accept='image/*' name="imagen2" onchange='openFileG2(event)'><br>
              <img id='outputG2'>
            </div>
            <div class="col s3 offset-s1 ">
              <input type='file' accept='image/*' name="imagen3" onchange='openFileG3(event)'><br>
              <img id='outputG3'>
            </div>
          </div>
         
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
              $registrar = new ControladorPlantilla();
              $registrar -> registroProductos();
              if (isset($_GET["action"])) {
                 if ($_GET["action"]=="ok") {
                   echo "se Realizo la consulta";
                 }
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


<script>
  var openFileG = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('outputG');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };


  var openFileG2 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('outputG2');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };



  var openFileG3 = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('outputG3');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };
</script>

