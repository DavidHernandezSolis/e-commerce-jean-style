<?php 


class ControladorCarrito{

	public static function ctrNuevasCompras($datos){

		
		$modeloCarrito = new ModeloCarrito();
		$respuestaCantidad = $modeloCarrito->sacarCantidadCarritoModelo("carrito", $datos);
		// var_dump($respuestaCantidad);
		$CantidadP = $respuestaCantidad["Catidad"];
		// var_dump($CantidadP);

		$tabla = "compras_online";
		$respuesta =$modeloCarrito->agregarCompraModelo($tabla, $datos, $CantidadP);

		if ($respuesta == "ok") {
			
			$tabla = "productos";
		
			$respuesta2 = $modeloCarrito->restarProductoModelo($tabla, $datos);

			if ($respuesta2 == "ok") {
			
				$tabla = "carrito";
			
				$respuesta3 = $modeloCarrito->vaciarCarritoModelo($tabla, $datos);
				if ($respuesta3 == "ok") {
					$ruta = new Ruta();
					$url =  $ruta->controlRuta();
					
					 echo '
					 	<script>
					 		swal("FELICIDADES POR SU COMPRA", " ", "success");
					 		setTimeout(function () {
					 	        window.location = "'.$url.'";
					 	    }, 800);
					 	</script>
					 ';
				
				}
			}
		}

		

		return $respuesta;

	}




}