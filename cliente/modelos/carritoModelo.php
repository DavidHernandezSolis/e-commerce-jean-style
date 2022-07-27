<?php 

require_once "conexion.php";

class ModeloCarrito extends Conexion
{

	public static function agregarCompraModelo($tabla, $datos, $CantidadP){

		if ($CantidadP != NULL) {
			$fechaActual =date("d") . "-" . date("m") . "-" . date("Y");
			$conexion = new Conexion();
			$stmtinsert = $conexion->conectar()->prepare("INSERT INTO $tabla (usuarioId, idProductos, Cantidad, Fechas, Tipo_Pago, Direccion, Correo) VALUES (:usuarioId, :idProductos, :Cantidad, :Fechas, :Tipo_Pago, :Direccion, :Correo )");

		  	$stmtinsert -> bindParam(":usuarioId", $datos["idUsuario"], PDO::PARAM_INT);
		  	$stmtinsert -> bindParam(":idProductos", $datos["idProducto"], PDO::PARAM_INT);
		  	$stmtinsert -> bindParam(":Cantidad", $CantidadP, PDO::PARAM_INT);
		  	$stmtinsert -> bindParam(":Fechas", $fechaActual, PDO::PARAM_STR);
		  	$stmtinsert -> bindParam(":Tipo_Pago",  $datos["tipoPago"], PDO::PARAM_STR);
		  	$stmtinsert -> bindParam(":Direccion",  $datos["direccion"], PDO::PARAM_STR);
		  	$stmtinsert -> bindParam(":Correo",  $datos["correo"], PDO::PARAM_STR);

			$stmtinsert = $stmtinsert -> execute();

		    if ($stmtinsert) {
		  	   return "ok";
		    } else {
		  	   return "error";
		    }

		    $stmtinsert->close();
		    $stmtinsert = NULL;
		}

	}


	public static function restarProductoModelo($tabla, $datos){
		$conexion = new Conexion();
		$stmtinsert = $conexion->conectar()->prepare("UPDATE $tabla SET Cantidad = Cantidad - 1 WHERE idProductos=:idProductos");

		  	$stmtinsert -> bindParam(":idProductos", $datos["idProducto"], PDO::PARAM_INT);

			$stmtinsert = $stmtinsert -> execute();

		    if ($stmtinsert) {
		  	   return "ok";
		    } else {
		  	   return "error";
		    }

		    $stmtinsert->close();
		    $stmtinsert = NULL;
	}



	public static function vaciarCarritoModelo($tabla, $datos){
		$conexion = new Conexion();
		$stmtinsert = $conexion->conectar()->prepare("DELETE FROM $tabla WHERE idUsuario =? AND idProducto=?");

		  	$stmtinsert -> bindParam(1, $datos["idUsuario"], PDO::PARAM_INT);
		  	$stmtinsert -> bindParam(2, $datos["idProducto"], PDO::PARAM_INT);

			$stmtinsert = $stmtinsert -> execute();

		    if ($stmtinsert) {
		  	   return "ok";
		    } else {
		  	   return "error";
		    }

		    $stmtinsert->close();
		    $stmtinsert = NULL;
	}


	public static function sacarCantidadCarritoModelo($tabla, $datos){

		$conexion = new Conexion();
		$stmtinsert = $conexion->conectar()->prepare("SELECT * FROM carrito WHERE idUsuario =? AND idProducto=?");

		  	$stmtinsert -> bindParam(1, $datos["idUsuario"], PDO::PARAM_INT);
		  	$stmtinsert -> bindParam(2, $datos["idProducto"], PDO::PARAM_INT);

			$stmtinsert -> execute();

		  	return $stmtinsert -> fetch();


		    $stmtinsert->close();
		    $stmtinsert = NULL;

	}
	
}
