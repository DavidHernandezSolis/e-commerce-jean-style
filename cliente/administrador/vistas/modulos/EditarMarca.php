


<div class="row">
	
	<div class="col l12 Margen">

 

      	<form action="" method="post" class="col s12 " enctype="multipart/form-data">
				<div class="row card-panel">
					<center><h5>Actualizar Marcas</h5></center>
					<hr><br><br>

					<?php 
					$verMarca = new ControladorPlantilla();
					$verMarca -> EditarMarcaPrincipal();

          $EditarMarca = new ControladorPlantilla();
      $EditarMarca->ActualizarMarcas();
					
					 ?>


			
    			<!-- <?php 

				$verProducto = new ControladorPlantilla();
				$verProducto->registroMarca();

				 ?> -->
	 

				</div>
			</form>

			</div>
			</div>
   
  <style>

  	.Margen{
  		margin-top:15px;
  	}


  	.fotoLteral{
margin-top: 5px;
     max-width: 90px;
      max-height: 150px;
      min-width: 70px;
      min-height: 100px;
   
  	}
  	.imagenes img{
      margin-top: 15px;
     max-width: 200px;
      max-height: 230px;
      min-width: 180px;
      min-height: 200px;
    }

  	.boton_enviar{
  		margin-top: 15px;
  	}
	.classBtnAgregar{
		margin-bottom: 15px;
	}

	.classTabla{
		margin-bottom: 25px;
		
	}
	.classTablaTitulos{
		background: #d3d3d3;
	}

</style>


<script>
  var openFileM = function(event) {
    var input = event.target;

    var reader = new FileReader();
    reader.onload = function(){
      var dataURL = reader.result;
      var output = document.getElementById('outputM');
      output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
  };

</script>
