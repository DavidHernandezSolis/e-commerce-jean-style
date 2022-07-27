
$("#nuevoProducto").click(function () {
	
		//var IdProd = $("#idProductoP").val(); 
		//var Precio = $("#CantidadP").val(); 
		
		const DatosBtn={
		 IdProd: $("#idProductoP").val(), 
		Precio: $("#CantidadP").val()
		}

		 //console.log('usuario',DatosBtn );

		 $.ajax({

			url:'controladores/plantillaControl.php',
			type:'POST',
			data:{'functions':'addVentaTemporal','Datos':DatosBtn },
			success: function(resultado){
				console.log('ya we',resultado );

				var ubicacion = jQuery(location).attr('href');
				window.location=ubicacion;

			}

		 });

	});


	$(".ConfirmarVenta").click(function () {
	
		//var IdProd = $("#idProductoP").val(); 
		//var Precio = $("#CantidadP").val(); 
		
		const DatosBtn={
		 IdProd: $("#idProductoP").val(), 
		Precio: $("#CantidadP").val()
		}

		 //console.log('usuario',DatosBtn );

		 $.ajax({

			url:'controladores/plantillaControl.php',
			type:'POST',
			data:{'functions':'addVentaTemporal','Datos':DatosBtn },
			success: function(resultado){
				console.log('ya we',resultado );

			
				window.location='http://localhost/ProyectoE-commerceEquipo1/administrador/index.php?action=confirmarVenta';

			}

		 });

	});




	
	//funcion que me permitira calcular y mostrar el cambio"
	//----------------------------------------------

	$("#idPago").change(function () {
	
		var idPago = $("#idPago").val();
		var idTotal = $("#idTotal").val(); 

		var cambio= idPago - idTotal;
		var restablecer="";

		if (cambio>0) {

		$("#idCambio").val(cambio); 
	}else{
		$("#idCambio").val(restablecer); 
	}


	});

