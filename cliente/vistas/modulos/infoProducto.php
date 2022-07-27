<?php 
	$ruta = new Ruta();
	$url =  $ruta->controlRuta();

	$urlAdmin = $ruta->controlRutaAdmin();
?>


<div class="contenedor-info-producto fuente-letra">
	<div class="row" style="margin-top: 10px;">
		<div class="col s12 m12  l10 offset-l1 xl10 offset-xl1" style="background-color: white; border: 1px black ;padding-left: 10px; padding-right: 10px;">
			
			
				<?php
					$idProductosCampo = "idProductos"; 
					$idValor = $rutas[1];
					$idDesencriptado = base64_decode($idValor);
					//var_dump($idDesencriptado);
					$controladorCliente = new ControladorCliente();
					$infoProducto = $controladorCliente->infoProductosControl($idProductosCampo, $idDesencriptado);
					//var_dump($infoProducto);




					echo '




				<!-- colocando la ruta del pantalon -->

				<div class="row " style=" padding-top: 15px; background-color: #e4e0e040;padding-bottom: 10px;">
					<div class="col 10" >
						<a href="'.$url.'"><span class="block black-text font-estilo" >Inicio</span></a>
						<span>&nbsp; > &nbsp;</span>
						<a href="'.$url.$infoProducto["Nombres"].'"><span class="block black-text">'.$infoProducto["Nombres"].'</span></a>
						<span>&nbsp; > &nbsp;</span>
						<span class="block black-text">'. $rutas[0].'</span>
					</div> 
				</div>



				<!-- colocando el pantalon -->

				<div class="row">
						<div class="col s12 m6 l5 xl5 center-align visor-img">
							<div class="row titulo hide-on-med-and-up show-on-small" style="padding: 0px;margin-bottom: 0px;">
								<span class="titulo-producto"> <h5>'.$infoProducto["Titulo"].'</h5></span>

								';
								
								echo '
								

								<!-- datos ocultos del producto -->								
								<input  type="hidden" name="inpIdProductos" id="inpIdProductos"  value="'.$infoProducto["idProductos"].'">
								<input  type="hidden" name="inpTitulo" id="inpTitulo"  value="'.$infoProducto["Titulo"].'">
							</div>
							<div class="row calificacion hide-on-med-and-up show-on-small" style="padding-bottom: 0px;margin-bottom: 0px;margin-top: 0px;">
									<span class="ciudad " style="margin-left: 0px;">
												Zacualtipan
									</span>
									<span class="calificacion-slider" style="margin-left:15px;">								
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
									</span>
									<span class="precio-envio" style="margin-left:15px;">
										Envio gratis
									</span>
							</div>
							<figure class="visor  center-align" >
								<img id="lupa1" src="'.$urlAdmin.$infoProducto["FotoFrontal"].'" alt="" class="responsive-img " >
								<img id="lupa2" src="'.$urlAdmin.$infoProducto["FotoLateral"].'" alt="" class="responsive-img ">
								<img id="lupa3" src="'.$urlAdmin.$infoProducto["FotoTrasera"].'" alt="" class="responsive-img  ">
							</figure>

							<!-- Place somewhere in the <body> of your page -->
								
							<div class="flexslider col xl9 l9 m5 s10 offset-s1  center-align" style="margin-top: -10px;">
									<ul class="slides center-align">
										<li >
											<img class="center-align responsive-img " src="'.$urlAdmin.$infoProducto["FotoFrontal"].'" alt=""   value="1">
										</li>
										<li >
											<img class="center-align responsive-img" src="'.$urlAdmin.$infoProducto["FotoLateral"].'" alt=""  value="2">
										</li>
										<li >
											<img class="center-align responsive-img" src="'.$urlAdmin.$infoProducto["FotoTrasera"].'" alt=""  value="3">
										</li>
										
									</ul>
							</div>
						</div>
						<div class="col s12 m6  l6 offset-l1 xl6 offset-xl1 info" >
								<div class="row titulo hide-on-small-only">
									<span class="titulo-producto"> <h4>'.$infoProducto["Titulo"].'</h4></span>
									<hr style="border: solid 1px #e4e0e0ba;" >
								</div>

								<div class="row calificacion hide-on-small-only" >
									<span class="ciudad " style="margin-left:12px;">
												Zacualtipan
									</span>
									<span class="calificacion-slider" style="margin-left:15px;">								
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
									</span>
									<span class="precio-envio green-text " style="margin-left:15px;">
										Envio gratis
									</span>
								</div>

								';
								if ($infoProducto["Oferta"] != 0 and $infoProducto["Nuevo"]) {/* sentencia para las ofertas y nuevas al seleccionar categorias*/
									$precio = $infoProducto["Oferta"];

										echo '
											<div class="row  precio">
												<span class="precio-color col l6 s5 offset-s1"><span class="light-blue" >&nbsp;	Nuevo &nbsp;</span></span>
												<span class="precio-color col l6 s5 offset-s1"><span class="light-green accent-4" >&nbsp;	Oferta &nbsp;</span></span>
											</div> 
											<div class="row  precio">
												<span class="precio-oficial col l6 s5 offset-s1">Precio: $'.$infoProducto["Precio"].'</span>
												<span class="precio-oferta col l6 s5 offset-s1">Oferta:$'.$precio.'</span>
												<!--  -->	
							  					<input  type="hidden" class="precioUno"  value="'.$precio.'">
							  					<!--  -->
											</div>
										';
									} else if ($infoProducto["Nuevo"]) {/* sentencia para las nuevas al seleccionar categorias*/
										$precio = $infoProducto["Precio"];
										echo '
											<div class="row  precio">
												<span class="precio-color col l6 s5 offset-s1"><span class="light-blue" >&nbsp;	Nuevo &nbsp;</span></span>
											</div>
											<div class="row  precio">
												<span id="precio-oferta" class="precio-oferta col l6 s5 offset-s1">Precio: $'.$precio.'</span>
												<!--  -->	
							  					<input  type="hidden" class="precioUno"  value="'.$precio.'">
							  					<!--  -->
											</div>
										';
									} else if($infoProducto["Oferta"] != 0) {/* sentencia para las ofertas al seleccionar categorias*/
										$precio = $infoProducto["Oferta"];

										echo '
											<div class="row  precio">
												<span class="precio-color col l6 s5 offset-s1"><span class="light-green accent-4" >&nbsp;	Oferta &nbsp;</span></span>
											</div>
											<div class="row  precio">
												<span class="precio-oficial col l6 s5 offset-s1 ">Precio: $'.$infoProducto["Precio"].'</span>
												<span id="precio-oferta" class="precio-oferta col l6 s5 offset-s1">Oferta:$'.$precio.'</span>
												<!--  -->	
							  					<input  type="hidden" class="precioUno"  value="'.$precio.'">
							  					<!--  -->
											</div>
													';
									}else{/* sentencia para las normales al seleccionar categorias*/
										$precio = $infoProducto["Precio"];
										echo '
											<div class="row  precio">
												<span id="precio-oferta" class="precio-oferta col l6 s5 offset-s1">Precio:&nbsp;$'.$precio.'</span>
												<!--  -->	
							  					<input  type="hidden" class="precioUno"  value="'.$precio.'">
							  					<!--  -->
											</div>
										';
									}
									
								
								echo '
								<div class="row  genero-tipo">
									<div class="col xl6 l6 s5 offset-s1">Genero: '.$infoProducto["Nombres"].'</div>
									<div class="col xl6 l6 s5 offset-s1">Marca: '.$infoProducto["Nombre"].'</div>
								</div>
								<div class="row  talla-color" >
									<div class="col xl6 l6 s5 offset-s1" >Talla: '.$infoProducto["Talla"].'</div>
									<div class="col xl6 l6 s5 offset-s1" >color: '.$infoProducto["Color"].'</div>
								</div>
								<div class="row  cantidad-pro">
									<div class="col xl3 offset-xl0 l3 offset-l0 s4  offset-s1  ">
										
															
										<div class="input-fiel">	
											<select name="cantidadPro" class="cantidadPro" id="cantidadPro">';
											if ($infoProducto["Cantidad"] > 0) {
												for ($i=1; $i <= $infoProducto["Cantidad"]; $i++) { 
													echo '
														<option value="'.$i.'">uds.'.$i.'</option>
													';
												}
											} else {
												echo '
														<option >Sin Existencia</option>
													';
											}

											
											
												// <option value="1" selected>uds. '.$infoProducto["Cantidad"].'</option>
												// <option value="2">uds. 2</option>
												// <option value="3">uds. 3</option>
												// <option value="4">uds. 4</option>
												// <option value="5">uds. 5</option>
												// <option value="6">uds. 6</option>
												// <option value="7">uds. 7</option>
												// <option value="8">uds. 8</option>
								echo '
											</select>
											
										</div>
									</div>

									<!-- input oculto que almacena el precio de u solo producto -->								
									<input  type="hidden" name="valorPrecio" id="valorPrecio"  value="'.$precio.'">

									<div class="col xl6 offset-xl3 l6 offset-l3 s3 offset-s2 precio-total">
								          Total :$
								            <input disabled type="text" name="valor1" id="valorTotal"  value="'.$precio.'">
								           
									</div>
								</div>
								<div class="row  compra-agrega" style="margin-top: 5px;">
								';
								if (isset($_SESSION["validarSesion"])) {

						  			if ($_SESSION["validarSesion"] == "ok") {
						  				
						  				echo '
						  					<!--  -->	
						  					<input  type="hidden" name="idUsuarioCompra" class="usuarioCompra"  value="'.$_SESSION["idUser"].'">
						  					<!--  -->
											<div class="col xl5  l5   s6 offset-s1 ">
												<a class="btn waves-effect waves-light" style="padding: 0px;" id="btnAgregarCarrito"> <small>&nbsp; agregar a carrito&nbsp;</small>
												</a>
											</div>
											<div class="col  xl5 offset-xl1 l5 offset-l1 s5 ">
												<a  class="btn waves-effect waves-light " id="btnComprar-Info" style="padding: 0px;"><small> &nbsp;Comprar &nbsp;</small>
												</a>
											</div>
										';
						  			}

						  		}else{
						  			echo '
						  				<!--  -->								
										<div class="col xl8  l10   s10 offset-s1 ">
										<h6>Iniciar sesión para generar compra</h6>
											<a href="'.$url.'login" class="btn waves-effect waves-light" style="padding: 0px;" id=""> <small>&nbsp;Iniciar sesión  &nbsp;</small>
											</a>
										</div>
						  			';
						  		}
								echo '
																		
								</div>
						</div>

				</div>
					';
				?>
			
			<hr style="border: solid 1px #e4e0e0ba;">
		</div>
	</div>
</div>
