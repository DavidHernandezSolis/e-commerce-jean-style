
<h5><p>Salida de Producto</p></h5>
<div class="row card-panel">

  <form action="" method="POST" class="col s12 ">
  		<div class="">		
  					

           <div class="col m2"></div>
            <div class="input-field col s12 m5 ">

              <input type="text" name="nameCodigo"  id="idCodigo" class="validate" required>
              <label for="idCodigo" >No. Código </label>
            </div>

            <div class="input-field col s4 m ">

            <button class="btn blue separar" name="buscar" type="submit"><i class="material-icons" >create</i></button>
          </div>
          
     </div>
            
            
  </form>

<form action="" method="POST" class="col s12 " enctype="multipart/form-data" id="buscar">
  

         <div class="col s12"></div>
         <div class="divContenedor">
        <div class=" row col s12 m6" >

					<div class="input-field col s12">
                <input  Disabled type="text" value="" id="" class="" >
                <input type="hidden" value="" id="idMarca" class="validate" required>
                <label for="idMarca" >Marca</label>
              </div>
            

                <div class="input-field col s12">
                  <input  Disabled type="text" value="" id="" class="" >
                <input type="hidden" value="" id="idCategoria" class="validate" required>
              <label for="idCategoria" >Categoria</label>
            </div>


              <div class="input-field col s12 ">
              <input  type="text" hidden value=""id="idTalla" class="validate" required>

              <input Disabled type="text" value="" class="validate" required>
              <label for="idTalla" >Talla</label>
            </div>

            <div class="input-field col s12 m6 ">

              <input type="number" hidden value=""id="idPrecio" class="validate" required>

              <input  type="number" value=""  class="validate" required>
              <label for="idPrecio" >Precio Por Producto</label>
            </div>
            
                <div class="input-field col s12 m6">
                 <input type="number" value="" name="idPrecioCant" id="idPrecioCant" class="validate" required>
              <label for="idPrecio" >Cantidad</label>
              </div>

          </div>


          
            <div class="col s1"></div>

            <div class="claseImagenPrincipal imagenes col s5">
            
                  
                    <img  src="">



            </div>
              

              <div class="row col s12">

              
              

              <div class="input-field col s12 m4 ">
                
              </div>

              </div>
             </div>

         <?php   

            if (isset($_POST["buscar"])) 
              {
            
            $verProducto = new ControladorPlantilla();
              $verProducto->visualizarventaGralPrincipal();
              }
           
           ?>
           <a href=""></a>

			</form>


  </div>



  <?php 
          if (isset($_GET["identificador"])) {
            $verProducto = new ControladorPlantilla();
              $verProducto->CancelarCompraPrincipal();
          }
               
              // $Actualizar = new ControladorPlantilla();
              // $Actualizar->ActualizarProductosPrincipal();
               
           ?>


        
             
              
  <style>
	
  	.claseImagenPrincipal{
  		width: 80px;
  		
  		height: 300px;

      margin-top: 20px;

      border: 1px solid;
  	}

     .imagenes img{
      margin-top: 15px;
     margin-left: 10px;
     max-width: 370px;
     min-width: 365px;

      max-height: 270px;
      min-height: 260px;
    }
    .btonConfirmar{

    }




     @media(max-width: 1300px){

      .claseImagenPrincipal{
      width: 80px;
      margin-left: 5px;
      height: 200px;

      margin-top: 20px;

     border: 1px solid white;
    }
        .imagenes img{
         margin-top: 15px;
     margin-left: 5px;
     max-width: 170px;
     min-width: 165px;

      max-height: 170px;
      min-height: 160px;
        }
      }




      
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
  

<script type="text/javascript">
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

    
    
  
 
  // //Aqui va la captura del registro  
  //   $(document).ready(function(){

  //   $('#idnuevoProducto').click(function(){

      
  //     cadena="MarcaP=" + $('#idMarcaP').val()+
  //       "&CategoriaP=" + $('#idCategoriaP').val()+
  //       "&TallaP=" + $('#idTallaP').val()+
  //       "&PrecioP=" + $('#idPrecioP').val()+
  //       "&CantidadP=" + $('#idCantidadP').val()+            
  //       "&FotoP=" + $('#idFotoP').val();

  //     $.ajax({
  //       type:"POST",
  //       url:"index.php?action=insertarDatos.php",
  //       data:cadena, 
  //       success:function(r){



          
  //           if (r==1) {
  //           window.location="index.php?action=insertarDatos.php";   
  //         }
           


  //       }
      
  //   });

  // });



  // });



</script>