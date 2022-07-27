


<div class="container section ">	

<div class="row ">
<div class="col s12 ">
	
	<p>Clientes Activos</p>
	<table class="responsive-table highlight classTabla " >
		<tr class="classTablaTitulos">
			<td class="classID ">ID</td>
			<td class="classNombre">Nombre</td>
			<td class="classApellidos">Apellidos</td>
			<td class="classCorreo">Correo</td>
			<td class="classDirecciòn">Direcciòn</td>
			<td class="classTelefono">Telefono</td>
			<td class="classCompras">Compras</td>
			
			
			<td class="classBajas ">Operaciòn</td>
			
				
		</tr>

			<?php 

	$verProducto = new ControladorPlantilla();
	$verProducto->visualizarClientesACTIVOSController();

	 ?>
	 	


			</table>
			</div>	

			
			</div>

		

	</div>
</div>
<style>
	

	.classTabla{
		margin-bottom: 25px;
		
	}
	.classTablaTitulos{
		background: #d3d3d3;
	}


</style>


