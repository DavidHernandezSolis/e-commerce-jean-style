<div class="contenedor-categoria font-quicksand-sf">
	<div class="row center-align" style="margin-top: -50px;">
		<h2 style="color: black;"><small>Categorias</small></h2>
		<hr class="center-align" style="width: 85%;margin-top: -20px;">
	</div>
	<div class="row categoria-contenedor">
		<?php 
			$controladorCliente = new ControladorCliente();
			$categoria = $controladorCliente->listarCategoriasControl();
			foreach ($categoria as $key => $value) {
			  	echo '
			  		<div class="categoria ">
						<a href="'.$value["Nombres"].'">
							<img src="'.$urlAdmin.$value["icono"].'" >
						</a>
						<div class="center-align NombreCategoria">
							<a href="'.$value["Nombres"].'">
								<h2 style="color: black;"><small>'.$value["Nombres"].'</small></h2>
							</a>
						</div>
					</div>
			  	';
			}
		?>
	</div>
</div>


<style type="text/css">
	.contenedor-categoria{
		padding: 20px;
		margin-top: 10px;
	}
	.contenedor-categoria .categoria-contenedor{
		display: grid;
		grid-template-columns: repeat(auto-fit, 260px);
		grid-gap:1em;
		justify-content:center; 
	}
	.contenedor-categoria .categoria{
		max-width: 250px;
		display: flex;;
		flex-flow: column;
		border-radius: 6px;
		box-shadow: 0 0 0.1em rgba(0, 0, 0,.2);
		background-color:  white;
		cursor: pointer;
		transition-duration: 0.3s;
		transition-property: box-shadow;
		padding-bottom: 0px;
		padding: 1px;
	}
	.contenedor-categoria .categoria:hover{
		width: 260px;
		border-radius: 0px;
		box-shadow: 7px 9px 0.6em rgba(0, 0, 0, 0.2);
		background-color:  white;
	}
	.contenedor-categoria .categoria  img{
		width:250px;
		height: 250px;

		margin-bottom: -40px;
	}
	.contenedor-categoria .categoria  .NombreCategoria{
		margin-bottom: -10px;
	}
</style>