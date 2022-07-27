

	
	

	$("#btnComprar-Info").click(function () {
		var urlCliente = "http://localhost/ProyectoE-commerceEquipo1/cliente/";

		var cantidad = $(".cantidadPro").val();
		var precioUno = $(".precioUno").val();
		var precioTotal = precioUno * cantidad ;

		const datosButonComprar= {
			cantidad : $(".cantidadPro").val(),
			precioUno : $(".precioUno").val(),
			precioTotal : precioTotal,
			idUser : $(".usuarioCompra").val(),
			idProducto : $("#inpIdProductos").val()
		}

		console.log("datosButonComprar",datosButonComprar);

		$.ajax({
			url:urlCliente + 'controladores/clienteControl.php',
			type:'POST',
			data:{ 'funcion':'butonComprar', 'datosButonComprar':datosButonComprar},
			success:function (res) {
		      	
		      	// console.log(res);
		      	if (res == "existe") {
		      		M.toast({html: 'El producto ya ha sido agregado en carrito . . .  " Enviando a carrito "', classes: 'rounded green lighten-1 '})
		      		setTimeout(function () {
				        window.location = urlCliente+"carritoCompras";
				    }, 1300);
		      	}else if (res == "exitoso") {
		      		M.toast({html: ' Enviando a carrito . . .', classes: 'rounded green lighten-1 '})
		      		setTimeout(function () {
				        window.location = urlCliente+"carritoCompras";
				    }, 1300);
		      	}else if (res == "fallo") {
		      		//JS PURO
		   			//var URLactual = window.location.href;
					// alert(URLactual);
					//Con jQuery se puede obtener con:
					var URLactual = jQuery(location).attr('href');
		      		M.toast({html: 'ALGO SALIO MAL . . ."VOLVER A INTENTARLO"', classes: 'rounded red lighten-1 black-text'})
		      		setTimeout(function () {
				        window.location = URLactual;
				    }, 1200);
		      	}
		      					
		    }
		});

	})

