<div class="col xl12 l12 m10 s12 font-estilo ">

	<?php 
		$controladorCliente = new ControladorCliente();
		echo '
				<div class="row navegacion-cp">
					<span>
						<a href="index.php"><b class="error404">Inicio</b></a> / <a href="'.$url.$rutas[0].'"><b class="error404">'.$rutas[0].'</b></a>  ...
					</span>
				</div>				
		';
		/*=============================================
		=            LLamado de paginacion            =
		=============================================*/
		// var_dump($rutas);
		if (isset($rutas[1])) {

			$base = ($rutas[1] - 1)*15;
			$tope =15;
			
		} else {
			$rutas[1] = 1;
			$base = 0;
			$tope =15;
		}
		// echo $base ." sigue". $tope;
		
		
		
		/*=====  End of LLamado de paginacion  ======*/
		
		/*=============================================
		= LLamado de ofertas, nuevas y categorias  =
		=============================================*/
		if ($rutas[0] == "Productos ofertas" ) {/* sentencia para llenar parametros las ofertas*/
		
			$item0="Oferta";
			$idCategoria = null;
			echo '
				<style type="text/css">
		            .barra-lateral-productos{
		                display: none;
		            }
		            .ocultarymos{
		            	display:block;
		            }
			    </style>
			';

		}else if ($rutas[0] == "Productos nuevos") {/* sentencia para llenar parametros las nuevas*/
			$item0="Nuevo";
			$idCategoria = null;
			echo '
				<style type="text/css">
		            .barra-lateral-productos{
		                display: none;
		            }
		            .ocultarymos{
		            	display:block;
		            }
			    </style>
			';

							
		}else{/* sentencia para llenar parametros cuando se seleccione una categoria */
			$campo1="Nombres" ;
			$valorC = $rutas[0];
			echo '
				<style type="text/css">
		            .barra-lateral-productos{
		                display: none;
		            }
		            .ocultarymos{
		            	display:block;
		            }
			    </style>
			';

			$obtenerCategorias = $controladorCliente->rutasCategoriasControl($campo1, $valorC);
			$idCategoria = $obtenerCategorias["idCategorias"];	
			$item0=null;		
		}

	/* consulta de productos dependiendo de que parametros se lleno anteriormente */
		$productosVitrina = $controladorCliente->mostrarVitrinaProductosControl($idCategoria, $item0, $base, $tope);
		//var_dump(count($productosVitrina));




	//para listar el paginado
		$item01 = "idCategorias";
		$listaProductos =  $controladorCliente->listarProductosControl($item01, $idCategoria, $item0);








		if (!$productosVitrina) {/* sentencia para cuando no existe ningun producto en oferta o en nuevos o en alguna categoria*/
			echo '
				<div class="row center-align">
					<h4 >LO SENTIMOS, POR EL MOMENTO NO EXISTEN PRODUCTOS SOBRE LO QUE ÚSTED BUSCA</h4>
					<h5>Volver mas tarde</h5>
					<hr>
					<span><a href="index.php">INICIO</a></span>
				</div>
			';
		}else{
			echo '
				<!-- de tableta a pc -->
				<div class="display">
					<div class="row articulos-contenedor">';

					foreach ($productosVitrina as $key => $value) {/* impriemiendo los productos de 0 a 12 */
						
						$id = $value["idProductos"];
						// var_dump($id);
						 //$idEncriptado = base64_encode($id);
						 // var_dump($idEncriptado);
						 // $idDesencriptado = base64_decode($idEncriptado);
						 // var_dump($idDesencriptado);
						echo '
							<div class="articulo">
								<figure>
									<a href="'.$url.$value["Titulo"].'/'.base64_encode($id).'">
										<img src="'.$urlAdmin.$value["FotoFrontal"].'">
									</a>
								</figure>
								<div class="info-articulo">
									<div class="estado">
							';
								if ($rutas[0] == "Productos ofertas") {/* sentencia para las ofertas*/
									echo '
										<span class="estado-articulo-ofer left-align">
											&nbsp;	Oferta &nbsp;
										</span>
										<span class="ciudad ">
											Zacualtipan
										</span>
									</div>
									<div class="estado-precio">
										<span class="precio-oficial">
											<strong>$'.$value["Precio"].'</strong>
										</span>
										<span class="precio-ofer">
											$'.$value["Oferta"].'
										</span>
										<span class="precio-envio">
											Envio gratis
										</span>
									</div>
									';
								} else if ($rutas[0] == "Productos nuevos") {/* sentencia para las nuevas*/
									echo '
										<span class="estado-articulo left-align">
											&nbsp;	Nuevo &nbsp;
										</span>
										<span class="ciudad ">
											Zacualtipan
										</span>
									</div>
									<div class="estado-precio">
										<span class="precio-ofer" style="margin-left: 0px;">
											$'.$value["Precio"].'
										</span>
										<span class="precio-envio">
											Envio gratis
										</span>
									</div>
									';
								}else{/* sentencia para los productos al seleccionar alguna catgoria */

									 if ($value["Oferta"] != 0 and $value["Nuevo"]) {/* sentencia para las ofertas y nuevas al seleccionar categorias*/
										echo '
											<span class="estado-articulo-ofer left-align">
												&nbsp;	Oferta &nbsp;
											</span>
											<span class="estado-articulo left-align">
												&nbsp;	Nuevo &nbsp;
											</span>
										
										</div>
										<span class="ciudad " style="margin-left: 0px;">
												Zacualtipan
										</span>
										<div class="estado-precio">
											<span class="precio-oficial">
												<strong>$'.$value["Precio"].'</strong>
											</span>
											<span class="precio-ofer">
												$'.$value["Oferta"].'
											</span>
											<span class="precio-envio">
												Envio gratis
											</span>
										</div>
										';
									} else if ($value["Nuevo"]) {/* sentencia para las nuevas al seleccionar categorias*/
										echo '
											<span class="estado-articulo left-align">
												&nbsp;	Nuevo &nbsp;
											</span>
											<span class="ciudad ">
												Zacualtipan
											</span>
										</div>
										<div class="estado-precio">
											<span class="precio-ofer" style="margin-left: 0px;">
												$'.$value["Precio"].'
											</span>
											<span class="precio-envio">
												Envio gratis
											</span>
										</div>
										';
									} else if($value["Oferta"] != 0) {/* sentencia para las ofertas al seleccionar categorias*/

										echo '
											<span class="estado-articulo-ofer left-align">
												&nbsp;	Oferta &nbsp;
											</span>
											<span class="ciudad ">
												Zacualtipan
											</span>
										</div>
										<div class="estado-precio">
											<span class="precio-oficial">
												<strong>$'.$value["Precio"].'</strong>
											</span>
											<span class="precio-ofer">
												$'.$value["Oferta"].'
											</span>
											<span class="precio-envio">
												Envio gratis
											</span>
										</div>
										';
									}else{/* sentencia para las normales al seleccionar categorias*/
										echo '
											<span class="ciudad " style="margin-left: 0px;">
												Zacualtipan
											</span>
										</div>
										<div class="estado-precio">
											<span class="precio-ofer" style="margin-left: 0px;">
												$'.$value["Precio"].'
											</span>
											<span class="precio-envio">
												Envio gratis
											</span>
										</div>
										';
									}
									
								}
									
							echo '
									<span class="descripcion">
										<b>'.$value["Titulo"].'</b>
                        				'.$value["Descripcion"].'
									</span>
									<span class="calificacion-estrellas">
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
										<i class="material-icons">star</i>
									</span>
								</div>
							</div>
						';
					}
				echo '
					</div>	
				</div>
				';




			echo '
				<!-- de celular grande -->
				<div class="display2" style="padding: 10px;">
					<div class="row articulo-contenedor-lista">';

					foreach ($productosVitrina as $key => $value) { /* impriemiendo los productos de 0 a 12 */
						$id = $value["idProductos"];
						
						echo '
						<div class="articulo-lista col s12">
							<div class="row">
								<div class="col s5">
									<figure>
										<a href="'.$url.$value["Titulo"].'/'.base64_encode($id).'">
											<img src="'.$urlAdmin.$value["FotoFrontal"].'">
										</a>
									</figure>
								</div>
								<div class="col s6">
									<div class="info-articulos-lista">
										<div class="descripcion-lista">
											<span class="titulo-lista">
												<a href="'.$url.$value["Titulo"].'/'.base64_encode($id).'">
													<b>'.$value["Titulo"].'</b>
												</a>
											</span>
											<hr style="width: 110%;">
											<span class="descripcion-cuerpo">
												'.$value["Descripcion"].'
											</span>
										</div>
									';
									if ($rutas[0] == "Productos ofertas") {/* sentencia para las ofertas*/
										echo '
											<div class="estado">
												<span class="estado-articulo-ofer left-align">
													&nbsp;	Oferta &nbsp;
												</span>
												<span class="ciudad ">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio">
												<span class="precio-oficial">
													<strong>$'.$value["Precio"].'</strong>
												</span>
												<span class="precio-ofer">
													$'.$value["Oferta"].'
												</span>
												<span class="precio-envio">
													Envio gratis
												</span>
											</div>
										';
									} else if ($rutas[0] == "Productos nuevos") {/* sentencia para las nuevas*/
										echo '
											<div class="estado-lista">
												<span class="estado-articulo-lista">
													&nbsp;	Nuevo &nbsp;
												</span>
												<span class="ciudad-lista">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio-lista">
												<span class="precio-oficial-lista-ofer" style="margin-left: 0px;">
													$'.$value["Precio"].'
												</span>
												<span class="precio-envio">
													Envio Gratis
												</span>
											</div>
										';
									}else{/* sentencia para los productos al seleccionar alguna catgoria */

									 if ($value["Oferta"] != 0 and $value["Nuevo"]) {/* sentencia para las ofertas y nuevas al seleccionar categorias*/
										echo '
											<div class="estado-lista">
												<span class="estado-articulo-lista">
												&nbsp;	Nuevo 	&nbsp;
												</span>
												<span class="estado-articulo-lista-ofer">
												&nbsp;	Oferta 	&nbsp;
												</span>
												<span class="ciudad-lista">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio-lista">
												<span class="precio-oficial-lista">
													<strong>
														$'.$value["Precio"].'
													</strong>
												</span>
												<span class="precio-oficial-lista-ofer">
													$'.$value["Oferta"].'
												</span>
												<span class="precio-envio">
													Envio Gratis
												</span>
											</div>
														';
									} else if ($value["Nuevo"]) {/* sentencia para las nuevas al seleccionar categorias*/
										echo '
											<div class="estado-lista">
												<span class="estado-articulo-lista">
													&nbsp;	Nuevo &nbsp;
												</span>
												<span class="ciudad-lista">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio-lista">
												<span class="precio-oficial-lista-ofer" style="margin-left: 0px;">
													$'.$value["Precio"].'
												</span>
												<span class="precio-envio">
													Envio Gratis
												</span>
											</div>
										';
									} else if($value["Oferta"] != 0) {/* sentencia para las ofertas al seleccionar categorias*/

										echo '
											<div class="estado">
												<span class="estado-articulo-ofer left-align">
													&nbsp;	Oferta &nbsp;
												</span>
												<span class="ciudad ">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio">
												<span class="precio-oficial">
													<strong>$'.$value["Precio"].'</strong>
												</span>
												<span class="precio-ofer">
													$'.$value["Oferta"].'
												</span>
												<span class="precio-envio">
													Envio gratis
												</span>
											</div>
										';
									}else{/* sentencia para las normales al seleccionar categorias*/
										echo '
											<div class="estado-lista">
												<span class="ciudad-lista">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio-lista" >
												<span class="precio-oficial-lista-ofer" style="margin-left: 0px;">
													$'.$value["Precio"].'
												</span>
												<span class="precio-envio">
													Envio Gratis
												</span>
											</div>
										';
									}
									
								}
									
									echo '
										<span class="calificacion-estrellas">
											<i class="material-icons">star</i>
											<i class="material-icons">star</i>
											<i class="material-icons">star</i>
											<i class="material-icons">star</i>
											<i class="material-icons">star</i>
										</span>
									</div>
								</div>
							</div>
						</div>
							';
					}
				echo '
					</div>	
				</div>
				';



			echo '
			<!-- para dispositivos pequeños -->
				<div class="display3" style="padding: 10px;">
					<div class="row articulo-contenedor-lista " >
					';

					foreach ($productosVitrina as $key => $value) { /* impriemiendo los productos de 0 a 12 */
						$id = $value["idProductos"];
						echo '
							<div class="articulo-lista-movil col s10 offset-s1">
								<div class="row center-align">
									<a href="'.$url.$value["Titulo"].'/'.base64_encode($id).'">
										<img src="'.$urlAdmin.$value["FotoFrontal"].'">
									</a>
								</div>
								<div class="row center-align">
									<div class="info-articulos-lista">
										<div class="descripcion-lista">
											<span class="titulo-lista">
												<a href="'.$url.$value["Titulo"].'/'.base64_encode($id).'">
													<b>'.$value["Titulo"].'</b>
												</a>
											</span>
											<br>
											<span class="descripcion-cuerpo">
												'.$value["Descripcion"].'
											</span>
										</div>
																
									';
									if ($rutas[0] == "Productos ofertas") {/* sentencia para las ofertas*/
										echo '
											<div class="estado-lista">
												<span class="estado-articulo-lista-ofer">
													&nbsp;	Oferta 	&nbsp;
												</span>
												<span class="ciudad-lista">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio-lista">
												<span class="precio-oficial-lista">
													<strong>
														$'.$value["Precio"].'
													</strong>
												</span>
												<span class="precio-oficial-lista-ofer">
													$'.$value["Oferta"].'
												</span>
												<span class="precio-envio">
													Envio Gratis
												</span>
											</div>
										';
									} else if ($rutas[0] == "Productos nuevos") {/* sentencia para las nuevas*/
										echo '
											<div class="estado-lista">
												<span class="estado-articulo-lista">
													&nbsp;	Nuevo 	&nbsp;
												</span>
												<span class="ciudad-lista">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio-lista">
												<span class="precio-oficial-lista-ofer">
													$'.$value["Precio"].'
												</span>
												<span class="precio-envio">
													Envio Gratis
												</span>
											</div>
										';
									}else{/* sentencia para los productos al seleccionar alguna catgoria */

									 	if ($value["Oferta"] != 0 and $value["Nuevo"]) {/* sentencia para las ofertas y nuevas al seleccionar categorias*/
											echo '
												<div class="estado-lista">
													<span class="estado-articulo-lista">
														&nbsp;	Nuevo 	&nbsp;
													</span>
													<span class="estado-articulo-lista-ofer">
														&nbsp;	Oferta 	&nbsp;
													</span>
													<span class="ciudad-lista">
														Zacualtipan
													</span>
												</div>
												<div class="estado-precio-lista">
													<span class="precio-oficial-lista">
														<strong>
															$'.$value["Precio"].'
														</strong>
													</span>
													<span class="precio-oficial-lista-ofer">
														$'.$value["Oferta"].'
													</span>
													<span class="precio-envio">
														Envio Gratis
													</span>
												</div>
											';
										} else if ($value["Nuevo"]) {/* sentencia para las nuevas al seleccionar categorias*/
											echo '
												<div class="estado-lista">
													<span class="estado-articulo-lista">
														&nbsp;	Nuevo 	&nbsp;
													</span>
													<span class="ciudad-lista">
														Zacualtipan
													</span>
												</div>
												<div class="estado-precio-lista">
													<span class="precio-oficial-lista-ofer">
														$'.$value["Precio"].'
													</span>
													<span class="precio-envio">
														Envio Gratis
													</span>
												</div>
											';
										} else if($value["Oferta"] != 0) {/* sentencia para las ofertas al seleccionar categorias*/

											echo '
												<div class="estado-lista">
													<span class="estado-articulo-lista-ofer">
														&nbsp;	Oferta 	&nbsp;
													</span>
													<span class="ciudad-lista">
														Zacualtipan
													</span>
												</div>
												<div class="estado-precio-lista">
													<span class="precio-oficial-lista">
														<strong>
															$'.$value["Precio"].'
														</strong>
													</span>
													<span class="precio-oficial-lista-ofer">
														$'.$value["Oferta"].'
													</span>
													<span class="precio-envio">
														Envio Gratis
													</span>
												</div>
											';
										}else{/* sentencia para las normales al seleccionar categorias*/
										echo '
											<div class="estado-lista">
												<span class="ciudad-lista">
													Zacualtipan
												</span>
											</div>
											<div class="estado-precio-lista">
												<span class="precio-oficial-lista-ofer">
													$'.$value["Precio"].'
												</span>
												<span class="precio-envio">
													Envio Gratis
												</span>
											</div>
										';
									}
									
								}
									
									echo '
										<div class="row center-align">
											<span class=" col s5 offset-s4 calificacion-estrellas">
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
												<i class="material-icons">star</i>
											</span>
										</div>
									</div>
								</div>
							</div>

							';
					}
				echo '
					</div>	
				</div>
				';

		}

			/*=============================================
			=          PAGINACION         =
			=============================================*/
			
			if (count($listaProductos) != 0) {
				# code...
				$pagProductos = ceil(count($listaProductos)/15);
				if ($pagProductos > 4) {
			/*=============================================
			=          BUTTONES DE LAS PRIMERAS 4 PAGINAS    =
			=============================================*/
					if ($rutas[1] == 1) {
						
						echo '<ul class="pagination center-align">';
							for ($i=1; $i <= 4; $i++) { 
								# code...
								echo '
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>
								';
							}
							echo '
									<li class="waves-effect disabled">. &nbsp;. &nbsp;.</li>
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/2"><i class="material-icons">chevron_right</i></a></li>
								';

						echo '</ul>';
					}
			
			/*=============================================
			=          BUTTONES DE LA MITAD HACIA ABAJO    =
			=============================================*/
					else if ($rutas[1] != $pagProductos && $rutas[1] != 1 && $rutas[1] < ($pagProductos/2) && $rutas[1] < ($pagProductos-3) ) {
						
						$numPagActual =$rutas[1];

						echo '<ul class="pagination center-align">
									<li class=" waves-effect"><a href="'.$url.$rutas[0].'/'.($numPagActual - 1).'"><i class="material-icons">chevron_left</i></a></li>';
							for ($i=$numPagActual; $i <=($numPagActual + 3); $i++) { 
								# code...
								echo '
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>
								';
							}
							echo '
									<li class="waves-effect disabled">. &nbsp;. &nbsp;.</li>
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.($numPagActual + 1).'"><i class="material-icons">chevron_right</i></a></li>
								';

						echo '</ul>';

					}
			/*=============================================
			=          BUTTONES DE LA MITAD HACIA ARRIBA    =
			=============================================*/
					else if ($rutas[1] != $pagProductos && $rutas[1] != 1 && $rutas[1] >= ($pagProductos/2) && $rutas[1] < ($pagProductos-3) ) {

						$numPagActual =$rutas[1];
						echo '<ul class="pagination center-align">
									<li class="disabled"><a href="'.$url.$rutas[0].'/'.($numPagActual - 1).'"><i class="material-icons">chevron_left</i></a></li>
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/1">1</a></li>
									<li class="waves-effect disabled">.&nbsp; .&nbsp; .</li>';
							for ($i=$numPagActual; $i <=($numPagActual + 3); $i++) { 
								# code...
								echo '
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>
								';
							}
							echo '
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.($numPagActual + 1).'"><i class="material-icons">chevron_right</i></a></li>
								';
						echo '</ul>';
					}
			/*=============================================
			=          BUTTONES DE LAS ultimas 4 PAGINAS    =
			=============================================*/
					else{
						$numPagActual =$rutas[1];
						echo '<ul class="pagination center-align">
									<li class="disabled"><a href="'.$url.$rutas[0].'/'.($numPagActual - 1).'"><i class="material-icons">chevron_left</i></a></li>
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/1">1</a></li>
									<li class="waves-effect disabled">.&nbsp; .&nbsp; .</li>';
							for ($i = ($pagProductos-3); $i <= $pagProductos; $i++) { 
								# code...
								echo '
									<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>
								';
							}
						echo '</ul>';
					}

				} else {
					# code...
					echo '<ul class="pagination center-align">';
						for ($i=1; $i <= $pagProductos; $i++) { 
							# code...
							echo '
								<li class="waves-effect"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>
								';
						}
					echo '</ul>';
				}

				
			} else {
				# code...
			}
			

	?>
	
		<!-- <ul class="pagination left-align">
		    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
		    <li class="active"><a href="#!">1</a></li>
		    <li class="waves-effect"><a href="#!">2</a></li>
		    <li class="waves-effect"><a href="#!">3</a></li>
		    <li class="waves-effect"><a href="#!">4</a></li>
		    <li class="waves-effect disabled">. . .</li>
		    <li class="waves-effect"><a href="#!">x</a></li>
		    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
		</ul> -->
