$(document).ready(function(){


	var urlCliente = "http://localhost/ProyectoE-commerceEquipo1/cliente/";


	/*=============================================
	

		

		si es un elemento de hHTML
		 entonces accedes a SU VAlOR
		  con $("").html(); 


		 ELEMPLO:
		<span class="SPAN" >contenido a obtener </span>
		 $(".SPAN").html(); 


	=============================================*/
	
	

	$(".btnPagar").click(function () {
		var divisa ="MXN";
		//console.log("divisa", divisa);

		var total = $(".precioCompraTotal").html();
		//console.log("total", total);

		var impuesto = 0;
		//console.log("impuesto", impuesto);

		var costoEnvio = 0;
		//console.log("costoEnvio", costoEnvio);

		var subtotal = 0;
		//console.log("subtotal", subtotal);


/*=====  SOLO SE OBTIENE LA REFERENCIA A LOS ELEMENTOS INPUT PARA OCUPARLOS EN EL FOR Y LLENAR LOS ARREGLOS ======*/
		var titulo = $(".titulo");
		//console.log("titulo", titulo.length);

		var cantidad = $(".cantidadPro");
		//console.log("cantidad", cantidad);

		var precioUno = $(".precioUno");
		//console.log("precioUno", precioUno);

		var idProducto = $(".idProducto");
		//console.log("idProducto", idProducto);

		var tituloArray = [];
		var cantidadArray = [];
		var precioUnoArray = [];
		var idProductoArray = [];

		for (var i = 0; i < titulo.length; i++) {
			tituloArray[i] = $(titulo[i]).html();
			cantidadArray[i] = $(cantidad[i]).html();
			precioUnoArray[i] = $(precioUno[i]).val();
			idProductoArray[i] = $(idProducto[i]).val();
		}

		 // console.log("tituloArray",tituloArray);
		 // console.log("cantidadArray",cantidadArray);
		 // console.log("precioUnoArray",precioUnoArray);
		 // console.log("idProductoArray",idProductoArray);

		 var datos = new FormData();

		 datos.append("divisa", divisa);
		 datos.append("total", total);
		 datos.append("impuesto", impuesto);
		 datos.append("costoEnvio", costoEnvio);
		 datos.append("subtotal", subtotal);
		 datos.append("tituloArray", tituloArray);
		 datos.append("cantidadArray", cantidadArray);
		 datos.append("precioUnoArray", precioUnoArray);
		 datos.append("idProductoArray", idProductoArray);

		 $.ajax({
		 	url:urlCliente+"ajax/carritoAjax.php",
		 	method:"POST",
		 	data:datos,
		 	cache:false,
		 	contentType:false,
		 	processData:false,
		 	success:function (respuesta) {
		 		//console.log("respuesta", respuesta);
		 		window.location = respuesta;
		 	}
		 })

	});

})