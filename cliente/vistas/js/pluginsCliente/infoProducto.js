$(document).ready(function(){
	    	
	    	$('select').formSelect();


	      	$('.flexslider').flexslider({
			    animation: "slide",
			    controlNav:true,
			    animationLoop:false,
			    slideshow:false,
			    itemWidth:100,
			    itemMargin:5
			});

	      	$('.flexslider ul li img').click(function () {
	      		var indice=$(this).attr("value");
	      		$(".contenedor-info-producto figure.visor img").hide();
	      		$("#lupa"+indice).show();
	      	})

	     /**
	    CALCULANDO EL TOTAL A PAGAR DEL PRODUCTO EN LA PAGINA DE INFO PRODUCTO DEPENDIENDO DE LA CANTIDAD SELECCIONADA
	     */
	      	$("select[name=cantidadPro]").change(function(){
           		var precio = $('#valorPrecio').val();
           		var cantidad = $('select[name=cantidadPro]').val();
           		var total = cantidad * precio;

            	$('input[name=valor1]').val(total);
       		 });

	      	
/** ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
EMPIEZA 	OPERACIONES CPARA EL CARRITO DE COMPRA DESDE EL AGREGADO DE PRODUCTO A CARRIRO
**//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	      	 /*----------  EL ID DEL USUARIO QUE HA INICIADO SESION  ----------*/
	      	//const idUser = $('#inpIdUser').val();

	      	/*----------  EL ID DEL USUARIO QUE HA INICIADO SESION  ----------*/


	      	/**
	      	 GUARDAR EL AGREGADO A CARRTO DE COMPRAS Y MOSTAR LA CANTIDAD DE PRODUCTOS EN CARRITO DE COMPRAS numCarrito cantidad-carrito
	      	*/
	      	$('#btnAgregarCarrito').click(function () {
	      		 // $idPro = $('#inpIdProductos').val();
	      		// $tituloPro = $('#inpTitulo').val();
	      		// $cantidadPro = $('#cantidadPro').val();
	      		// $precioUnoPro = $('#valorPrecio').val();
	      		// $precioTotalPro = $('#valorTotal').val();

	      		const datosCarrito = {
	      			idPro : $('#inpIdProductos').val(),
		      		tituloPro : $('#inpTitulo').val(),
		      		cantidadPro : $('#cantidadPro').val(),
		      		precioUnoPro : $('#valorPrecio').val(),
		      		precioTotalPro : $('#valorTotal').val(),
		      		idUser:$('#inpIdUser').val()
	      		}
	      		//console.log(datosCarrito);
	      		
	      		
	      		$.when(agregarCarrito(datosCarrito)).then(cantidadCarrito());
	      		 //$.when(ajax1).done((data1) => { $.when(ajax2).done((data2) => { }) })


	      		var promise =$.ajax({
	      			url:'http://localhost/ProyectoE-commerceEquipo1/cliente/controladores/clienteControl.php',
	      			type:'POST',
	      			data:{'funcion':'agregandoCarrito', 'datosCarrito' : datosCarrito},
	      			success:function (respuesta) {
	      				//console.log(respuesta);
	      				if (respuesta == "existe") {
	      					M.toast({html: 'El producto ya ha sido agregado en carrito', classes: 'rounded red lighten-1'});
	      				}
	      				if (respuesta == "exitoso") {
	      					M.toast({html: 'El producto se ha agregado a Carrito', classes: 'rounded light-blue lighten-1'});
	      				}
	      				if (respuesta == "fallo") {
	      					M.toast({html: 'Fallo, Vuelva a intentarlo mas tarde', classes: 'rounded green '});
	      				}

	      			}
	      		});
	      		 promise.then(function(){
	      		 	const idUser = $('#inpIdUser').val();
	      		 	$.ajax({
	      		 		url:'http://localhost/ProyectoE-commerceEquipo1/cliente/controladores/clienteControl.php',
	      		 		type:'POST',
	      		 		data:{ 'funcion':'cantidadCarritoControl', 'idUser' : idUser },
	      		 		success:function (res) {
		      	 					//console.log(res);
		      	 					$('#cantidad-carrito').html('<b id="numCarrito">'+res+'</b>');
		      	 					$('#cantidad-carrito').addClass('cantidad-carrito');
		      	 				}
		      	 			});
	      		 })
	      	})


	      	/**
	      	 FUNCION PARA AGREGAR A CARRITO
	      	 */
	      	function agregarCarrito(datosCarrito) {
	      		
	      	}

	      	/**
	      	 FUNCION PARA CONSULTAR LA CANTIDAD DEL CARRITO UNA VEZ QUE LA PETICION ANTERIOR SE TERMINO DE EJECUTAR
	      	 */
		  //     $(document).ajaxComplete(function(){
		  //     		const idUser = $('#inpIdUser').val();
		      		
			 //     $.ajax({
		  //     			url:'http://localhost/ProyectoE-commerceEquipo1/cliente/controladores/clienteControl.php',
		  //     			type:'POST',
		  //     			data:{ 'funcion':'cantidadCarritoControl', 'idUser' : idUser },
		  //     			success:function (res) {
		  //     					//console.log(res);
		  //     				$('#cantidad-carrito').html('<b id="numCarrito">'+res+'</b>');
		  //     				$('#cantidad-carrito').addClass('cantidad-carrito');
		  //     			}
		  //     		});
			 // });

	      	/**
	      	 FUNCION PARA CONSULTAR LA CANTIDAD DEL CARRITO CUANDO ACAVA DE CARGAR LA APAJINA
	      	 */ 
	      	 $(document).ready(cantidadCarrito());
	      	 function cantidadCarrito() {
	      	 	const idUser = $('#inpIdUser').val();
	      	 	$.ajax({
	      	 		url:'http://localhost/ProyectoE-commerceEquipo1/cliente/controladores/clienteControl.php',
	      	 		type:'POST',
	      	 		data:{ 'funcion':'cantidadCarritoControl', 'idUser' : idUser },
	      	 		success:function (res) {
	      	 			//console.log(res);
	      	 			$('#cantidad-carrito').html('<b id="numCarrito">'+res+'</b>');
	      	 			$('#cantidad-carrito').addClass('cantidad-carrito');
	      	 		}
	      	 	});
	      	 }
	      		
/** ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
TERMINA 	OPERACIONES CPARA EL CARRITO DE COMPRA DESDE EL AGREGADO DE PRODUCTO A CARRIRO
**//////////////////////////////////////////////////////////////////////////////////////////////////////////////////	      		
	      	      	

});