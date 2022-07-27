<?php 

class enlacesPaginas{
	public function enlacesPaginasModel($enlaces){

		if ($enlaces=="verProductos" ||
			$enlaces=="EditarUsuario" ||
			$enlaces=="ayuda" ||
			$enlaces=="caracteristicas" ||
			$enlaces=="categorias" ||
			$enlaces=="clientesActuales" ||
			$enlaces=="clientesRegistrados" ||
			$enlaces=="confirmarVenta" ||
			$enlaces=="enca" ||
			$enlaces=="encabezado" ||
			$enlaces=="insertarProductos" ||
			$enlaces=="menuLateral" ||
			$enlaces=="notificaciones" ||
			$enlaces=="pie" ||
			$enlaces=="resumenVenta" ||
			$enlaces=="salidaProducto" ||
			$enlaces=="ventasFisicas" ||
			$enlaces=="ventasGeneradasOnline" ||
			$enlaces=="verProductos"||
			$enlaces=="EditarProducto" ||
			$enlaces=="EditarMarca"||
			$enlaces=="EditarCategoria"||
			$enlaces=="insertarDatos"||
			$enlaces=="Salir"||
			$enlaces=="admin"||
			$enlaces=="agregarUser"||
			$enlaces=="editarAdmin"	
			 ) {

			$modulo="vistas/modulos/".$enlaces.".php";
		
		}else if ($enlaces =="Cambio"){
		$modulo = "vistas/modulos/clientesRegistrados.php";
		}


		return $modulo;



	}

}

 ?>