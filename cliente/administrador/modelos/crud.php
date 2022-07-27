<?php 
require_once "conexion.php";

class Datos extends Conexion{
	

	public function registrarProductosCRUD($datosControlardor, $tabla){
		$stmt = Conexion::conectar()-> prepare("INSERT INTO $tabla (No_Codigo, Titulo, Precio,PrecioProveedor, Cantidad, Color, Talla, Oferta, Descripcion, FotoFrontal, idMarca, idCategorias, Fecha, Nuevo, FotoLateral, FotoTrasera, Publicidad,PublicidadBaner) VALUES (:guardarCodigo, :guardarTitulo,:guardarPrecioPubli,:guardarPrecioProvee,:guardarCantidad,:guardarcolor,:guardarTalla,:guardarOferta,:guardarDescripcion,:guardarimagen1,:guardarMarca,:guardarCategoria,:guardarFecha,1,:guardarimagen2,:guardarimagen3,:guardargeneral,:guardarbaner)");

			$stmt -> bindparam(":guardarCodigo", $datosControlardor['codigo'], PDO::PARAM_INT);
			$stmt -> bindparam(":guardarTitulo", $datosControlardor['Titulo'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarFecha", $datosControlardor['Fecha'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarCategoria", $datosControlardor['Categoria'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarTalla", $datosControlardor['Talla'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarMarca", $datosControlardor['Marca'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarcolor", $datosControlardor['color'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarCantidad", $datosControlardor['Cantidad'], PDO::PARAM_INT);
			$stmt -> bindparam(":guardarPrecioProvee", $datosControlardor['PrecioProvee'], PDO::PARAM_INT);
			$stmt -> bindparam(":guardarPrecioPubli", $datosControlardor['PrecioPubli'], PDO::PARAM_INT);
			$stmt -> bindparam(":guardarDescripcion", $datosControlardor['Descripcion'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarOferta", $datosControlardor['Oferta'], PDO::PARAM_STR);

			$stmt -> bindparam(":guardarimagen1", $datosControlardor['imagen1']);

			$stmt -> bindparam(":guardarimagen2", $datosControlardor['imagen2']);
			$stmt -> bindparam(":guardarimagen3", $datosControlardor['imagen3']);

			$stmt -> bindparam(":guardarbaner", $datosControlardor['baner']);
			$stmt -> bindparam(":guardargeneral", $datosControlardor['general']);



		if ($stmt -> execute()) {
			return "success";
		}else{
			return "error";
		}
	}

	static public function listaCategoriaCrud($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt -> null;
	}

	static public function listaMarcaCrud($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchAll();
		$stmt -> close();
		$stmt -> null;
	}

	#visualizar tabla Productos
	#-------------------------------------
	public function visualizarProductosCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla WHERE Cantidad != 0 ORDER BY idProductos DESC");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}

	

	#Eliminar PRODUCTOS
	#-------------------------------------
	public function BorrarProductosCrud($datosModel,$tabla){

		$stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla WHERE idProductos=:guardarID");

		$stmt -> bindparam(":guardarID", $datosModel,PDO::PARAM_INT);

		if ($stmt-> execute()) {
			return "success";
		} else {
		 return "Error";
		}
		$stmt-> close();
		
	}
	

	#EDITAR PRODUCTOS
	#-------------------------------------
	public function EditarProductosCRUD($datosModel,$tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT P.idProductos,
			P.No_Codigo, P.Titulo, P.Precio, P.PrecioProveedor, P.Cantidad, P.Color, P.Talla, P.Oferta, P.Descripcion, P.FotoFrontal, P.idMarca, P.idCategorias, P.Fecha, P.Nuevo, P.FotoLateral, P.FotoTrasera, P.Publicidad, P.PublicidadBaner,
			M.idMarca, M.Nombre, 
			C.idCategorias, C.Nombres FROM $tabla AS P INNER JOIN marca 
		AS M ON P.idMarca = M.idMarca  INNER JOIN categorias AS C ON P.idCategorias = C.idCategorias WHERE idProductos = :id  ");
		
		$stmt -> bindparam(":id", $datosModel, PDO::PARAM_INT);

		$stmt-> execute();
		


		#Para que me devuelva todo las filas 

		return $stmt -> fetch();
		$stmt->close();
	}

	

#actualizar el pruductos UPDATE
	#-----------------------------------------------------
	public function ActualizarProductosCRUD($datosModel,$tabla){



		$stmt = Conexion::conectar()-> prepare("UPDATE $tabla SET No_Codigo=:guardarCodigo,Titulo=:guardarTitulo,Precio=:guardarPrecioPubli,PrecioProveedor=:guardarProvee,Cantidad=:guardarCantidad ,Color = :guardarcolor ,Talla=:guardarTalla ,Oferta=:guardarOferta,Descripcion=:guardarDescripcion,idMarca=:guardarMarca,idCategorias=:guardarCategoria,Fecha=:guardarFecha,FotoFrontal=:guardarnimagen1, FotoLateral=:guardarnimagen2,FotoTrasera=:guardarnimagen3 WHERE idProductos=:guardarID");

		
		$stmt -> bindparam(":guardarID", $datosModel['idid'], PDO::PARAM_INT);
		$stmt -> bindparam(":guardarCodigo", $datosModel['Codigo'], PDO::PARAM_INT);
		$stmt -> bindparam(":guardarTitulo", $datosModel['Titulo'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarFecha", $datosModel['Fecha'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarCategoria", $datosModel['Categoria'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarTalla", $datosModel['Talla'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarMarca", $datosModel['Marca'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarcolor", $datosModel['color'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarCantidad", $datosModel['Cantidad'], PDO::PARAM_INT);
		$stmt -> bindparam(":guardarProvee", $datosModel['Provee'], PDO::PARAM_INT);
		$stmt -> bindparam(":guardarPrecioPubli", $datosModel['PrecioPubli'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarDescripcion", $datosModel['Descripcion'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarOferta", $datosModel['Oferta'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarnimagen1", $datosModel['nimagen1'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarnimagen2", $datosModel['nimagen2'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarnimagen3", $datosModel['nimagen3'], PDO::PARAM_STR);




		if ($stmt -> execute()) {
			return "success";
		}else{
			return "error";
		}

		$stmt-> close();



	}

	#visualizar tabla USUARIOS Registrados
	#-------------------------------------
	public function visualizarClientesCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla ORDER BY idUsuario DESC");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}


	#EDITAR tabla USUARIOS Registrados
	#-------------------------------------
	public function EditarUsuariosCRUD($datosModel,$tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT idUsuario, Nombre, Apellido, Correo, Domicilio, Telefono FROM $tabla WHERE idUsuario = :id  ");
		
		$stmt -> bindparam(":id", $datosModel, PDO::PARAM_INT);

		$stmt-> execute();


		#Para que me devuelva todo las filas 

		return $stmt -> fetch();
		$stmt->close();
	}


	#actualizar el Usuario 123
	#-----------------------------------------------------
	public function ActualizarsuariosSCRUD($datosModel,$tabla){
		$stmt = Conexion::conectar()-> prepare("UPDATE $tabla SET 
			Nombre= :guardarNombre,Apellido= :guardarApellido,Correo=:guardarCorreo,Domicilio=:guardarDomicilio,Telefono=:guardarTelefono WHERE idUsuario=:guardarId");

		$stmt -> bindparam(":guardarId", $datosModel['idUsuario'], PDO::PARAM_INT);
		$stmt -> bindparam(":guardarNombre", $datosModel['Nombre'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarApellido", $datosModel['Apellido'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarCorreo", $datosModel['correo'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarDomicilio", $datosModel['Direccion'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarTelefono", $datosModel['Telefono'], PDO::PARAM_STR);


		if ($stmt -> execute()) {
			return "success";
		}else{
			return "error";
		}

		$stmt-> close();



	}




		#visualizar tabla clientes Activos
	#-------------------------------------
	public function visualizarClientesACTIVOSCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}


		#visualizar tabla ventas fisicas
	#-------------------------------------
	public function visualizarVentasFisicasCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}

			#visualizar tabla ventas online
	#-------------------------------------
	public function visualizarVentasOnlineCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}

		#visualizar tabla Categorias
	#-------------------------------------
	public function visualizarCategoriasCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}


	#Registrar Categorrias
	#--------------------------------------------------------
	public function registrarCategoriaCRUD($InsertarCategoria, $tabla){
		$stmt = Conexion::conectar()-> prepare("INSERT INTO $tabla (Nombres, Descripcion, icono) VALUES (:guardarNombre,:guardarDescripcion, :guardarimagen)");

			$stmt -> bindparam(":guardarNombre", $InsertarCategoria['codigo'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarDescripcion", $InsertarCategoria['Titulo'], PDO::PARAM_STR);
			
			$stmt -> bindparam(":guardarimagen", $InsertarCategoria['imgCategoria'], PDO::PARAM_STR);
			//$stmt -> bindparam(":guardarArchivo", $InsertarCategoria['Archivo'], PDO::PARAM_STR	);
			



		if ($stmt -> execute()) {
			return "success<br>";
		}else{
			return "error<br>";
		}
	}

	#Editar tabla Categria Para sellecionar ID
	#-------------------------------------
	public function EditarCategoriasEstaEnCRUD($datosModel, $tabla){
	
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla WHERE idCategorias = :idGuardar  ");
		
		$stmt -> bindparam(":idGuardar", $datosModel, PDO::PARAM_INT);

		$stmt-> execute();


		#Para que me devuelva todo las filas 

		return $stmt -> fetch();
		$stmt->close();
	
	}


	#actualizar el categorias consulta UPDATE
	#-----------------------------------------------------
	public function ActualizarCategoriasCRUD($datosModel,$tabla){

	
		$stmt = Conexion::conectar()-> prepare("UPDATE $tabla SET 
			Nombres=:guardarNombreCate,
			Descripcion=:guardarDescripcion,
			icono=:guardarImgRuta 
			WHERE idCategorias=:guardarIDCategoria");

		
		$stmt -> bindparam(":guardarIDCategoria", $datosModel['idCategoria'], PDO::PARAM_INT);
		$stmt -> bindparam(":guardarNombreCate", $datosModel['NombreCate'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarDescripcion", $datosModel['nombreDescriCate'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarImgRuta", $datosModel['ImgRuta']);







		if ($stmt -> execute()) {
			return "success";
		}else{
			return "error";
		}

		$stmt-> close();



	}





	#Registrar MARCA
	#--------------------------------------------------------
	public function registrarMarcaCRUD($InsertarCategoria, $tabla){
		$stmt = Conexion::conectar()-> prepare("INSERT INTO $tabla (Nombre, Proveedor, Descripcion,icono) VALUES (:guardarNombre,:guardarProveedor,:guardarDescripcion, :guardarimagen)");

			$stmt -> bindparam(":guardarNombre", $InsertarCategoria['marca'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarProveedor", $InsertarCategoria['proveedor'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarDescripcion", $InsertarCategoria['descripcion'], PDO::PARAM_STR);
			$stmt -> bindparam(":guardarimagen", $InsertarCategoria['imagenGuardar']);
			

			


		if ($stmt -> execute()) {
			var_dump($stmt);
			return "success<br>";
		}else{
			return "error<br>";
		}
	}


		#visualizar tabla marcas
	#-------------------------------------
	public function visualizarMarcasCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}

			#Editar tabla marcas
	#-------------------------------------
	public function EditarMarcaEstaEnCRUD($datosModel, $tabla){
	
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla WHERE idMarca = :idGuardar  ");
		$stmt -> bindparam(":idGuardar", $datosModel, PDO::PARAM_INT);

		$stmt-> execute();
		#Para que me devuelva todo las filas 

		return $stmt -> fetch();
		$stmt->close();
	
	}


#actualizar el MARCAS UPDATE
	#-----------------------------------------------------
	public function ActualizarMarcasCRUD($datosModel,$tabla){

		

		$stmt = Conexion::conectar()-> prepare("UPDATE $tabla SET Nombre=:guardarMarca,Proveedor=:guardarProveedor,Descripcion=:guardarDescripcion,icono=:guardarImgRuta WHERE idMarca=:guardarIDMarca");


		
		$stmt -> bindparam(":guardarIDMarca", $datosModel['idMarca'], PDO::PARAM_INT);
		$stmt -> bindparam(":guardarMarca", $datosModel['NombreMarca'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarDescripcion", $datosModel['nombreDescripcion'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarProveedor", $datosModel['nombreProveedor'], PDO::PARAM_STR);
		$stmt -> bindparam(":guardarImgRuta", $datosModel['ImgRuta']);




		if ($stmt -> execute()) {
			return "success";
		}else{
			return "error";
		}

		$stmt-> close();



	}


	#Eliminar marca
	#-------------------------------------
	public function BorrarMarcaCrud($datosModel,$tabla){

		$stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla WHERE idMarca=:guardarID");

		$stmt -> bindparam(":guardarID", $datosModel,PDO::PARAM_INT);

		if ($stmt-> execute()) {
			return "success";
		} 
		$stmt-> close();
		
	}

		#Eliminar Categoria
	#-------------------------------------
	 public function BorrarCategoriaCrud($datosModel,$tabla){

		$stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla WHERE idCategorias=:guardarID");

		$stmt -> bindparam(":guardarID", $datosModel,PDO::PARAM_INT);

		if ($stmt-> execute()) {
			return "success";
		} 
		$stmt-> close();
		
	}

	#Eliminar Categoria
	#-------------------------------------
	 public function BorrarVentasOnlineCrud($datosModel,$tabla){

		$stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla WHERE idCompras=:guardarID");

		$stmt -> bindparam(":guardarID", $datosModel,PDO::PARAM_INT);

		if ($stmt-> execute()) {
			return "success";
		} 
		$stmt-> close();
		
	}
	
	
	#Eliminar Productos
	#-------------------------------------
	public function BorrarProductoCrud($datosModel,$tabla){

		$stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla WHERE id=:guardarID");

		$stmt -> bindparam(":guardarID", $datosModel,PDO::PARAM_INT);

		if ($stmt-> execute()) {
			return "success";
		} else {
		
		
		return "error";
		
		}
		$stmt-> close();
		
	}

	#Visualizaer Venta Gral
	#-------------------------------------
	 public function VentaSalidaCRUD($datosModel,$tabla){
	 	#idMarca`, `Nombre`, `Proveedor`, `Descripcion`, `icono
		$stmt = Conexion::conectar()-> prepare("SELECT P.idProductos,
			P.No_Codigo, P.Titulo, P.Precio, P.PrecioProveedor, P.Cantidad, P.Color, P.Talla, P.Oferta, P.Descripcion, P.FotoFrontal, P.idMarca, P.idCategorias, P.Fecha, P.Nuevo, P.FotoLateral, P.FotoTrasera, P.Publicidad, P.PublicidadBaner,
			M.idMarca, M.Nombre, 
			C.idCategorias, C.Nombres FROM $tabla AS P INNER JOIN marca 
		AS M ON P.idMarca = M.idMarca  INNER JOIN categorias AS C ON P.idCategorias = C.idCategorias WHERE No_Codigo = :id  ");
		
		$stmt -> bindparam(":id", $datosModel, PDO::PARAM_INT);

		$stmt-> execute();
		//echo $stmt->rowCount();

		if ($stmt->rowCount() > 0) {
			#Para que me devuelva todo las filas 
			return $stmt -> fetch();
		} else {
		 	return  "error";
		}
		
		


		
		$stmt = Null;
		
	}


	#tabla para visualizar temporal productos
	#--------------------------------------------------
	#Visualizaer Venta Gral
	#-------------------------------------
	public function TempVentaSalidaCRUD($tabla, $info){
		$stmt = Conexion::conectar()-> prepare("SELECT P.idProductos,
			P.No_Codigo, P.Titulo, P.Precio, P.PrecioProveedor, P.Cantidad, P.Color, P.Talla, P.Oferta, P.Descripcion, P.FotoFrontal, P.idMarca, P.idCategorias, P.Fecha, P.Nuevo, P.FotoLateral, P.FotoTrasera, P.Publicidad, P.PublicidadBaner,
			M.idMarca, M.Nombre, 
			C.idCategorias, C.Nombres FROM $tabla AS P INNER JOIN marca 
		AS M ON P.idMarca = M.idMarca  INNER JOIN categorias AS C ON P.idCategorias = C.idCategorias WHERE idProductos=:idProductos ");

		$stmt -> bindparam(":idProductos", $info, PDO::PARAM_INT);
		
		

		$stmt-> execute();
		//echo $stmt->rowCount();

		 if ($stmt->rowCount() > 0) {
			#Para que me devuelva todo las filas 
			return $stmt -> fetch();
		} else {
		 	return  "error";
		}
		
		


		
		$stmt = Null;
		
	}

	#ingresarDatosTeporal
	#------------------------------

	#`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6])
	
	public function InsertarTemporalCRUD($datosModel,$tabla){

		$stmt = Conexion::conectar()-> prepare(" INSERT INTO
			$tabla (Titulo,marca, categoria, talla, precio, cantidad,idProducto,PrecioProveedor,fecha,cantidadTotal) VALUES (:GTituloSalida,:GMarcaSalida,:GCategoriaSalida ,:GTallaSalida,:GPrecioSalida,:GCantidadSalida,:GidProductoSalida,:GPrecioProveedor,:Gfecha,:GCantidadTotal)
		 ");
		
		
		$stmt -> bindparam(":GidProductoSalida", $datosModel['idProductoSalida']);
		$stmt -> bindparam(":GMarcaSalida", $datosModel['MarcaSalida'], PDO::PARAM_STR);
		 $stmt -> bindparam(":GTituloSalida", $datosModel['TituloSalida'], PDO::PARAM_STR);

		
		 $stmt -> bindparam(":GCategoriaSalida", $datosModel['CategoriaSalida'], PDO::PARAM_STR);
		 $stmt -> bindparam(":GTallaSalida", $datosModel['TallaSalida'], PDO::PARAM_STR);
		 $stmt -> bindparam(":GPrecioSalida", $datosModel['PrecioSalida'], PDO::PARAM_INT);
		 $stmt -> bindparam(":GPrecioProveedor", $datosModel['precioProveedor'], PDO::PARAM_INT);
		 
		 $stmt -> bindparam(":GCantidadSalida", $datosModel['CantidadSalida'], PDO::PARAM_INT);
		 $stmt -> bindparam(":Gfecha", $datosModel['fecha'], PDO::PARAM_STR);
		 
		  $stmt -> bindparam(":GCantidadTotal", $datosModel['CantidadTotal'], PDO::PARAM_INT);
		


		if ($stmt -> execute()) {
			echo "EXITO";
		}else{
			echo  "error";
		}

		} 
		
	
		#visualizar tabla temporal de venta 
	#-------------------------------------------
	public function visualizarTablaTemporalCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}

	#visualizar count
	#-------------------------------------------
	public function visualizarTablaTemporalCOUNT_CRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT  SUM(cantidad) FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetch();
	}


	
	#visualizar SUM para sumar
	#-------------------------------------------
	public function visualizarTablaTemporalSUM_CRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT SUM(cantidadTotal)  FROM $tabla");
		$stmt-> execute();
		#Para que me devuelva todo las filas 
		return $stmt -> fetch();
	}


	#visualizar SUM para sumar ventas fisicas
	#-------------------------------------------
	public function sumarVentasFisicas_CRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT SUM(PrecioTotal)  FROM $tabla");
		$stmt-> execute();
		#Para que me devuelva todo las filas 
		return $stmt -> fetch();
	}

	#visualizar SUM para LAS GANACIAS 
	#-------------------------------------------
	public function sumarGANANCIIAS_CRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT SUM(PrecioProveedor)  FROM $tabla");
		$stmt-> execute();
		#Para que me devuelva todo las filas 
		return $stmt -> fetch();
	}
		
	#visualizar la ganacia de la tienda fisica
	#--------------------------------------------------------
	public function sumarProveedor_CRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT SUM(PrecioProveedor)  FROM $tabla");
		$stmt-> execute();
		#Para que me devuelva todo las filas 
		return $stmt -> fetch();
	}

	
	#consulta para eliminar todos los datos de la tabla temporal
	#----------------------------------------------------------------
	public function DELETE_tablaTemporal_CRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		
		if ($stmt-> execute()) {
			return "success";
		} else {
			 return "error";
		}
		
	}


	#consulta para eliminar todos los datos de la tabla temporal
	#----------------------------------------------------------------
	public function eliminarProductosLocal_CRUD($tabla, $idVenta){
		$stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla WHERE idVenta=:idVenta");
		$stmt -> bindparam(":idVenta", $idVenta, PDO::PARAM_INT);
		$stmt-> execute();

		#Para que me devuelva todo las filas 		
		if ($stmt-> execute()) {
			return "success";
		} else {
			 return "error";
		}
		
	}

	#Respaldo de datos de una tabla
	#----------------------------------------------------------------
	public function Respaldo_CRUD($tabla){

		#`, ``, ``,

		$stmt = Conexion::conectar()-> prepare("INSERT INTO com_fisica_new (com_fisica_new.Titulo, com_fisica_new.Marca, com_fisica_new.Categoría, com_fisica_new.Talla, com_fisica_new.Cantidad, com_fisica_new.Precio, com_fisica_new.PrecioProveedor, com_fisica_new.fecha , com_fisica_new.PrecioTotal ) SELECT ventalocal.Titulo, ventalocal.marca, ventalocal.categoria, ventalocal.talla, ventalocal.cantidad, ventalocal.precio,ventalocal.PrecioProveedor,ventalocal.fecha, ventalocal.cantidadTotal FROM $tabla");
		//$stmt-> execute();

		#Para que me devuelva todo las filas 

		
		if ($stmt-> execute()) {
			return "success";
		} else {
			 return "error";
		}
		
	}




	public static function obtenerProductos($tabla){

		$stmt = Conexion::conectar()-> prepare("SELECT *  FROM $tabla");
		$stmt-> execute();

		#Para que me devuelva todo las filas 

		return $stmt -> fetchAll();
	}

	public static function descontarProductos($tabla, $idProductos, $cantidad){

		$stmt = Conexion::conectar()-> prepare("UPDATE $tabla SET Cantidad=Cantidad-:Cantidad WHERE idProductos = :idProductos ");

		
		$stmt -> bindparam(":Cantidad", $cantidad, PDO::PARAM_INT);
		$stmt -> bindparam(":idProductos", $idProductos, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "success";
		}else{
			return "error";
		}

		$stmt-> close();

	}


	#Visualizaer tablas de ventas online
	#-------------------------------------
	public function VentasOnline($tabla){
		#`idProductos`, `No_Codigo`, `Titulo`, `Precio`, `Cantidad`, `Color`, `Talla`, `Oferta`, `Descripcion`, `FotoFrontal`, `idMarca`, `idCategorias`, `Fecha`, `Nuevo`, `FotoLateral`, `FotoTrasera`, `Publicidad`, `PublicidadBaner`

		$stmt = Conexion::conectar()-> prepare("SELECT 
		V.idCompras,V.usuarioId, V.idProductos, V.Cantidad, V.Fechas, V.Direccion, V.Correo, V.CondicionProceso,
			U.idUsuario, U.Nombre, U.Apellido, 
			P.idProductos,P.Titulo, P.Precio, P.Oferta, P.PrecioProveedor FROM compras_online AS V INNER JOIN usuario 
		AS U ON V.usuarioId = U.idUsuario  INNER JOIN productos AS P ON V.idProductos = P.idProductos ");
		
		
		

		$stmt-> execute();
		//echo $stmt->rowCount();

		 if ($stmt->rowCount() > 0) {
			#Para que me devuelva todo las filas 
			return $stmt -> fetchAll();
		} else {
		 	return  "error";
		}
		
		


		
		$stmt = Null;
		
	}









	#visualizar tabla Administrador
	#-------------------------------------
	public function visualizarAdminCRUD($tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla ORDER BY idAdministrador DESC");
		$stmt-> execute();
		return $stmt -> fetchAll();
	}

	#Eliminar PRODUCTOS
	#-------------------------------------
	public function BorrarAdminCrud($datosModel,$tabla){

		$stmt = Conexion::conectar()-> prepare("DELETE FROM $tabla WHERE idAdministrador=:guardarID");

		$stmt -> bindparam(":guardarID", $datosModel,PDO::PARAM_INT);

		if ($stmt-> execute()) {
			return "success";
		} else {
		 return "Error";
		}
		$stmt-> close();
		
	}

	public function registrarAdminCRUD($datosControlardor, $tabla){
		$stmt = Conexion::conectar()-> prepare("INSERT INTO $tabla (Nombre, Apellidos, Dirreccion, Contrasena, Telefono) VALUES (:nombre, :apellidos, :direcion, :contrasena, :telefono)");

			$stmt -> bindparam(":nombre", $datosControlardor['nombre'], PDO::PARAM_STR);
			$stmt -> bindparam(":apellidos", $datosControlardor['apellidos'], PDO::PARAM_STR);
			$stmt -> bindparam(":direcion", $datosControlardor['direcion'], PDO::PARAM_STR);
			$stmt -> bindparam(":contrasena", $datosControlardor['contrasena'], PDO::PARAM_STR);
			$stmt -> bindparam(":telefono", $datosControlardor['telefono'], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			return "success";
		}else{
			return "error";
		}
	}


	public function editarAdminCRUD($datosControlardor, $tabla){
		$stmt = Conexion::conectar()-> prepare("UPDATE $tabla SET Nombre = :nombre, Apellidos = :apellidos, Dirreccion = :direcion, Contrasena = :contrasena, Telefono = :telefono WHERE idAdministrador = :idAdministrador");

			$stmt -> bindparam(":nombre", $datosControlardor['nombre'], PDO::PARAM_STR);
			$stmt -> bindparam(":apellidos", $datosControlardor['apellidos'], PDO::PARAM_STR);
			$stmt -> bindparam(":direcion", $datosControlardor['direcion'], PDO::PARAM_STR);
			$stmt -> bindparam(":contrasena", $datosControlardor['contrasena'], PDO::PARAM_STR);
			$stmt -> bindparam(":telefono", $datosControlardor['telefono'], PDO::PARAM_STR);
			$stmt -> bindparam(":idAdministrador", $datosControlardor['id'], PDO::PARAM_INT);

		if ($stmt -> execute()) {
			return "success";
		}else{
			return "error";
		}
	}

	#visualizar tabla Administrador
	#-------------------------------------
	public function visualizarEditarAdminCRUD($info, $tabla){
		$stmt = Conexion::conectar()-> prepare("SELECT * FROM $tabla WHERE idAdministrador = :info");
		$stmt -> bindparam(":info", $info, PDO::PARAM_INT);
		$stmt-> execute();
		return $stmt -> fetch();
	}




}//no eliminar

 ?>