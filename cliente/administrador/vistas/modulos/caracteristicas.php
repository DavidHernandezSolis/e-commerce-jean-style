



 <ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">add_circle_outline</i>Agregar Marca</div>
      <div class="collapsible-body"><span>
      	<form action="" method="post" class="col s12 " enctype="multipart/form-data">
				<div class="row card-panel">
					<div class="col s12 m12 l6">
					<div class="input-field col s12">
						<input type="text"  id="idNombreMarca" name="nameMarca" class="validate" required>
						<label for="idNombreMarca" >Nombre de la Marca</label>
					</div>

					<div class="input-field col s12">
						<input type="text"  id="idDescripcionMarca" name="nameDescripcion" class="validate" required>
						<label for="idDescripcionMarca" >Descripción</label>
					</div>

					<div class="input-field col s12">
						<input type="text"  id="idProveedorMarca" name="nameProveedor" class="validate" required>
						<label for="idProveedorMarca" >Proveedor</label>
					</div>
					</div>
					
				<div class="col s6">
				<div class="col s12 imagenes">
            <div class="col s3 ">
             <input type='file'  name="imagenMarca" onchange='openFileM(event)'><br>
              <img id='outputM'>
            </div>
            </div>
            </div>



				<div class="col s12">
    			<button class="btn green boton_enviar" type="submit">enviar</button>
    			</div>
    			<?php 

				$verProducto = new ControladorPlantilla();
				$verProducto->registroMarca();

				 ?>
	 

				</div>
			</form></span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">grid_on</i>Ver Tabla </div>
      <div class="collapsible-body">


<div class="container section ">	

<div class="row ">
<div class="col s12 ">  
	
	<h5><p>Marca</p></h5>

	



	<table class="responsive-table highlight classTabla " >
		<tr class="classTablaTitulos">
			<td class=" ">ID</td>
			<td class="">Nombre</td>
			<td class="">Descripciòn</td>
			<td class="">Proveedor</td>
			<td class="">Icono</td>
			
			
			<td class="">Operación</td>
				
		</tr>

		<tbody id="verCategorias_Seach">
		<?php 

			$VisualizarMArca = new ControladorPlantilla();
			$VisualizarMArca->visualizarMarcasController();
			$VisualizarMArca->BorrarMarca();
	
		 ?>
	 </tbody>

			</table>
			</div>	

			
			</div>

		

	</div></span></div>
    </li>
    
  </ul>


  <style>
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
<script type="text/javascript">
	
		$("#search").on ("keyup", function(){
			var value= $(this).val().toLowerCase();
			$("#verCategorias_Seach tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	
</script>		