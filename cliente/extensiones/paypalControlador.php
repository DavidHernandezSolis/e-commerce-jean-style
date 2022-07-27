<?php 


 
require_once "../modelos/rutas.php";
 use PayPal\Api\Amount;
 use PayPal\Api\Details;
 use PayPal\Api\Item;
 use PayPal\Api\ItemList;
 use PayPal\Api\Payer;
 use PayPal\Api\Payment;
 use PayPal\Api\RedirectUrls;
 use PayPal\Api\Transaction;

class paypal{
	static public function mdlPagoPaypal($datos){

		
	require __DIR__ . '/bootstrap.php';

		$tituloArray = explode(",", $datos["tituloArray"]);
		$cantidadArray = explode(",", $datos["cantidadArray"]);
		$precioUnoArray = explode(",", $datos["precioUnoArray"]);

		$cantidadA= str_replace(",","-", $datos["cantidadArray"]);
		$idProductos = str_replace(",","-", $datos["idProductoArray"]);

		$payer = new Payer();
		$payer->setPaymentMethod("paypal");

		$item  = array();
		$variosItems = array();
		for ($i=0; $i < count($tituloArray); $i++) { 
			$item[$i] = new Item();
			$item[$i]->setName($tituloArray[$i])
			    ->setCurrency($datos["divisa"])
			    ->setQuantity($cantidadArray[$i])
			    ->setPrice($precioUnoArray[$i]);

			    array_push($variosItems, $item[$i]);
		}

		$itemList =  new ItemList();
		$itemList->setItems($variosItems);


/*=====  AGREGANDO DETALLES DE PAGO ======*/
		$details = new Details();
		$details->setShipping($datos["costoEnvio"])
		    ->setTax($datos["impuesto"])
		    ->setSubtotal($datos["total"]);

/*=====  DEFINE EL PAGO TOTAL CON SUS DETALLES ======*/
		$amount = new Amount();
		$amount->setCurrency($datos["divisa"])
		    ->setTotal($datos["total"])
		    ->setDetails($details);

/*=====  AGREGAMOS LAS CARACTERISTICAS DE LA TRANSACCION ======*/
		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setItemList($itemList)
		    ->setDescription("Payment description")
		    ->setInvoiceNumber(uniqid());

/*=====  AGREGAR LA URL DESPUES DE REALIZAR EL PAGO, O EN CASO DE QUE EL PAGO ES CANCELADO
		#IMPORTANTE AGREGAR LA URL PRINCIPAL EN LA API DEVELOP  DE PAYPAL======*/

		//$baseUrl = getBaseUrl();
		$ruta = new Ruta();
		$url =  $ruta->controlRuta();

		$redirectUrls = new RedirectUrls();
		$redirectUrls->setReturnUrl("$url/index.php?ruta=finalizar-compra&paypal=true&productos=".$idProductos)
		     ->setCancelUrl("$url/carritoCompras");


/*=====  AGREGAMOS LAS CARACTERISTICAS DE LA PAGO======*/
		$payment = new Payment();
		$payment->setIntent("sale")
		    ->setPayer($payer)
		    ->setRedirectUrls($redirectUrls)
		    ->setTransactions(array($transaction));

		   

/*=====  tratar de ejecutar un procesoy si falla ejecutar un arutina de error======*/
			try {
			  	$payment->create($apiContext);
			  	 //var_dump($payment);
			} catch (PayPal\Exception\PayPalConnectionException $e) {
			  	echo $e->getCode();
			  	echo $e->getData();
			  	die($e);
			  	return "$url/error";
			}

/*===== par iterar sobre $payment======*/
		foreach ($payment->getLinks() as $key => $link) {

			if ($link->getRel() == "approval_url") {

				$redirectUrl = $link->getHref();
				
			}
			
		}

		return $redirectUrl;


	}
}