<div class="container section ">

	<center> <p>Ventas ralizadas en el Local</p></center>	




						</div>
						
						<div class="row">
							<table class="responsive-table highlight classTabla col s12" >


								<tr class="classTablaTitulos">
									<th class=" ">Còdigo</th>
									<th class="">Titulo</th>
									<th class="">Marca</th>
									<th class="">Categoría</th>
									<th class="">Talla</th>
									<th class="">Cantidad</th>
									<th class="">Precio</th>
									<th class="">P. Total</th>
									<th class="">P. Proveedor</th>
									<th class="">fecha</th>
									
									
									<th class="classBajas ">Operaciones</th>
					
								</tr>

								<tbody id="idVentaFisica">

								<?php 

								$verProducto = new ControladorPlantilla();
								$verProducto->visualizarventasFisicasController();
								$verProducto->BorrarProductoPrincipal();

	 							?>

	 							</tbody>

								
									</table>
								</div>


								

							</div>	
							<div class="fixed-action-btn toolbar">
								<a class="btn-floating btn-large blue">
									<i class="large material-icons">attach_money</i>
								</a>
								<ul style="text-align: center;">
								<li class="right-align Informes"> No. Clintes: 
								
	 							<span class="">
	 							<?php 
									$TotalClientes = new ControladorPlantilla();
									$TotalClientes->visualizarClientesTotales();
	 							?>

	 							</span></li>
									<li class="center-align Informes">Ventas:<span>
								<?php 
									$TotalVentas = new ControladorPlantilla();
									$TotalVentas->visualizarSUMAR_Ventas();
	 							?>
	 								
	 							</span></li>

	 								<li class="left-align Informes">Inversiòn:
									<span>

								<?php 
									$TotalClientes = new ControladorPlantilla();
									$TotalClientes->Ganancias_fiscas_principal();
	 							?>

									</span>  </li>

									<li class="left-align Informes">Gananacias:
									<span>

								<?php 
									$TotalClientes = new ControladorPlantilla();
									$TotalClientes->visualizar_Ganancias();
	 							?>

									</span>  </li>
									
								</ul>
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
		/*height: 150px;*/
	}


	.classAccionButton{
		
		margin-top: 80px;
		width: 130px;
		height: 30px;
	}

		 @media(max-width: 600px){
        .classAccionButton{
         
         margin-top: 10px;
        }
      }


	.FondoCategorias{
		/*background: aqua;*/
		height: 150px;
	}
	.Informes{
		/*background: yellow;*/
		color: white;
		font-size: 15px;
		
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
			$("#idVentaFisica tr").filter(function(){
				$(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	
</script>