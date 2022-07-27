<?php 

require_once "conexion.php";

/**
 * 
 */
class ModeloCliente extends Conexion
{
	
//-----------------------------------
//LISTAR CATEGORIAS
//-----------------------------------
	static public function listarCategoriasModelo($tabla)
	{
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt -> null;

	}

	//-----------------------------------
	//Funcion para manipular las rutas en lalista blanca de categorias
	//-----------------------------------
	static public function rutasCategoriasModelo($tabla, $campo, $valorRuta)
	{	
		
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla WHERE $campo = :Nombres");
		$stmt -> bindParam(":Nombres", $valorRuta, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
		$stmt -> null;
	}

	//-----------------------------------
	//LISTAR productos
	//-----------------------------------
	static public function mostrarProductosModelo($tabla, $idProductosCampo, $idValor)
	{
		$conexion = new Conexion();
		if ($idValor == Null) {
			$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla ");
			$stmt -> execute();
			return $stmt -> fetchAll();
		} else {
			$stmt = $conexion->conectar()->prepare("SELECT P.idProductos, P.No_Codigo, P.Titulo, P.Precio, P.Cantidad, P.Color,P.Talla, P.Oferta, P.Descripcion, P.FotoFrontal, P.Fecha, P.Nuevo, P.FotoLateral, P.FotoTrasera, C.Nombres, M.Nombre FROM $tabla AS P INNER JOIN categorias AS C ON P.idCategorias = C.idCategorias INNER JOIN marca AS M ON P.idMarca = M.idMarca WHERE idProductos = :$idValor");
			$stmt -> bindParam(":".$idValor, $idValor, PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> fetch();
		}
		
		

		$stmt -> close();
		$stmt -> null;

	}
	
	//-----------------------------------
	//Funcion para manipular las rutas en la lista blanca de productos
	//-----------------------------------
	static public function rutasProductosModelo($tabla, $campoProducto, $valorRuta, $idProductos)
	{
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla WHERE $campoProducto = :Nombres && idProductos = :$idProductos");
		$stmt -> bindParam(":Nombres", $valorRuta, PDO::PARAM_STR);
		$stmt -> bindParam(":".$idProductos, $idProductos, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
		$stmt -> null;
	}


	//-----------------------------------
	//LISTAR productos en vitrina de productos
	//-----------------------------------
	static public function mostrarVitrinaProductosModelo($tabla, $idCategoria, $item0, $base, $tope)
	{
		$conexion = new Conexion();
		if ($idCategoria == Null) {
			$stmt = $conexion->conectar()->prepare("SELECT * FROM productos WHERE $item0 != 0 LIMIT  $base, $tope");
			$stmt -> execute();
			return $stmt -> fetchAll();
			
		} else {
			$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla WHERE idCategorias = :$idCategoria LIMIT  $base, $tope");
			$stmt -> bindParam(":".$idCategoria, $idCategoria, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}

		$stmt -> close();
		$stmt -> null;
	}

	

	//-----------------------------------
	//LISTAR marcas
	//-----------------------------------
	static public function mostrarMarcasModelo($tabla)
	{
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla ");
		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
		$stmt -> null;
	}




	//-----------------------------------
	//LISTAR productos en vitrina de productos
	//-----------------------------------
	static public function listarProductosModelo($tabla, $item01, $idCategoria, $item0)
	{
		$conexion = new Conexion();
		if ($idCategoria == Null) {
			$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla WHERE $item0 != 0  ");
			$stmt -> execute();
			return $stmt -> fetchAll();
			
		} else {
			$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla WHERE idCategorias = :$idCategoria");
			$stmt -> bindParam(":".$idCategoria, $idCategoria, PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}

		$stmt -> close();
		$stmt -> null;
	}


	//-----------------------------------
	//AGREGAR PRODUCTO A CARRITO
	//-----------------------------------
	static public function agregarCarritoModelo($tabla, $datosCarrito){

		$idUser = $datosCarrito["idUser"];
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM `carrito` WHERE  idUsuario = ? && idProducto = ? ");
		$stmt -> bindParam(1, $idUser);
		$stmt -> bindParam(2, $datosCarrito["idPro"]);
		$stmt -> execute();
		

		if ($stmt->rowCount() > 0) {

			echo "existe";

			$stmt =$stmt -> fetch();
			//var_dump($stmt);
			$stmt ="";

			// $cantidadCarrito = self::cantidadCarritoModelo("carrito", $idUser);


		}else{

			// echo "No existe ningun";
			// var_dump($stmt->rowCount());

			$stmtinsert = $conexion->conectar()->prepare("INSERT INTO carrito (Catidad, PrecioTotal, PrecioUno, idUsuario, idProducto) VALUES (?, ?, ?, ?, ?)");

		  	$stmtinsert -> bindParam(1, $datosCarrito["cantidadPro"]);
		  	$stmtinsert -> bindParam(2, strval($datosCarrito["precioTotalPro"]));
		  	$stmtinsert -> bindParam(3, strval($datosCarrito["precioUnoPro"]));
		  	$stmtinsert -> bindParam(4, $idUser);
		  	$stmtinsert -> bindParam(5, $datosCarrito["idPro"]);
			$stmtinsert = $stmtinsert -> execute();
		     if ($stmtinsert == true) {
		  	   echo "exitoso";

		     } else {
		  	   echo "fallo";
		     }
		    $stmtinsert = Null;

		    // $cantidadCarrito = self::cantidadCarritoModelo("carrito", $idUser);
		}

		
	}


	//-----------------------------------
	//CONSULTA LA CANTIDDA DE PRODUCTOS EN CARRITO DEL USUARIO
	//-----------------------------------
	static public function cantidadCarritoModelo($tabla, $idUser){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM `carrito` WHERE  idUsuario = ?");
		$stmt -> bindParam(1, $idUser);
		$stmt -> execute();

		echo($stmt->rowCount());

		$stmt = null;
	}


	//-----------------------------------
	//CONSULTANDO EL CARIITO DE COMPRAS
	//-----------------------------------
	static public function carritoProductosModelo($tabla, $idUsuario){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT C.idCarrito, C.Catidad, C.PrecioTotal, C.PrecioUno, C.idUsuario, C.idProducto, P.idProductos, P.Titulo, P.FotoFrontal FROM $tabla AS C INNER JOIN productos AS P ON C.idProducto = P.idProductos WHERE idUsuario = :idUsuario");
		
		$stmt -> bindParam(":idUsuario", $idUsuario);

		$stmt -> execute();
		return $stmt -> fetchAll();


		$stmt -> close();
		$stmt -> null;
	}


	//-----------------------------------
	//CONSULTANDO LOGIN
	//-----------------------------------
	static public function loginModelo($tabla, $user, $pass){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM `usuario` WHERE  Correo = ? AND Contrasena = ? ");
		$stmt -> bindParam(1, $user, PDO::PARAM_STR);
		$stmt -> bindParam(2, $pass, PDO::PARAM_STR);

		$stmt -> execute();


		return $stmt -> fetch();


		$stmt -> close();
		$stmt = null;
	 }



	//-----------------------------------
	//CONSULTANDO LOGIN ADMIN
	//-----------------------------------
	static public function loginAdminModelo($tabla, $Nombre, $Contrasena){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla WHERE  Nombre = ? AND Contrasena = ? ");
		$stmt -> bindParam(1, $Nombre, PDO::PARAM_STR);
		$stmt -> bindParam(2, $Contrasena, PDO::PARAM_STR);

		$stmt -> execute();


		return $stmt -> fetch();


		$stmt -> close();
		$stmt = null;
	 }

	//-----------------------------------
	//Funcion para registro de usuarios
	//-----------------------------------
	 public function registroModelo($tabla, $DatosControl){
		$conexion = new Conexion();
	 	$stmt = $conexion->conectar()->prepare("SELECT * FROM `usuario` WHERE  Correo = ? AND Contrasena = ? ");
		$stmt -> bindParam(1, $DatosControl["correo"]);
		$stmt -> bindParam(2, $DatosControl["contra1"]);
	 	$stmt -> execute();

	 	if ($stmt->rowCount() < 1){

	 		$stmtinsert = $conexion->conectar()->prepare("INSERT INTO `usuario` (`Nombre`, `Apellido`, `Correo`, `Contrasena`, `Domicilio`, `Colonia`, `Calle`, `Telefono`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

		  	$stmtinsert -> bindParam(1, $DatosControl["nombre"]);
		  	$stmtinsert -> bindParam(2, $DatosControl["apellido"]);
		  	$stmtinsert -> bindParam(3, $DatosControl["correo"]);
		  	$stmtinsert -> bindParam(4, $DatosControl["contra1"]);
		  	$stmtinsert -> bindParam(5, $DatosControl["municipio"]);
		  	$stmtinsert -> bindParam(6, $DatosControl["colonia"]);
		  	$stmtinsert -> bindParam(7, $DatosControl["calle"]);
		  	$stmtinsert -> bindParam(8, $DatosControl["telefono"]);

			$stmtinsert = $stmtinsert -> execute();

		    if ($stmtinsert == true) {
		  	   return "true";
		    } else {
		  	   return "falso";
		    }

		    $stmtinsert = Null;
	 		
	 	}else{
	 		return "existe";
	 	}

	}



	//-----------------------------------
	//AGREGAR PRODUCTO A CARRITO Button Comprar
	//-----------------------------------
	static public function datosButonComprarCarritoModelo($tabla, $datosButonComprar){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM `carrito` WHERE  idUsuario = ? && idProducto = ? ");
		$stmt -> bindParam(1, $datosButonComprar["idUser"]);
		$stmt -> bindParam(2, $datosButonComprar["idProducto"]);
		$stmt -> execute();
		


		if ($stmt->rowCount() > 0) {

			echo "existe";
			$stmt = null;

		}else{

			$stmtinsert = $conexion->conectar()->prepare("INSERT INTO carrito (Catidad, PrecioTotal, PrecioUno, idUsuario, idProducto) VALUES (?, ?, ?, ?, ?)");

		  	$stmtinsert -> bindParam(1, $datosButonComprar["cantidad"]);
		  	$stmtinsert -> bindParam(2, strval($datosButonComprar["precioTotal"]) );
		  	$stmtinsert -> bindParam(3, strval($datosButonComprar["precioUno"]) );
		  	$stmtinsert -> bindParam(4, $datosButonComprar["idUser"]);
		  	$stmtinsert -> bindParam(5, $datosButonComprar["idProducto"]);
			$stmtinsert = $stmtinsert -> execute();
		    if ($stmtinsert == true) {
		  	  echo "exitoso";

		    } else {
		  	  echo "fallo";
		    }

		    $stmtinsert = Null;

		}
	
	}



	//-----------------------------------
	//ELIMINAR PRODUCTO DEL CARRITO DE COMPRAS
	//-----------------------------------
	static public function butonEliminarCarritoModelo($tabla, $idCarrito){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("DELETE FROM $tabla WHERE idCarrito = :idCarrito");

		$stmt -> bindParam(":idCarrito", $idCarrito, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			echo "Elimino";
		}else{
			echo "Fallo";
		}
		
		$stmt = NULL;
	
	}
	static public function buscarVitrinaProductosModelo($tabla, $busqueda, $base, $tope){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla WHERE  Titulo like '%$busqueda%' OR Descripcion like '%$busqueda%' ORDER BY idProductos DESC LIMIT $base, $tope");

		$stmt -> execute();
		return $stmt -> fetchAll();


		$stmt -> close();
		$stmt = null;

		
	}


	static public function listarBusquedaProductosModelo($tabla, $busqueda){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla WHERE  Titulo like '%$busqueda%' OR Descripcion like '%$busqueda%' ORDER BY idProductos DESC");
		$stmt -> execute();
		return $stmt -> fetchAll();


		$stmt -> close();
		$stmt = null;

		
	}




	#este

	//-----------------------------------
	//CONSULTANDO de compas como historial
	//-----------------------------------
	static public function historialComprasOnlineModelo($tabla, $idUsuario){
		$conexion = new Conexion();
		$stmt = $conexion->conectar()->prepare("SELECT C.usuarioId, C.idProductos, C.Cantidad, C.Fechas, P.idProductos, P.Titulo, P.Precio FROM $tabla AS C INNER JOIN productos AS P ON C.idProductos = P.idProductos WHERE usuarioId = :idUsuario");
		
		$stmt -> bindParam(":idUsuario", $idUsuario);

		$stmt -> execute();
		return $stmt -> fetchAll();


		$stmt -> close();
		$stmt -> null;
	}


}
