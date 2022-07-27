<header style="height: 100px;" >
	<div class="contenido-encabezado ">
		<div class="row fila-1-encabezado center-align">
			<div class="col  s6 m5 l4 xl3">
				<div class="row ">
	                <div class="col s12 m10 l6 xl8">
	                	<a href="<?php echo $url?>index.php" class="e-ico darken-1 aa">
	                    	<div class="center-align">
	                    		<hr class="icono-linea blanco"><hr>
	                    		<h6 class="h5-icono blanco"><b class="" >Jeans Style</b></h6>
	                    	</div>
	                	</a>
	                </div>
				</div>
			</div>
			<div class="col offset-s4 m1  offset-m4  l1 offset-l6 xl1 offset-xl7  right-align">
				<a href="<?php echo $url ?>carritoCompras" class="hide-on-small-only">
					<i class="icono-carrito material-icons " style="font-size: 35px; margin-top:20px;  color:yellow;">add_shopping_cart</i>
					<span class="" id="cantidad-carrito">
						<!-- <b id="numCarrito">5</b> -->
					</span>
				</a>
			</div>
			<div class="col s1  m1  l1 xl1  ">
				<a  href="<?php echo $url ?>ayudaOpciones">
					<div class="valign-wrapper font-quicksand-sf blanco ayuda" style="margin-top: 20px;">
						<h6 class="ayuda">Ayuda</h6>
					</div>
				</a>
			</div>

		</div>
		<div class="row fila-2-encabezado  font-quicksand-sf" >
			
			<div class="col xl1 l1 m2 hide-on-small-only left-align ">
				<a href="#" class="dropdown-trigger " data-target="menuCategorias">
					<h6 class="blanco" >Categorias</h6>
				</a>
			</div>
			<!-- Menu de Categorias -->
			  <ul id="menuCategorias" class="dropdown-content">
			  	<?php 
					$controladorCliente = new ControladorCliente();
			  		 $categoria = $controladorCliente->listarCategoriasControl();
			  		 foreach ($categoria as $key => $value) {
			  		 	echo '
			  		 		<li><a href="'.$url.$value["Nombres"].'">'.$value["Nombres"].'</a></li>
			  		 	';
			  		 }
			  	?>
			  </ul>

			<div class="col xl1 l1 m1 hide-on-small-only center-align " >
				<a href="<?php echo $url ?>Productos ofertas"><h6 class="blanco">Ofertas</h6></a>
			</div>
			<div class="col xl7 l7 m4 s9 center-align  ">
			      <div class="row">
			        <div class="input-field col s12 buscadorB" >
						<input type="search" id="search" class="" style="height: 35px; margin-top: -12px; "  />
						<label for="search" class="" style="margin-top: -17px;margin-left: 20px;color:#9e9e9e; ">Buscar pantalones ...</label> 	<button type="button" class="icon" style=" margin-top: -12px; ">
								<a href="<?php echo $url; ?>buscador/1" class="black"  style=" margin-top: -12px; ">
									<i style="margin-left: -20px;margin-top: -15px; " class="material-icons prefix black-text">search</i>
								</a>
							</button>
						
						
					
			          <!-- <input id="search" type="text" class="validate stilo-input-buscar" >
			          <label for="search" class="blanco" >Buscar ...</label> -->
			        </div>
			      </div>
			</div>

			<div class="col xl1 l1 m2 hide-on-small-only right-align ">
				<a href="<?php echo $url?>historial"><h6 class="blanco">Historial</h6></a>
			</div>
			<!-- div class="col xl1  l1 m2 hide-on-small-only center-align ">
				<a href="<?php echo $url?>notificaciones"><h6 class="blanco">Notificación</h6></a>
			</div-->
			<div class="col xl1 l1 m1 s1 offset-s1 center-align "><!-- usuario-->
				<a href="#" class="dropdown-trigger blanco" data-target='dropdown1' >
					<h6 style="margin-top: 0px;"><i class="material-icons " style="font-size: 38px;">account_circle</i></h6>
				</a>
			</div>
			  <!-- Menu de Usuario -->
			  <ul id="dropdown1" class="dropdown-content">
			  	<?php 
			  		if (isset($_SESSION["validarSesion"])) {

			  			if ($_SESSION["validarSesion"] == "ok") {
			  				
			  				echo '
			  					<li><a style="color:black">'.$_SESSION["nombreUser"].'</a></li>
			  					<li><a href="'.$url.'perfi">Ver Perfil<i class="material-icons">person_outline</i></a></li>
			  					<li class="hide-on-med-and-up"><a href="'.$url.'categorias">Categorias<i class="material-icons">drag_indicator</i></a></li>
							    <li class="hide-on-med-and-up"><a href="'.$url.'carritoCompras">Carriro<i class="icono-carrito material-icons " style="font-size: 25px;">add_shopping_cart</i></a></li>
							    <!--  li class="hide-on-med-and-up"><a href="'.$url.'notificaciones">Notificaciones<i class="material-icons">notifications_none</i></a></li -->
							    
							    <li class="hide-on-med-and-up"><a href="'.$url.'historial">Hitorial<i class="material-icons">history</i></a></li>
							    <li class="divider" tabindex="-1"></li>
							    <li><a href="'.$url.'salir"  style="color:black;">Salir</a></li>
							  				';
			  			}

			  		}else{
			  			echo '
			  				<li><a href="'.$url.'login">Ingresar<i class="material-icons">person_outline</i></a></li>
			  				<li class="hide-on-med-and-up"><a href="'.$url.'categorias">Categorias<i class="material-icons">drag_indicator</i></a></li>
							    <li class="hide-on-med-and-up"><a href="'.$url.'carritoCompras">Carriro<i class="icono-carrito material-icons " style="font-size: 25px;">add_shopping_cart</i></a></li>
							    <!-- li class="hide-on-med-and-up"><a href="'.$url.'notificaciones">Notificaciones<i class="material-icons">notifications_none</i></a></li -->
							    <li class="hide-on-med-and-up"><a href="'.$url.'historial">Hitorial<i class="material-icons">history</i></a></li>
							    <li class="divider" tabindex="-1"></li>
			  			';
			  		}

