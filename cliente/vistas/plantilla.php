<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" >
	<meta name="title" content="Tienda Virtual">
	<meta name="description" content="Tienda virtual para una tienda de pantalones del municipio de Zacualtipan de Angeles, Hidalgo">
	<meta name="keyword" content="E-commerce,Tienda virtual, Zacualtipan, Pantalones, Tienda Zacualtipan, E-commerce Zacualtipan, Pantalones Zacualtipan, E-commerce pantalones Zacualtipan, tienda virtual de pantalones de Zacualtipan">




	<title>Tienda Virtual</title>

	<?php 
		/*=======================================================================
		=            SECCION PARA MANTENER LA RUTA FIJA DEL PROYECTO            =
		=======================================================================*/
		$claseRuta = new Ruta();
		$url = $claseRuta->controlRuta();

		$urlAdmin = $claseRuta->controlRutaAdmin();
		
		/*=====  End of SECCION PARA MANTENER LA RUTA FIJA DEL PROYECTO  ======*/
		
	?>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="<?php echo $url ?>vistas/css/pluginsCliente/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url ?>vistas/css/materialize/materialize.min.css">

	<link rel="stylesheet" type="text/css" href="<?php echo $url ?>vistas\css\pluginsCliente/flexslider.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $url ?>vistas\css\pluginsCliente/sweetalert.css">



	<script type="text/javascript" src="<?php echo $url ?>vistas/js/pluginsCliente/jquery.min.js"></script>

	<script type="text/javascript" src="<?php echo $url ?>vistas/js/pluginsCliente/sweetalert.min.js"></script>

	
	<script type="text/javascript" src="<?php echo $url ?>vistas/js/materialize/materialize.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="<?php echo $url ?>vistas/css/pluginsCliente/infoProducto.css">

	<script type="text/javascript">
	    $(document).ready(function(){
		    $('.sidenav').sidenav();
		 });
	</script>


	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@515&display=swap" rel="stylesheet">
	<style type="text/css">
	html {
	  min-height: 100%;
	  max-height: 100%;
	  position: inherit;
	}
	body {
		background-color: #ebebeb29;
	  margin: 0;
	}
	footer {
	  background-color: #3c4040d9;
	  position: absolute;
	  width: 100%;
	  height: auto;
	  color: white;
	}
	</style>
