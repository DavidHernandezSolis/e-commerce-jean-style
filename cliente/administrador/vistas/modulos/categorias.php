




 <ul class="collapsible popout" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">add_circle_outline</i>Agregar Categorìa</div>
      <div class="collapsible-body"><span>
      	<form action="" method="post" class="col s12 " enctype="multipart/form-data">
			
				<div class="row card-panel">
				<div class="col s12 m12 l6">

					<div class="input-field col s12">
						<input type="text"  id="Nombre" name="nameNombre" class="validate" required>
						<label for="Nombre" >Nombre</label>
					</div>

					<div class="input-field col s12">
						<input type="text"  id="idDescripcion" name="nameDescripcion" class="validate" required>
						<label for="Descripcion" >Descripción</label>
					</div>

					</div>

			<div class="col s6">
			<div class="col s12  ">
			<div class="col s3 imagenes">
			
             <input type='file' class=""  name="imagenCategorias" onchange='openFileM(event)'><br>
              <img id='outputM' >
           
            </div>
            </div>
        </div>

    			  <?php 
          $registrarCategoria = new ControladorPlantilla();
          $registrarCategoria -> registroCategoria();

         

           ?>
    			<div class="col s12">

    			<button class="btn green Boton_enviar" type="submit">enviar</button>

    			</div>


				</div>
			</form></span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">grid_on</i>Ver Tabla </div>
      <div class="collapsible-body">


<div class="container section ">	

<div class="row ">
<div class="col s12 ">  
	
	<h5><p>Generar Categorìa</p></h5>

	



	<table class="responsive-table highlight classTabla " >
		<tr class="classTablaTitulos">
			<td class="classID ">ID</td>
			<td class="classNombre">Nombre</td>
			<td class="classApellidos">Descripciòn</td>
			
			<td class="classBajas ">Icono</td>
			<td class="classBajas ">Operación</td>
				
		</tr>
		<tbody id="verCategoriasSeach">
	 	
		<?php 

	$verProducto = new ControladorPlantilla();
	$verProducto->visualizarCategoriasController();
	$verProducto->BorrarCategoriaPrincipal();
	 ?>
	</tbody>

			</table>
			</div>	

			
			</div>

		

	</div></span></div>
    </li>
    
  </ul>
  <style>

.imagenesVisualizar{
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

  	.Boton_enviar{
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
			$("#verCategoriasSeach tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	
</script>