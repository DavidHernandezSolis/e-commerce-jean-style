<?php 


class ControladorCliente{

//-----------------------------------
//Funcion para incluir plantilla.php en index
//-----------------------------------
	public function plantilla(){
		include "vistas/plantilla.php";
	}

//-----------------------------------
//LISTAR CATEGORIAS
//-----------------------------------
	public function listarCategoriasControl()
	{
		$modeloCliente = new ModeloCliente();
		$tabla = "categorias";
		$respuesta = $modeloCliente->listarCategoriasModelo($tabla);

		return $respuesta;
	}

//-----------------------------------
//Funcion para manipular las rutas en lalista blanca de categorias
//-----------------------------------
	static public function rutasCategoriasControl($campo, $valorRuta)
	{
		$tabla = "categorias";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->rutasCategoriasModelo($tabla, $campo, $valorRuta);

		return $respuesta;
	}



//-----------------------------------
//Funcion para mostrar productos 
//-----------------------------------
	static public function mostrarProductosControl()
	{
		$tabla = "productos";
		$idProductos = Null;
		$idValor = Null;
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->mostrarProductosModelo($tabla, $idProductos, $idValor);

		return $respuesta;
	}



//-----------------------------------
//Funcion para manipular las rutas en lalista blanca de productos
//-----------------------------------
	static public function rutasProductosControl($campoProducto, $valorRuta, $idProductos)
	{
		$tabla = "productos";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->rutasProductosModelo($tabla, $campoProducto, $valorRuta, $idProductos);

		return $respuesta;
	}


//-----------------------------------
//Funcion para mostrar productos en vitrina de productros
//-----------------------------------
	static public function mostrarVitrinaProductosControl($idCategoria,$item0, $base, $tope)
	{
		$tabla = "productos";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->mostrarVitrinaProductosModelo($tabla, $idCategoria,$item0, $base, $tope);

		return $respuesta;
	}
	


//-----------------------------------
//Funcion para mostrar marcas 
//-----------------------------------
	public function mostrarMarcasControl()
	{
		$tabla = "marca";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->mostrarMarcasModelo($tabla);

		return $respuesta;
	}


//-----------------------------------
//Funcion para mostrar productos en vitrina de productros
//-----------------------------------
	static public function listarProductosControl($item01, $idCategoria, $item0)
	{
		$tabla = "productos";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->listarProductosModelo($tabla, $item01, $idCategoria, $item0);

		return $respuesta;
	}


//Funcion para encriptar ids
//-----------------------------------


//Funcion para desemcriptar ids
//-----------------------------------
	  

//-----------------------------------
//Funcion para mostrar productos 
//-----------------------------------
	static public function infoProductosControl($idProductosCampo, $idValor)
	{
		$tabla = "productos";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->mostrarProductosModelo($tabla, $idProductosCampo, $idValor);

		return $respuesta;
	}


//-----------------------------------
//Funcion para guardar en carrito de compras
//-----------------------------------
	public function agregandoCarrito($datosCarrito)
	{
		$tabla = "carrito";
		
		//$cantidad = $datosCarrito["tituloPro"];
		// $idProductos = $datosCarrito["idPro"];
		// $cantidad = $datosCarrito["cantidadPro"];
		// $precioUno = $datosCarrito["precioUnoPro"];
		// $precioTotal = $datosCarrito["precioTotalPro"];

		require "../modelos/clienteModelo.php";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->agregarCarritoModelo($tabla, $datosCarrito);

		
		//return $respuesta;
	}


//-----------------------------------
//Funcion para saber la cantidad en carrito de compras
//-----------------------------------
	public function cantidadCarritoControl($idUser){
		$tabla = "carrito";
		// echo "funcion cantidad";
		require "../modelos/clienteModelo.php";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->cantidadCarritoModelo($tabla, $idUser);
	}

//-----------------------------------
//Funcion para  consultar productos de carrito de compras
//-----------------------------------
	 static public function carritoProductosControl($idUsuario){
		$tabla = "carrito";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->carritoProductosModelo($tabla, $idUsuario);

		return $respuesta;
	}

//-----------------------------------
//Funcion para login
//-----------------------------------
	 public function loginControl(){
		$modeloCliente = new ModeloCliente();
		$ruta = new Ruta();
	 	if (isset($_POST["idUsuario"]) && isset($_POST["idContrasena"])) {
	 		$user = $_POST["idUsuario"];
		 	$pass = $_POST["idContrasena"];
			$tabla = "usuario";
			$respuesta = $modeloCliente->loginModelo($tabla, $user, $pass);
			
				if (!empty($respuesta)) {
					if ($respuesta["Correo"] == $_POST["idUsuario"] AND $respuesta["Contrasena"] == $_POST["idContrasena"] ) {

					 	$_SESSION["validarSesion"] = "ok";
					 	$_SESSION["idUser"] = $respuesta["idUsuario"];	

					 	$_SESSION["nombreUser"] = $respuesta["Nombre"];

					 	$url = $ruta->controlRuta();
					 	echo '
							<script type="text/javascript">
							   window.location = "'.$url.'";
							</script>
						';
					}else{
					 	echo '
					 		<script>
					 			swal("", "USUARIO NO EXISTE", "error");
					 		</script>
					 	';
					}

				return $respuesta;

				}else {
					$Nombre = $user;
		 			$Contrasena = $pass;
					$tabla = "administrador";
					$respuestaAdmin = $modeloCliente->loginAdminModelo($tabla, $Nombre, $Contrasena);

					if ($respuestaAdmin["Nombre"] == $_POST["idUsuario"] AND $respuestaAdmin["Contrasena"] == $_POST["idContrasena"] ) {

					 	$_SESSION["validarSesionAdmin"] = "ok";
					 	$_SESSION["idAdministrador"] = $respuestaAdmin["idAdministrador"];	

					 	$_SESSION["nombreUser"] = $respuestaAdmin["Nombre"];

					 	$urlAdmin = $ruta->controlRutaAdmin();
					 	echo '
							<script type="text/javascript">
							   window.location = "'.$urlAdmin.'";
							</script>
						';
					}else{
					 	echo '
					 		<script>
					 			swal("", "USUARIO NO EXISTE", "error");
					 		</script>
					 	';
					}
					return $respuestaAdmin;
				}

				
	 	}
	}



//-----------------------------------
//Funcion para registro de usuarios
//-----------------------------------
	 public function registroControl(){
		$modeloCliente = new ModeloCliente();
		$ruta = new Ruta();

	 	if (isset($_POST["idNombre"])) {
	 		if ($_POST["idContra"] == $_POST["idContra2"]) {
	 			$DatosControl=array(
				"nombre" => $_POST["idNombre"],
			 	"apellido" => $_POST["idApellido"],
			 	"correo" => $_POST["idCorreo"],
			 	"contra1" => $_POST["idContra"],
			 	"municipio" => "Zacualtipán",
			 	"colonia" => $_POST["idColonia"],
			 	"calle" => $_POST["idCalle"],
				"telefono" => $_POST["idTelefono"]
				);
	 			$tabla = "usuarios";
				$respuesta = $modeloCliente->registroModelo($tabla, $DatosControl);

				if ($respuesta == "existe"){
					echo '
				   		<script>
					   		swal("El correo o contraseña ya existen", "", "error");
					  	</script>
				  	';
				}else if ($respuesta == "true") {
			  	   echo '
				   		<script>
							swal("Felicidades", "Se a registrado exitosamente ", "success");
					  	</script>
				  	';
				  	$url = $ruta->controlRuta();
				 	echo '

						<script type="text/javascript">
							setTimeout(function () {
							   window.location = "'.$url.'login";
							}, 1000);
						</script>
					';
				 	
			     } else {
			  	   echo '
					<script>
				   		swal("Lo sentimos", "Registro fallido", "error");
				  	</script>
				  	';
			     }
		 	}
		}
	}