/*----------  impimir unos input con los ids de user par la validacion  ----------*/
			  		if (isset($_SESSION["validarSesion"])) {

			  			if ($_SESSION["validarSesion"] == "ok") {

			  				echo '
			  				<!--  -->								
			  				<input  type="hidden" name="inpIdUser" id="inpIdUser"  value="'.$_SESSION["idUser"].'">
			  				';
			  			}

			  		}else{
			  			echo '
			  			<!--  -->								
			  			<input  type="hidden" name="inpIdUser" id="inpIdUser"  value="0">
			  			';
			  		}
/*----------  impimir unos input con los ids de user par la validacion  ----------*/
			  	?>
			    
			    
			  </ul>

		</div>
	</div>

</header>

<script type="text/javascript">
	$('.dropdown-trigger').dropdown({
		coverTrigger:false,
		closeOnClick:true,
		restringeWidth:true
	});
</script>

<!--#232f3ef7------ #03a9f4c4 -->

<style type="text/css">
	/*
	//inicia SECCION DE DISEÑO DEl buscador
	*/
	.buscadorB{
	  width: auto;
	  vertical-align: middle;
	  white-space: nowrap;
	}

	.buscadorB input#search{
	  max-width: 680px;
	  min-width: 130px;
	  height: 50px;
	  background: white;
	  border: none;
	  font-size: 10pt;
	  float: left;
	  color: black;
	  padding-left: 15px;
	  -webkit-border-radius: 5px;
	  -moz-border-radius: 5px;
	  border-radius: 5px;
	}
	.buscadorB button{

	  margin-left: -40px;
	  
	  border-top-right-radius: 5px;
	  border-bottom-right-radius: 5px;
	 
	  border: none;
	  background: #d7d5d500;
	  height: 35px;
	  width: 40px;
	  color: black;
	  opacity: 1;
	  font-size: 10pt;
	 
	  -webkit-transition: all .55s ease;
	  -moz-transition: all .55s ease;
	  -ms-transition: all .55s ease;
	  -o-transition: all .55s ease;
	  transition: all .55s ease;
	}
	.container-4:hover button.icon, .container-4:active button.icon, .container-4:focus button.icon{
	    outline: none;
	    opacity: 1;
	    margin-left: -50px;
	}
	 
	.container-4:hover button.icon:hover{
	    background: white;
	}
	/*
	//termina SECCION DE DISEÑO DEl buscador
	*/


	.contenido-encabezado .blanco{
		color:white;
	}
	.contenido-encabezado .negro{
		color:black;
	}
	ul.dropdown-content{
    	width:auto !important;
	}
	header{
		background-color:#03a9f4c4 ;
		box-shadow:3px 4px 8px 0px rgba(11, 31, 69, 0.64);
	}
	.font-quicksand-sf{
		font-family: 'Quicksand', sans-serif;
	}

	.fuente-letra{
		font-family: 'Quicksand', sans-serif;
	}

	.stilo-input-buscar{
		color:white; font-size: 18px ; font-style: italic;border-bottom: 2px black solid;
	}
	.contenido-encabezado .blanco{
		color:white; 
	}


	/*
	// SECCION DE DISEÑO DE ICONO
	*/
	.icono-linea{
        width: 60%;
    }
    .h5-icono{
    	margin-top: -5px;
    	font-size: 20px;
    }


    .contenido-encabezado .e-ico hr{
    	padding: 1px;
    	background: white;
    	border: 0px;
    }
    
    .contenido-encabezado h5, .contenido-encabezado b{
    	color:white;
    }

    /*
	// SECCION DE DISEÑO DE fila-2-encabezado y fila 1 posisionamiento
	*/
	.contenido-encabezado{
		position: inherit;
		height: 100%;
	}
	.fila-1-encabezado{
		position: inherit;
		height: 60%;
		background-color: #3a8f7199;
	}
	.fila-2-encabezado{
		position: absolute;
		height: 0%;
		width: 100%;
		margin-top: -20px;
		
	}


    /*
	// SECCION DE DISEÑO DE LOGO CARRITO DE COMPRAS
	*/
	.cantidad-carrito {
	  position: relative;
	  top: -10px;
	  right: 10px;
	  color: red;
	  border:blue 1px solid;
	  border-radius:  50% ;
	  padding-left: 5px;
	  padding-right: 5px;
	  font-size: 15px;
	}

	.cantidad-carrito-2 {
	  position: relative;
	  top: -35px;
	  left: -10px;
	  color: red;
	  border:blue 1px solid;
	  border-radius:  50% ;
	  padding-left: 5px;
	  padding-right: 5px;

	}

	.icono-carrito{
		font-size: 35px; 
	}



	/*
	// SECCION DE DISEÑO DE busqueda
	*/

	.buscador{
		margin-left: 10px;
		background: red;
	}




.li-iconoCarrito-ayuda{
	font-size: 35px; 
	float: left; 
	width: 50%;
}
.ul-iconoCarrito-ayuda{
	list-style-type: none; padding: 0;
}

      @media(max-width: 600px){
      	.ayuda{
			margin-left: -15px;
		}
      }

      @media(min-width:  601px) and  (max-width:  992px) {
      	.cantidad-carrito {
		   top: -30px;
		  	right:  -15px; 

		}
		.ayuda{
			margin-left: 15px;
		}
		.li-iconoCarrito-ayuda{
			width: 30%;
			padding-left: 30px;
		}
      }

      @media(min-width:  993px) and  (max-width:  1200px) {
        .cantidad-carrito {
		  top: -10px;
		  right:  10px;  
		}
		.li-iconoCarrito-ayuda{
			width: 30%;
			padding-left: 45px;
		}
		.ul-iconoCarrito-ayuda{
		}
      }

      @media(min-width: 1201px) {

      }


</style>