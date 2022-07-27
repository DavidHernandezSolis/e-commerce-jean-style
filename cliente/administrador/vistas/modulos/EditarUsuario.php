<div class="row">
<div class="col s2"></div>
<form action="" method="POST" class="col s8 ">
	<div class="row card-panel col ">
	<center>
	<h4>Actualizar Datos</h4></center>
		<?php 
			$EditarUsuario = new ControladorPlantilla();
			$EditarUsuario->EditarUsuarios();
			ob_start();
                  
			$EditarUsu = new ControladorPlantilla();
			$EditarUsu->Actualizarsuarios();
			ob_end_flush();
		?> 			
</form>
</div>
