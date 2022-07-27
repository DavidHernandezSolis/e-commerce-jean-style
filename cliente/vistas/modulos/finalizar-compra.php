<?php 

require_once "controladores/carritoControlador.php"; 
require_once "modelos/carritoModelo.php";
require_once "modelos/rutas.php"; 

$ruta = Ruta();
$url =  $ruta->controlRuta();

if (!isset($_SESSION["validarSesion"])) {

	echo '
		<script>
			window.location = "'.$url.'";
		</script>
	';
	exit();
}

//credenciales paypla
require "extensiones/bootstrap.php";

//librerias del SDK:
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;

///////////////////////Pago PayPal////////////////////


//evaluamos si la compra esta aprovada

if (isset($_GET['paypal']) && $_GET['paypal'] == 'true') {
	
	//recivo los id de los productos comprados
	$productos = explode("-", $_GET['productos']);



	#capturamos el id del pago que nos arroja paypal 
	$paymentId = $_GET["paymentId"];

	#creamos el objeto para confirmar que las credenciales si tengan el id de pago resuelto
	$payment = Payment::get($paymentId, $apiContext);

	#creamos la ejecucion de pago, invocando la clase PaymentExecution() y extraemos el id del pagador
	$execution = new PaymentExecution();
	$execution->setPayerId($_GET['PayerID']);

	#validar con las credenciales que el id del pagador si coincida
	$payment->execute($execution, $apiContext);


	$datosTransaccion = $payment->toJSON();

	$datosUsuario = json_decode($datosTransaccion);

	$correoCliente = $datosUsuario->payer->payer_info->email;

	$dir = $datosUsuario->payer->payer_info->shipping_address->line1;
	$ciudad = $datosUsuario->payer->payer_info->shipping_address->city;
	$estado = $datosUsuario->payer->payer_info->shipping_address->state;
	$codigoPostal = $datosUsuario->payer->payer_info->shipping_address->postal_code;
	//$pais = $datosUsuario->payer->payer_info->shipping_address->country_code;

	$direccion = $dir.", ".$ciudad.", ".$estado.", ".$codigoPostal;

	#actualizar la base de datos
	for ($i=0; $i < count($productos) ; $i++) { 
			$datos = array("idUsuario"=>$_SESSION["idUser"],
						"idProducto"=>$productos[$i],
						"tipoPago"=>"PayPal",
						"correo"=>$correoCliente,
						"direccion"=>$direccion
						);
			$controladorCarrito = ControladorCarrito();
			$respuesta = $controladorCarrito->ctrNuevasCompras($datos);
		// var_dump($productos);
		// var_dump($productos[$i]);

		//var_dump($respuesta);
	}

}