</div>
			<!-- nuevo y oferta -->
			<!-- <div class="articulo">
				<figure>
					<a href="#">
						<img src="<?php //echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon8.jpg">
					</a>
				</figure>
				<div class="info-articulo">
					<div class="estado">
						<span class="estado-articulo left-align">
							&nbsp;	Nuevo &nbsp;
						</span>
						<span class="ciudad ">
							Zacualtipan
						</span>
					</div>
					<div class="estado-precio">
						<span class="precio-oficial">
							<strong>$400</strong>
						</span>
						<span class="precio-ofer">
							$300
						</span>
						<span class="precio-envio">
							Envio gratis
						</span>
					</div>
					<span class="descripcion">
						<b>Titulo Producto</b>
						Descripcion de producto Lo almacenado en la base de datos...
					</span>
					<span class="calificacion-estrellas">
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
					</span>
				</div>
			</div> -->

			<!-- nuevo -->
			<!-- <div class="articulo">
				<figure>
					<a href="#">
						<img src="<?php //echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon.jpg">
					</a>
				</figure>
				<div class="info-articulo">
					<div class="estado">
						<span class="estado-articulo left-align">
							&nbsp;	Nuevo &nbsp;
						</span>
						<span class="ciudad ">
							Zacualtipan
						</span>
					</div>
					<div class="estado-precio">
						<span class="precio-ofer" style="margin-left: 0px;">
							$300
						</span>
						<span class="precio-envio">
							Envio gratis
						</span>
					</div>
					<span class="descripcion">
						<b>Titulo Producto</b>
						Descripcion de producto Lo almacenado en la base de datos...
					</span>
					<span class="calificacion-estrellas">
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
					</span>
				</div>
			</div> -->

			<!-- oferta -->
			<!-- <div class="articulo">
				<figure>
					<a href="#">
						<img src="<?php //echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon1.jpg">
					</a>
				</figure>
				<div class="info-articulo">
					<div class="estado">
						<span class="estado-articulo-ofer left-align">
							&nbsp;	Oferta &nbsp;
						</span>
						<span class="ciudad ">
							Zacualtipan
						</span>
					</div>
					<div class="estado-precio">
						<span class="precio-oficial">
							<strong>$400</strong>
						</span>
						<span class="precio-ofer">
							$300
						</span>
						<span class="precio-envio">
							Envio gratis
						</span>
					</div>
					<span class="descripcion">
						<b>Titulo Producto</b>
						Descripcion de producto Lo almacenado en la base de datos...
					</span>
					<span class="calificacion-estrellas">
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
					</span>
				</div>
			</div> -->

			<!--no es  nuevo y sin oferta -->
			<!-- <div class="articulo">
				<figure>
					<a href="#">
						<img src="<?php //echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon2.jpg">
					</a>
				</figure>
				<div class="info-articulo">
					<div class="estado">
						<span class="ciudad " style="margin-left: 0px;">
							Zacualtipan
						</span>
					</div>
					<div class="estado-precio">
						<span class="precio-ofer" style="margin-left: 0px;">
							$300
						</span>
						<span class="precio-envio">
							Envio gratis
						</span>
					</div>
					<span class="descripcion">
						<b>Titulo Producto</b>
						Descripcion de producto Lo almacenado en la base de datos...
					</span>
					<span class="calificacion-estrellas">
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
						<i class="material-icons">star</i>
					</span>
				</div>
			</div> -->




