<div class="container section ">

	<center> <p>Ventas ralizadas en Sitio Web</p></center>	








	</div>
<div class="row">
	<table  class="responsive-table highlight classTabla col s12" >
		<tr class="classTablaTitulos">
			<th class=" ">Còdigo Venta</th>
			<th class="">Cliente</th>
			<th class="">Pantalòn</th>
			<th class="">Cantidad</th>
			<th class="">Cant. Pago</th>
			<th class="">Fecha</th>
			<th class="" >Estatus</th>
			
			<th class="classBajas ">opciones</th>
				
		</tr>
		<tbody id="tableVentasOnline">
			

		<?php 

	$verProducto = new ControladorPlantilla();
	$verProducto->visualizarventasOnlineController();
	$verProducto->BorrarVentasOnlinePrincipal();

	 ?>
	 		
	 </tbody>

	</div>
</div>

	



<style>
	

	.classTabla{
		margin-bottom: 25px;
		
	}
	.classTablaTitulos{
		background: #d3d3d3;
	}

	.BuscarFechas{
		/*background: yellow;*/
		margin-bottom: 20px;

	}

	.BuscarFiltros{
		/*background: blue;*/
		height: 150px;

	}

	.classBoton{
		/*background: aqua;*/
		height: 150px;
	}
	.classAccionButton{
		margin-top: 90px;
		width: 130px;
		height: 30px;
	}

	.FondoCategorias{
		/*background: aqua;*/
		height: 150px;
	}
	.separarFilas{
		

		/*background: yellow;*/
	}

	.Informes{
		/*background: yellow;*/
		color: white;
		font-size: 15px;
		/*margin-bottom: 15px;*/
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
			$("#tableVentasOnline tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	
</script>