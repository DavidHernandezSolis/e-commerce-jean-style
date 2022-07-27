<div class="row" style="margin-top: 40px; margin-left: 28px;margin-right: 15px;">
	<div class="row navegacion-cp" >
		<?php 
			echo '
				<span>
					<a href="index.php"><b class="error404">Inicio</b></a> / <a href="'.$url.$rutas[0].'"><b class="error404">'.$rutas[0].'</b></a> 
				</span>
			';
		 ?>
	</div>	
</div>
<div class="row" style="margin-top: 10px; margin-left: 25px;margin-right: 20px;">
	<div class="rwd">
		<?php 
			/*---------- inicia  id con valor de usuario ingresado ----------*/
			if (isset($_SESSION["validarSesion"])) {

				if ($_SESSION["validarSesion"] == "ok") {

					$idUsuario = $_SESSION["idUser"];
					$controladorCliente = ControladorCliente();
					$infoProducto = $controladorCliente->historialComprasOnlineControl($idUsuario);
					

					echo '
						<table class="rwd_auto striped highlight">
							<thead style="background-color: lightblue">
							<tr>
								<th>NO.</th>
								<th>Pantalón</th>
								<th>Precio/U</th>
								<th>Cantidad</th>
								<th>Precio Total</th>
								<th>Fecha</th>
							</tr>
							</thead>
							<tbody>';
							$num = 0;
							foreach ($infoProducto as $key => $value) {
								$num++;
								$cantidad = $value["Cantidad"];
								$precio = $value["Precio"];
								$precioPagado =$cantidad * $precio;
								echo '
									<tr>
										<td>'.$num.'</td>
										<td>'.$value["Titulo"].'</td>
										<td>'.$value["Precio"].'</td>
										<td>'.$value["Cantidad"].'</td>
										<td>'.$precioPagado.'</td>
										<td>'.$value["Fechas"].'</td>
									</tr>
								';
							}
							echo '
							</tbody>
						</table>
					';

				}

			}else{
				echo '
					<!--  -->								
					<div class="col xl8  l10   s10 offset-s1 ">
					<h6>Iniciar sesión para ver historial o generar compra</h6>
					<a href="'.$url.'login" class="btn waves-effect waves-light" style="padding: 0px;" id=""> <small>&nbsp;Iniciar sesión  &nbsp;</small>
					</a>
					</div>
				';
			}
			/*---------- Termina  id con valor de usuario ingresado ----------*/

		?>
		
	</div>
</div>

<style type="text/css">
	.navegacion-cp{
		margin-top: 25px;
		padding: 10px;
		background-color: rgba(225, 225, 225, 0.19);
	}
	h2 {font-size:36px;margin:0 0 10px 0}
	p {margin:0 0 10px 0}
	
	table.width200,table.rwd_auto {border:1px solid #ccc;width:100%;margin:0 0 50px 0}
	.width200 th,.rwd_auto th {padding:5px;text-align:center;}
	.width200 td,.rwd_auto td {border-bottom:1px solid #ccc;padding:5px;text-align:center}
	.width200 tr:last-child td, .rwd_auto tr:last-child td{border:0}

	.rwd {width:100%;overflow:auto;}
	.rwd table.rwd_auto {width:auto;min-width:100%}
	.rwd_auto th,.rwd_auto td {white-space: nowrap;}

	@media only screen and (max-width: 760px), (min-width: 768px) and (max-width: 1024px)  
	{

		table.width200, .width200 thead, .width200 tbody, .width200 th, .width200 td, .width200 tr { display: block; }
		
		.width200 thead tr { position: absolute;top: -9999px;left: -9999px; }
		
		.width200 tr { border: 1px solid #ccc; }
		
		.width200 td { border: none;border-bottom: 1px solid #ccc; position: relative;padding-left: 50%;text-align:left }
		
		.width200 td:before {  position: absolute; top: 6px; left: 6px; width: 45%; padding-right: 10px; white-space: nowrap;}
		
	
		
		.descarto {display:none;}
		.fontsize {font-size:10px}
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen and (min-width : 320px) and (max-width : 480px) 
	{
		body { width: 320px; }
		.descarto {display:none;}
	}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-width: 768px) and (max-width: 1024px) 
	{
		body { width: 495px; }
		.descarto {display:none;}
		.fontsize {font-size:10px}
	}
	
</style>