<!-- de celular grande -->
	<!-- <div class="display2" style="padding: 10px;">
		<div class="row articulo-contenedor-lista"> -->

			<!-- producto nuevo y descuento -->
			<!-- <div class="articulo-lista col s12">
				<div class="row">
					<div class="col s4">
						<figure>
							<a href="">
								<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon8.jpg" class="responsive-img" >
							</a>
						</figure>
					</div>
					<div class="col s6">
						<div class="info-articulos-lista">
							<div class="descripcion-lista">
								<span class="titulo-lista">
									<a href="">
										<b>Titulo de producto</b>
									</a>
								</span>
								<hr style="width: 110%;">
								<span class="descripcion-cuerpo">
									Descripcion de producto que estara almacenada en la base de datos
								</span>
							</div>
							<div class="estado-lista">
								<span class="estado-articulo-lista">
								&nbsp;	Nuevo 	&nbsp;
								</span>
								<span class="estado-articulo-lista-ofer">
								&nbsp;	Oferta 	&nbsp;
								</span>
								<span class="ciudad-lista">
									Zacualtipan
								</span>
							</div>
							<div class="estado-precio-lista">
								<span class="precio-oficial-lista">
									<strong>
										$500
									</strong>
								</span>
								<span class="precio-oficial-lista-ofer">
									$300
								</span>
								<span class="precio-envio">
									Envio Gratis
								</span>
							</div>
							<span class="calificacion-estrellas">
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</span>
						</div>
					</div>
				</div>
			</div> -->

			<!-- producto nuevo -->
			<!-- <div class="articulo-lista col s12">
				<div class="row">
					<div class="col s4">
						<figure>
							<a href="">
								<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon.jpg" class="responsive-img" >
							</a>
						</figure>
					</div>
					<div class="col s6">
						<div class="info-articulos-lista">
							<div class="descripcion-lista">
								<span class="titulo-lista">
									<a href="">
										<b>Titulo de producto</b>
									</a>
								</span>
								<hr style="width: 110%;">
								<span class="descripcion-cuerpo">
									Descripcion de producto que estara almacenada en la base de datos
								</span>
							</div>
							<div class="estado-lista">
								<span class="estado-articulo-lista">
									&nbsp;	Nuevo &nbsp;
								</span>
								<span class="ciudad-lista">
									Zacualtipan
								</span>
							</div>
							<div class="estado-precio-lista">
								<span class="precio-oficial-lista-ofer" style="margin-left: 0px;">
									$300
								</span>
								<span class="precio-envio">
									Envio Gratis
								</span>
							</div>
							<span class="calificacion-estrellas">
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</span>
						</div>
					</div>
				</div>
			</div> -->

				<!-- producto Oferta -->
			<!-- <div class="articulo-lista col s12">
				<div class="row">
					<div class="col s4">
						<figure>
							<a href="">
								<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon1.jpg" class="responsive-img" >
							</a>
						</figure>
					</div>
					<div class="col s6">
						<div class="info-articulos-lista">
							<div class="descripcion-lista">
								<span class="titulo-lista">
									<a href="">
										<b>Titulo de producto</b>
									</a>
								</span>
								<hr style="width: 110%;">
								<span class="descripcion-cuerpo">
									Descripcion de producto que estara almacenada en la base de datos
								</span>
							</div>
							<div class="estado-lista">
								<span class="estado-articulo-lista-ofer">
									&nbsp;	Oferta &nbsp;
								</span>
								<span class="ciudad-lista">
									Zacualtipan
								</span>
							</div>
							<div class="estado-precio-lista">
								<span class="precio-oficial-lista">
									<strong>
										$500
									</strong>
								</span>
								<span class="precio-oficial-lista-ofer">
									$300
								</span>
								<span class="precio-envio">
									Envio Gratis
								</span>
							</div>
							<span class="calificacion-estrellas">
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</span>
						</div>
					</div>
				</div>
			</div> -->

			<!-- producto normal -->
			<!-- <div class="articulo-lista col s12">
				<div class="row">
					<div class="col s4">
						<figure>
							<a href="">
								<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon2.jpg" class="responsive-img" >
							</a>
						</figure>
					</div>
					<div class="col s6">
						<div class="info-articulos-lista">
							<div class="descripcion-lista">
								<span class="titulo-lista">
									<a href="">
										<b>Titulo de producto</b>
									</a>
								</span>
								<hr style="width: 110%;">
								<span class="descripcion-cuerpo">
									Descripcion de producto que estara almacenada en la base de datos
								</span>
							</div>
							<div class="estado-lista">
								<span class="ciudad-lista">
									Zacualtipan
								</span>
							</div>
							<div class="estado-precio-lista">
								<span class="precio-oficial-lista-ofer" style="margin-left: 0px;">
									$300
								</span>
								<span class="precio-envio">
									Envio Gratis
								</span>
							</div>
							<span class="calificacion-estrellas">
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</span>
						</div>
					</div>
				</div>
			</div> -->

		<!-- </div>	
	</div> -->

