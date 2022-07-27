
	
	<h5><p>Productos Registrados</p></h5>

	
	<a href="index.php?action=insertarProductos" class="btn green classBoton" type="submit">Agregar Producto</a>


	<table class="responsive-table highlight classTabla " >
		<tr class="classTablaTitulos">
			<td class="classID ">Código</td>
			<td class="">Titulo</td>
			<td class="">Categorìa</td>
			<td class="">Marca</td>

			
			
			<td class="">Talla</td>
			<td class="">Cantidad</td>

			<td class=" ">Color</td>
			<td class="">Descripcion</td>
			<td class="">Foto</td>
			<td class="">Oferta</td>
			<td class=" ">Precio</td>
			<td class=" ">Fecha</td>
			
			<td class="">Operaciones</td>
	
		<tbody id="VerProductosSeach">
				
		</tr>

	 	<?php 

		$verProducto = new ControladorPlantilla();
		$verProducto->visualizarProductosController();
		$verProducto->BorrarProductosController();

		 ?>

		</tbody>



			

			</table>
			</div>	

			
			</div>

		
	


  <style>

  	.fotoLteral{
margin-top: 5px;
     max-width: 90px;
      max-height: 150px;
      min-width: 70px;
      min-height: 100px;
   
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

	.classBoton{
		margin-bottom: 20px;
	}

	.separar{
		margin-bottom: 5px;
	}

	#header input.buscador1{
        display: block;
    }
    #header input.buscador2{
        display: none;
    }
</style>

<script type="text/javascript">
	
		$("#search").on ("keyup", function(){
			var value= $(this).val().toLowerCase();
			$("#VerProductosSeach tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	
</script>