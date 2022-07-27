

 	$(document).on('click', 'button, html [name="btnEliminar"]', function(event) {
 		var urlCliente = "http://localhost/ProyectoE-commerceEquipo1/cliente/";
	    let idCarrito = this.value;//OBTENIENDO EL IDcARRITO DESDE EL VALUE DEL BUTTON
		$.ajax({
				url:urlCliente + 'controladores/clienteControl.php',
				type:'POST',
				data:{ 'funcion':'butonEliminarCarritoControl', 'idCarrito':idCarrito},
				success:function (res) {
			      	
			      	
			      	if (res == "Elimino") {
			      		var URLactual = jQuery(location).attr('href');
			      		
					    window.location = URLactual;
					    
			      	}else if (res == "Fallo") {
			      		var URLactual = jQuery(location).attr('href');
			      		M.toast({html: 'FALLO "VOLVER A INTENTARLO"', classes: 'rounded orange lighten-1 black-text'})
			      		setTimeout(function () {
					        window.location = URLactual;
					    }, 800);
			      	}
			      					
			   }
		});
 	});


//