<!-- de dcelular pequeño -->
	<!-- <div class="display3" style="padding: 10px;">
		<div class="row articulo-contenedor-lista" > -->

			<!-- producto nuevo y descuento -->
			<!-- <div class="articulo-lista-movil col s12">
				<div class="row center-align">
					<a href="">
						<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon8.jpg" class="responsive-img" >
					</a>
				</div>
				<div class="row center-align">
					<div class="info-articulos-lista">
						<div class="descripcion-lista">
							<span class="titulo-lista">
								<a href="">
									<b>Titulo de producto</b>
								</a>
							</span>
							<br>
							<span class="descripcion-cuerpo">
								Descripcion de producto que estara almacenada en la base de datos
							</span>
						</div>
						<div class="estado-lista">
							<span class="estado-articulo-lista">
								&nbsp;	Nuevo 	&nbsp;
							</span>
							<span class="estado-articulo-lista-ofer">
								&nbsp;	Oferta 	&nbsp;
							</span>
							<span class="ciudad-lista">
								Zacualtipan
							</span>
						</div>
						<div class="estado-precio-lista">
							<span class="precio-oficial-lista">
								<strong>
									$500
								</strong>
							</span>
							<span class="precio-oficial-lista-ofer">
								$300
							</span>
							<span class="precio-envio">
								Envio Gratis
							</span>
						</div>
						<div class="row center-align">
							<span class=" col s5 offset-s3 calificacion-estrellas">
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</span>
						</div>
					</div>
				</div>
			</div> -->

			<!-- producto nuevo -->
			<!-- <div class="articulo-lista-movil col s12">
				<div class="row center-align">
					<a href="">
						<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon.jpg" class="responsive-img" >
					</a>
				</div>
				<div class="row center-align">
					<div class="info-articulos-lista">
						<div class="descripcion-lista">
							<span class="titulo-lista">
								<a href="">
									<b>Titulo de producto</b>
								</a>
							</span>
							<br>
							<span class="descripcion-cuerpo">
								Descripcion de producto que estara almacenada en la base de datos
							</span>
						</div>
						<div class="estado-lista">
							<span class="estado-articulo-lista">
								&nbsp;	Nuevo 	&nbsp;
							</span>
							<span class="ciudad-lista">
								Zacualtipan
							</span>
						</div>
						<div class="estado-precio-lista">
							<span class="precio-oficial-lista-ofer">
								$300
							</span>
							<span class="precio-envio">
								Envio Gratis
							</span>
						</div>
						<div class="row center-align">
							<span class=" col s5 offset-s3 calificacion-estrellas">
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</span>
						</div>
					</div>
				</div>
			</div> -->

			<!-- producto descuento -->
			<!-- <div class="articulo-lista-movil col s12">
				<div class="row center-align">
					<a href="">
						<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon8.jpg" class="responsive-img" >
					</a>
				</div>
				<div class="row center-align">
					<div class="info-articulos-lista">
						<div class="descripcion-lista">
							<span class="titulo-lista">
								<a href="">
									<b>Titulo de producto</b>
								</a>
							</span>
							<br>
							<span class="descripcion-cuerpo">
								Descripcion de producto que estara almacenada en la base de datos
							</span>
						</div>
						<div class="estado-lista">
							<span class="estado-articulo-lista-ofer">
								&nbsp;	Oferta 	&nbsp;
							</span>
							<span class="ciudad-lista">
								Zacualtipan
							</span>
						</div>
						<div class="estado-precio-lista">
							<span class="precio-oficial-lista">
								<strong>
									$500
								</strong>
							</span>
							<span class="precio-oficial-lista-ofer">
								$300
							</span>
							<span class="precio-envio">
								Envio Gratis
							</span>
						</div>
						<div class="row center-align">
							<span class=" col s5 offset-s3 calificacion-estrellas">
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</span>
						</div>
					</div>
				</div>
			</div> -->

			<!-- producto normal -->
			<!-- <div class="articulo-lista-movil col s12">
				<div class="row center-align">
					<a href="">
						<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon8.jpg" class="responsive-img" >
					</a>
				</div>
				<div class="row center-align">
					<div class="info-articulos-lista">
						<div class="descripcion-lista">
							<span class="titulo-lista">
								<a href="">
									<b>Titulo de producto</b>
								</a>
							</span>
							<br>
							<span class="descripcion-cuerpo">
								Descripcion de producto que estara almacenada en la base de datos
							</span>
						</div>
						<div class="estado-lista">
							<span class="ciudad-lista">
								Zacualtipan
							</span>
						</div>
						<div class="estado-precio-lista">
							<span class="precio-oficial-lista-ofer">
								$300
							</span>
							<span class="precio-envio">
								Envio Gratis
							</span>
						</div>
						<div class="row center-align">
							<span class=" col s5 offset-s3 calificacion-estrellas">
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
								<i class="material-icons">star</i>
							</span>
						</div>
					</div>
				</div>
			</div> -->

		<!-- </div>
	</div> -->




