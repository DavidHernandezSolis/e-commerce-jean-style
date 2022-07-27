<?php 
	$ruta = new Ruta();
	$url =  $ruta->controlRuta();

	$urlAdmin = $ruta->controlRutaAdmin();
?>
<script type="text/javascript" src="<?php echo $url ?>vistas/js/eliminarDeCarrito.js"></script>
 
<div class="contenedor-carrito fuente-letra">
	<div class="row ">
		<div class="col s12 m10 offset-m1 l8  offset-l2 cuerpo-carrito">
			<?php 
				echo '
					<div class="row " style=" padding-top: 15px; background-color: #e4e0e040;padding-bottom: 10px;">
						<div class="col s" >
							<a href="'.$url.'"><span class="block black-text font-estilo" >Inicio</span></a>
							<span>&nbsp; / &nbsp;</span>
							
						</div> 
						<div class="col s6" >
							<span class="block black-text center-align carrito-titulo" style="font-size: 25px;"> CARRITO DE COMPRAS</span>
						</div> 
					</div>				
				';

/*---------- inicia Dandole valor al id con valor de usuario ingresado ----------*/
					if (isset($_SESSION["validarSesion"])) {

			  			if ($_SESSION["validarSesion"] == "ok") {

			  				$idUsuario = $_SESSION["idUser"];

			  			}

			  		}else{
			  			$idUsuario = 0;
			  		}
/*---------- Termina Dandole valor al id con valor de usuario ingresado ----------*/

				$controladorCliente = new ControladorCliente();
				$infoProducto = $controladorCliente->carritoProductosControl($idUsuario);
				//var_dump($infoProducto);
				$i = 0;
				$PrecioCompleto = 0;
				foreach ($infoProducto as $key => $value) {
					$i++;
					$PrecioCompleto += $value["PrecioTotal"];
					//echo($PrecioTotal);
					//var_dump($value);
					echo '
						<div class="row carrito-producto">
							<div class="col s12 " style="margin-bottom: 10px;"><b>No. '.$i.'</b></div>
							<div class="col s12 m3 l3"><img src="'.$urlAdmin.$value["FotoFrontal"].'" class="imagen responsive-img"></div>
							<div class="col s12 m6 l6  segunda">
								<div class="row " style="margin-bottom: 15px;">
									<input type="hidden" name="txtId" class="txtIdCarrito" id="txtId" value="'.$value["idCarrito"].'">
									<input type="hidden" class="idProducto" name="txtIdPro" id="txtIdPro" value="'.$value["idProductos"].'">

									<span class="col s9 m12"><h6 class="titulo" >'.$value["Titulo"].'</h6></span>
									
									<div class=" col s3 show-on-small hide-on-med-and-up" style="margin-top: 10px;">


										<!-- EL value DEL BUTTON btnEliminar SE USA PARA COLOCAR EL ID DEl carrito correspondiente al producto que se desea eliminar, PUEDE HACERSE LO MISMO CON TODOS LOS ATRIBUTOS COMO NAME, ID.   Causo problemas con los demas butones existentes-->
										 <button type="Button" class="btn btnEliminar" name="btnEliminar" value="'.$value["idCarrito"].'"> Eliminar </button>


									</div>
								</div>
								<div class="row cantidad">
									<div class="col s12 m5 l5">
										<span>Cantidad:</span>
										<span class="cantidadPro"> '.$value["Catidad"].'</span>
									</div>
									<div class="col s0 m2 l1 hide-on-small-only show-on-medium-and-up"> 


										<!-- EL value DEL BUTTON btnEliminar SE USA PARA COLOCAR EL ID DEl carrito correspondiente al producto que se desea eliminar, PUEDE HACERSE LO MISMO CON TODOS LOS ATRIBUTOS COMO NAME, ID.-->
										<button type="Button" class="btn btnEliminar" name="btnEliminar" value="'.$value["idCarrito"].'"> Eliminar </button>


										
									</div>
								</div>
							</div>
							<div class="col s5 m3 l2">
								<div class="row">
									<div class="col s12 left-align total" style="">


										<input type="hidden" class="precioUno" name="txtPrecioUno" id="txtPrecioUno" value=" '.$value["PrecioUno"].'">


										<span><h5>$ : <small class="precioCompra">'.$value["PrecioTotal"].'</small></h5></span>
									</div>
								</div>
							</div>
						</div>
						<hr>
					';
				}

				echo '<input type="hidden" class="numeroProductos" value=" '.$i.'">';

				if (isset($_SESSION["validarSesion"])) {

					if ($_SESSION["validarSesion"] == "ok" && $i >0) {

						echo '
							<div class="row">
								<div class="col s5 right-align"><h5>Total:</h5> </div>
								<div class="col s5 right-align" style="margin-left:  30px;">
									<h5>
										$ <small class="precioCompraTotal">'.$PrecioCompleto.'</small>
									</h5>
								</div>
								<input type="hidden" name="precioTodo" id="precioTodo" value="'.$PrecioCompleto.'">
							</div>
							<div class="row right-align">
								<div class="col s11 right-align">
								<input type="Button" class="btn btnPagar" name="btnEnviar" value="Pagar por PayPal"> 
								</div>
							</div>
						';
					}

				}
				

			?>
			
			<!-- <a href="'/*.$url.*/'configuracionEnvio" type="Button" class="btn btnSiguiente waves-effect" >Siguiente</a> -->
			
			
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
	.contenedor-carrito .carrito-producto .imagen{
		min-width: 70px;
		max-width: 120px;
	}
	.contenedor-carrito .carrito-producto .btnEliminar{
		
		font-size: 15px;
		border-style: none;
	}
	.contenedor-carrito .carrito-producto .total{
		margin-bottom:0px; margin-top: 40px;
	}
	.contenedor-carrito .carrito-producto input{
		width: 30%;
	}


.contenedor-carrito .btnSiguiente{
	margin-right: 30px;
}

	@media(max-width: 600px){
      	.contenedor-carrito .carrito-producto .imagen{
			min-width: 60px;
			max-width: 90px;
		}
		.contenedor-carrito .carrito-producto .total{
			margin-bottom:0px; margin-top: 0px;
		}
		.contenedor-carrito .carrito-producto .cantidad, .contenedor-carrito .carrito-producto .total{
		 	margin-top: -15px;
		}
		.contenedor-carrito .carrito-producto input{
			width: 15%;
		}
		.contenedor-carrito .btnSiguiente{
			margin-right: 0px;
		}
    }

    @media(min-width:  601px) and  (max-width:  992px) {
      	
		.contenedor-carrito .carrito-producto .segunda{
			padding-left: 18px;
		}
		.contenedor-carrito .btnSiguiente{
			margin-right: 0px;
		}

    }
</style>