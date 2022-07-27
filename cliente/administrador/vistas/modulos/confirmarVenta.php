

<div class="container section ">	

<div class="row ">
<div class="col s12 ">
	
	<h5><p>Venta de Productos</p></h5>

    

	<table class="responsive-table highlight classTabla " >
		<tr class="classTablaTitulos">
			<td class="classID ">No.Còdigo</td>
			<td class="classTitulo">Titulo</td>
			<td class="classNombre">Marca</td>
			<td class="classApellidos">Categoría</td>
			<td class="classCorreo">Talla</td>
			<td class="classDirecciòn">Cantidad</td>
			<td class="classTelefono">Precio Unitario</td>
			<td class="classTelefono">PrecioTotal</td>
			<td class="classTelefono">Operación</td>

		</tr>

		<?php 

		$verProducto = new ControladorPlantilla();
		$verProducto->visualizarResumenCompraPrincipal();

		if (isset($_GET["idVenta"])) {
			$eliminaProducto = new ControladorPlantilla();
			$eliminaProducto->eliminarProductosLocalCo($_GET["idVenta"]);
		}
		
		

		 ?>

	 	

			
		</tr>


			
			</table>

			<div class="totalVenta col s12">
				<div class="col s4 m8">
					<p class="tipoLetra">Total</p>
				</div>

				<?php 

				$verProducto = new ControladorPlantilla();
				$verProducto->visualizarTotalRegistros();
				$verProducto->visualizarSUMARregistros();

	 			
	 			?>

				
				
				<div class="col s3 m1"></div>
			</div>

			
			

			<div class="row col s12 " style="margin-top: 30px;">

			<div class="col s2 m1"></div>	

			 <div class="input-field col s4 m3 ">
    			<a href="index.php?action=salidaProducto" class="btn  regresar" >Regresar</a>
    		</div>
				
           <div class="input-field col s4 m4 ">
        
          <a href="index.php?action=salidaProducto&identificador=1" class="btn " >Cancelar</a>
        </div>
        

  		  <div class="input-field col s4 m4 ">
    			<a href="index.php?action=resumenVenta" class="btn  verde" >Vender</a>
    		</div>


        </div>
        <div class="col s12 espacio"> </div>

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

	.totalVenta{
		background: #d2d2d2;
		height: 70px;
	}

	.tipoLetra{
		color: #820505;
		font-size: 25px;

	}

	.TextoLetra{
		text-align: center;
		color: #131111;
		font-size: 25px;

	}
	.regresar{
		background: #568ff7e0;
	}
	.regresar:hover{
		background: #568ff7ad;
	}

	.verde{
		background: #16bf16;
	}
	.verde:hover{
		background: #17c117a6;
	}
	.espacio{
		margin-top: 15px;

	}
	




</style>