<style type="text/css">
	.display{
		display: block;
	}
	.navegacion-cp{
		margin-top: 25px;
		padding: 10px;
		background-color: rgba(225, 225, 225, 0.19);
	}
	/* etuiqueta articulo */
	.articulos-contenedor{
		display: grid;
		grid-template-columns: repeat(auto-fit, 250px);
		grid-gap:0.7em;
		justify-content:center; 
		padding: 0px;
	}
	.articulo{
		max-width: 249px;
		display: flex;;
		flex-flow: column;
		border-radius: 6px;
		box-shadow: 0 0 0.1em rgba(0, 0, 0,.2);
		background-color:  white;
		cursor: pointer;
		transition-duration: 0.3s;
		transition-property: box-shadow;
		padding-bottom: 0px;
		margin-bottom: 10px;
	}
	.articulo:hover{
		box-shadow: 0 0 0.9em rgba(0, 0, 0,.2);
	}
	.articulo figure{
		overflow: hidden;
		margin: 0px;
	}
	.articulo figure:hover{
		transition: 1s all ease;
		opacity: .9;
		transform: scale(1.05,1.05);
	}
	.articulo  img{
		width:100%;
		object-fit: cover;
		height: 250px;
	}

	.info-articulo{
		border-top: 1px solid rgba(230. 230, 230);
		padding: 1em;
		display: flex;
		flex-flow: column;
		padding-bottom: 0px;
	}
	.info-articulo * + *{
		margin-bottom: 0.5em;
	}
	.estado{
		padding: 0px;
	}
	.estado-articulo{
		background-color: #00BCD4;
    	color: rgb(255, 255, 255);
		font-weight: 200;
		max-width: max-content;
		padding left:  1px;
		border-radius: 3px;
		margin-right: 18px;
	}
	.estado-articulo-ofer{
		background-color: #4caf50;
    	color: rgb(255, 255, 255);
		font-weight: 200;
		max-width: max-content;
		padding left:  1px;
		border-radius: 3px;
		margin-right: 18px;
	}
	.ciudad{
		margin-left: 30px;
	}
	.estado-precio{
		margin-top: 10px;
	}
	.precio-oficial{
		font-size: 1em;
		text-decoration: line-through;
		color:#8f8e85;
	}
	.precio-ofer{
		font-size: 1.3em;
		margin-left: 10px;
	}
	.precio-envio{
		color:rgb(0,166,80);
		margin-left: 15px;
	}
	.descripcion, .ciudad{
		font-weight: 300;
	}

	.precio-envio, .descripcion, .ciudad{
		font-size: 0.9em;
	}
	.calificacion-estrellas{
		opacity: 0;
		transition-duration: 0.3s;
		transition-property: opacity;
		padding-bottom: 0px;
	}
	.articulo:hover .calificacion-estrellas, .articulo:hover {
		opacity: 1;
	}
	.estado-articulo, .calificacion-estrellas, .estado-articulo-ofer {
		font-size: 0.8em;
	}
	.calificacion-estrellas{
		color:#4fbde1;
	}

	.calificacion-estrellas{
		display: flex;
		flex-flow: row nowrap;
	}



