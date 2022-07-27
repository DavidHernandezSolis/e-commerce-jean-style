<?php 
	require_once "../extensiones/paypalControlador.php";

	class ajaxCarrito{
		
		public $divisa;
		public $total;
		public $impuesto;
		public $costoEnvio;
		public $subtotal;
		public $tituloArray;
		public $cantidadArray;
		public $precioUnoArray;
		public $idProductoArray;


		public function ajaxEnviarPayPal(){
			$datos = array(
				'divisa' => $this->divisa,
				'total' => $this->total,
				'impuesto' => $this->impuesto,
				'costoEnvio' => $this->costoEnvio,
				'subtotal' => $this->subtotal,
				'tituloArray' => $this->tituloArray,
				'cantidadArray' => $this->cantidadArray,
				'precioUnoArray' => $this->precioUnoArray,
				'idProductoArray' => $this->idProductoArray
			);
			$paypalOne = new paypal();
			$respuesta = $paypalOne->mdlPagoPaypal($datos);
			
			echo $respuesta;
		}
	}
 	
 	if (isset($_POST["divisa"])) {
 		$paypal = new ajaxCarrito();
 		$paypal ->divisa = $_POST["divisa"];
		$paypal ->total = $_POST["total"];
		$paypal ->impuesto = $_POST["impuesto"];
		$paypal ->costoEnvio = $_POST["costoEnvio"];
		$paypal ->subtotal = $_POST["subtotal"];
		$paypal ->tituloArray = $_POST["tituloArray"];
		$paypal ->cantidadArray = $_POST["cantidadArray"];
		$paypal ->precioUnoArray = $_POST["precioUnoArray"];
		$paypal ->idProductoArray = $_POST["idProductoArray"];
		$paypal ->ajaxEnviarPayPal();
 	}