</head>
<body >

	<?php 
	/*=============================================
	=            Encabezado- cabezote.php         =
	=============================================*/

	include "modulos/encabezado.php";



	/*=============================================
	=            CONTENIDO DINAMICO        =
	=============================================*/
	?>


	<div  style="padding-bottom: 10px; padding-top: 0px;min-height: 600px;" >

		<?php
		$rutas = array();//VARIABLE TIPO ARRAY VACIO
		$ruta = "";//VARIABLE ESTRING VACIO

		if (isset($_GET["ruta"])) {/* si la variable get obtiene algun datoentonces */
		
			$rutas=explode("/", $_GET["ruta"]);/* todas las palabrasobtenidas de get se dividen con la funcion expode en cada parte que tengan / y se guarda en el array $rutas */
			
			
			$campo="Nombres" ;
			$valorRuta = $rutas[0];/* la variable valorRuta me almacena el indice 0 del array que viene siendo el nombre de la categoria ya que es la primera que se colocara en la url */
			$campoProducto="Titulo";





			/*=============================================
			=        URL'S AMIGABLES DE CATEGORIAS    =
			=============================================*/
			$controladorCliente = new ControladorCliente();
			$rutaCategorias = $controladorCliente->rutasCategoriasControl($campo, $valorRuta);

			if ($rutaCategorias && $rutaCategorias["Nombres"]== $valorRuta) {/* si la categoria obtenida del get es igaul al nombre almacenada en la base de datos de categoria entonces */
			
				$ruta = $rutas[0];
			}else{
				$rutaCategorias["Nombres"] = null;
			}



			if ($rutas[0] != $rutaCategorias["Nombres"] && isset($rutas[1]) && $rutas[0] != "Productos ofertas" && $rutas[0] != "Productos nuevos" && $rutas[0] != "buscador") {
					// var_dump($rutas[0]);
					// var_dump($rutas[1]);
					$idProRutas = base64_decode($rutas[1]);
					//var_dump($idProRutas);
				
					/*=============================================
					=        URL'S AMIGABLES DE Productos    =
					=============================================*/
					$rutaProductos = $controladorCliente->rutasProductosControl($campoProducto, $valorRuta, $idProRutas);
					if ($valorRuta == $rutaProductos["Titulo"] && $idProRutas == $rutaProductos["idProductos"]) {/* si el producto  obtenida del get es igaul al nombre almacenada en la base de datos de productos .*. */
					
						$rutaInfoProducto = $rutas[0];
						//
						$rutaInfo = base64_decode($rutas[1]);
						// 	$rutaInfo = base64_decode($rutas[1]);
						// }
						
					}

			}else{
				$rutaInfoProducto = Null;
				$rutaInfo = Null;
			}


			/*=============================================
			=   LISTA BLANCA DE URL´S AMIGABLES         =
			=============================================*/
			if ($ruta != null || $rutas[0] == "Productos ofertas" || $rutas[0] == "Productos nuevos" ) {
				echo '<div class="row 	">';
					include 'modulos/menulateral.php';
					include 'modulos/vitrinaProductos.php';
				echo '</div class="row">';

			}else if ($rutaInfoProducto != Null ) {

			 	include 'modulos/infoProducto.php';

			 }else if ($rutas[0] == "buscador" ) {

			 	include 'modulos/buscador.php';

			 }else if ($rutas[0] == "categorias" || $rutas[0] == "carritoCompras" || $rutas[0] == "configuracionEnvio" || $rutas[0] == "login" || $rutas[0] == "crearCuenta" || $rutas[0] == "salir" || $rutas[0] == "errorPago" || $rutas[0] == "finalizar-compra" || $rutas[0] == "historial" || $rutas[0] == "ayudaOpciones" || $rutas[0] == "ayudaCompras" || $rutas[0] == "ayudaConfiguracionPerfil" ) {

				include 'modulos/'.$rutas[0].'.php';

			}else{
				
				include 'modulos/error404.php';

			}
			// if ($ruta != null) {
			// 	echo '<div class="row">';
			// 	include 'modulos/menulateral.php';
			// 	include 'modulos/vitrinaProductos.php';
			// 	echo '</div class="row">';
			// }elseif (isset($_GET["ruta"])=="infoProducto" || isset($_GET["ruta"])=="login" || isset($_GET["ruta"])=="crearCuenta"|| isset($_GET["ruta"])=="ayudaOpciones" || isset($_GET["ruta"])=="ayudaCompras" || isset($_GET["ruta"])=="ayudaConfiguracionPerfil") {
			// 	ob_start();
			// 		$Enlaces=$_GET["ruta"];
			// 		$Enlaces="modulos/".$Enlaces.".php";
			// 		include $Enlaces;
			// 	ob_end_flush();
			// } else{

			// 	include 'modulos/error404.php';

			// }
			
		}else{

			include 'modulos/slideMaterialize.php';
			include "modulos/ofertas.php";
			include "modulos/nuevos.php";
			include "modulos/publicidad.php";
			include "modulos/categoriasyMarcas.php";
		}



		?>

	</div>
	<!--====  End of Section Contenido dinamico ====-->

	<!--=====================================
	=            Section pie de pagina            =
	======================================-->
	<?php 
		include "modulos/piePagina.php";
	?>
	<!--====  End of Section pie de pagina  ====-->


<script type="text/javascript" src="<?php echo $url ?>vistas/js/pluginsCliente/jquery.flexslider.js"></script>

<script type="text/javascript" src="<?php echo $url ?>vistas/js/pluginsCliente/infoProducto.js"></script>
<script type="text/javascript" src="<?php echo $url ?>vistas/js/pluginsCliente/crearCuenta.js"></script> 
<script type="text/javascript" src="<?php echo $url ?>vistas/js/carrito.js"></script>
<script type="text/javascript" src="<?php echo $url ?>vistas/js/butonComprar.js"></script>
<script type="text/javascript" src="<?php echo $url ?>vistas/js/buscardor.js"></script>

 

</body>
</html>