/* diseño articulos en lista */

.display2{
	display: none;
}

.articulo-lista {
	max-height:  180px;
	border-radius: 6px;
	box-shadow: 0 0 0.1em rgba(0, 0, 0,.2);
	background-color:  white;
	cursor: pointer;
	transition-duration: 0.3s;
	transition-property: box-shadow;
	padding: 0px;
	margin-bottom: 10px;
}

.articulo-lista:hover{
	box-shadow: 0 0 0.9em rgba(0, 0, 0,.2);
}
.articulo-lista figure{
	overflow: hidden;
	margin: 0px;
	padding: 0px;
	margin-left: -11px;
}
.articulo-lista figure:hover{
	transition: 1s all ease;
	opacity: .9;
	transform: scale(1.05,1.05);
}
.articulo-lista  img{
	height: 180px; 	
	object-fit: cover;
	width:  210px;
	border-top-left-radius: 3px;
	border-bottom-left-radius: 3px;
}
.descripcion-lista .titulo-lista b{
	font-size:1.3em;
	color:black;
}

.descripcion-lista .descripcion-cuerpo{
	font-size: 0.89em;
	color: #0000009c;
}


.estado-lista .estado-articulo-lista{
	background-color: #00BCD4;
	color: rgb(255, 255, 255);
	max-width: max-content;
	padding left:  1px;
	border-radius: 3px;
	margin-right: 18px;
	font-size: 0.9em;
}

