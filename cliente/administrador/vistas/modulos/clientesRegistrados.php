

<div class="container section ">	

<div class="row ">
<div class="col s12 ">
	
	<p>Usuario Registrados</p>
	<table class="responsive-table highlight classTabla " >
		<tr class="classTablaTitulos">
			<td class="classID ">ID</td>
			<td class="classNombre">Nombre</td>
			<td class="classApellidos">Apellidos</td>
			<td class="classCorreo">Correo</td>
			<td class="classDirecciòn">Direcciòn</td>
			<td class="classTelefono">Telefono</td>
			
			
			<td class="classBajas ">Operaciòn</td>
			
				
		</tr>

	 	<tbody id="verClie_Registrados_seach">
		<?php 

		$verProducto = new ControladorPlantilla();
		$verProducto->visualizarClientesController();

		 ?>

		</tbody>



			</table>
			</div>	

			
			</div>

		

<!-- SELECT 
			<div class="row">
				<div class="col s6 input-field">
					<i class="material-icon prefix"></i>
					<select name="cboest" id="cboest">
						<option value="">Selelcionar Dato</option>
						<option value="1">uno</option>
						<option value="2">dos</option>
					</select>
					
				</div>
			</div>

			<script type="text/javascript">
				$(document).ready(function(){
					$('select').material_select();
					});
			</script>
 -->

			<!-- 
				AGREGAR UN TEXTAREA
			<div>
				<textarea class="materialize-textarea">ecribir</textarea>
			</div> -->

<!-- aqui termina el Container Section -->
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



<script type="text/javascript">
	
		$("#search").on ("keyup", function(){
			var value= $(this).val().toLowerCase();
			$("#verClie_Registrados_seach tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	
</script>