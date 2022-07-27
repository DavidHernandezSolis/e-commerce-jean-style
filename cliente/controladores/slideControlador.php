<?php 
	
	class slideControlador{
		public function mostrarSlideControl(){
			$tabla = "slide";
			$slideModelo = new slideModelo();
			$respuesta =$slideModelo->mostrarSlideModelo($tabla);

			return $respuesta;
		}
	}
?>