	static public function datosButonComprarCarritoControl($datosButonComprar)
	{
		$modeloCliente = new ModeloCliente();
		$tabla = "carrito";

		require "../modelos/clienteModelo.php";
		$respuesta = $modeloCliente->datosButonComprarCarritoModelo($tabla, $datosButonComprar);

		return $respuesta;
	}

	static public function butonEliminarCarritoControl($idCarrito)
	{
		$tabla = "carrito";
		$modeloCliente = new ModeloCliente();

		require "../modelos/clienteModelo.php";
		$respuesta = $modeloCliente->butonEliminarCarritoModelo($tabla, $idCarrito);

		return $respuesta;
	}
	static public function  buscarVitrinaProductosControl($busqueda, $base, $tope){
		$tabla ="productos";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->buscarVitrinaProductosModelo($tabla, $busqueda, $base, $tope);

		return $respuesta;
	}

	static public function  listarBusquedaProductosControl($busqueda){
		$tabla ="productos";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->listarBusquedaProductosModelo($tabla, $busqueda);

		return $respuesta;
	}



	#Este
//-----------------------------------
//Funcion para  consultar productos de compas como historial
//-----------------------------------
	 static public function historialComprasOnlineControl($idUsuario){
		$tabla = "compras_online";
		$modeloCliente = new ModeloCliente();
		$respuesta = $modeloCliente->historialComprasOnlineModelo($tabla, $idUsuario);

		return $respuesta;
	}


	
	
}



















/** 
	 * //////////////////////////////////////////////////////////
	 * VALIDACIONES DE PETICIONES RECIVIDAS POR AJAX
	 * //////////////////////////////////////////////////////////
**/
	//Comprobamos que el valor no venga vacío
	if(isset($_POST['funcion']) && !empty($_POST['funcion'])) {

	    $funcion = $_POST['funcion'];
	    
	    $objetoControlador = new ControladorCliente();

	    //En función del parámetro que nos llegue ejecutamos una función u otra
	    switch($funcion) {
	        case 'agregandoCarrito': 
	        	$datosCarrito = $_POST['datosCarrito'];
	            $objetoControlador -> agregandoCarrito($datosCarrito);
	        break;
	        case 'cantidadCarritoControl':
	        	$idUser = $_POST['idUser'];
	            $objetoControlador -> cantidadCarritoControl($idUser);
	        break;
	        case 'butonComprar':
	        	$datosButonComprar = $_POST['datosButonComprar'];
	            $objetoControlador -> datosButonComprarCarritoControl($datosButonComprar);
	        break;
	        case 'butonEliminarCarritoControl':
	        	$idCarrito = $_POST['idCarrito'];
	            $objetoControlador -> butonEliminarCarritoControl($idCarrito);
	        break;
	    }
	}