.estado-lista .estado-articulo-lista-ofer{
	background-color: #4caf50;
	color: rgb(255, 255, 255);
	max-width: max-content;
	padding left:  1px;
	border-radius: 3px;
	margin-right: 18px;
	font-size: 0.9em;
}
.estado-precio-lista .precio-oficial-lista{
	font-size: 1em;
	text-decoration: line-through;
	color:#8f8e85;

}
.estado-precio-lista .precio-oficial-lista-ofer{
	font-size: 1.2em;
	margin-left: 10px;
}


.precio-envio{
	color:rgb(0,166,80);
	margin-left: 15px;
}

.info-articulos-lista .calificacion-estrellas{
	opacity: 0;
	transition-duration: 0.3s;
	transition-property: opacity;
	padding-bottom: 0px;
	font-size: 0.8em;
}
.articulo-lista:hover, .info-articulos-lista:hover .calificacion-estrellas:hover{
	opacity: 1;
}




/* Movil */
.display3{
	display: none;
}
.articulo-lista-movil{
	border-radius: 6px;
	box-shadow: 0 0 0.1em rgba(0, 0, 0,.2);
	background-color:  white;
	cursor: pointer;
	transition-duration: 0.3s;
	transition-property: box-shadow;
	padding: 0px;
	margin-bottom: 10px;

}

.articulo-lista-movil  img{
	height:max-content;;
	object-fit: cover;
	max-width:  200px;
	max-height: 200px;
	border-top-left-radius: 3px;
	border-bottom-left-radius: 3px;
}


	@media(max-width: 579px){

		.display{
		display: none;
		}
		.display2{
		display: none;
		}
		.display3{
		display: block;
		}

	}

	@media(min-width:  480px) and  (max-width:  600px) {
		.display{
		display: none;
		}
		.display2{
		display: block;
		}
		.display3{
		display: none;
		}
	}

	@media(min-width:  601px) and  (max-width:  992px) {
		
	}

	@media(min-width:  993px) and  (max-width:  1200px) {
		
	}

	@media(min-width: 1201px) {

	}


.pagination li{
	background-color: white;
	border-radius: 2px;
}
	
</style>