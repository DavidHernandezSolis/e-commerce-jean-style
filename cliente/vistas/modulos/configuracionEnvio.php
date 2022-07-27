<?php 
	$ruta = new Ruta();
	$url =  $ruta->controlRuta();

	$urlAdmin = $ruta->controlRutaAdmin();
?>
<div class="contenedor-carrito fuente-letra">
	<div class="row ">
		<div class="col s12 m10 offset-m1 l8  offset-l2 cuerpo-carrito">
			<div class="row " style=" padding-top: 15px; background-color: #e4e0e040;padding-bottom: 10px;">
				<div class="col s6" >
					<a href="<?php echo $url; ?>"><span class="block black-text font-estilo" >Inicio</span></a>
					<span>&nbsp; > &nbsp;</span>
					<a href="<?php echo $url; ?>carritoCompras"><span class="block black-text font-estilo" >Carrito</span></a>
					<span>&nbsp; > &nbsp;</span>
					<span class="block black-text"> <?php echo $rutas[0]; ?></span>
				</div> 

				<div class="col s6 right-align" >
					<span class="block black-text center-align carrito-titulo" style="font-size: 25px;"> Configuración de Envio</span>
				</div> 
			</div>		
		</div>
	</div>
</div>
<style type="text/css">
	.contenedor-carrito{
		padding: 15px;
		margin-top: 20px;
	}
	.contenedor-carrito .carrito{
		padding-bottom: 10px;
		background-color: #807c7c1f;
		padding-top: 1px;
	}
	.contenedor-carrito .cuerpo-carrito{
		padding: 15px;
		padding-top: 0px;
		background-color: white;
	}
	.contenedor-carrito .carrito-producto{
		padding: 10px 0px 0px 20px;	
		margin-bottom: 0px;
	}
	.contenedor-carrito .carrito-producto .row, .contenedor-carrito .carrito-producto .col{
		padding: 0px;
		margin: 0px;
	}
</style>