
			
			<form action="" method="POST" class="col s6 classCentrar">
				
				<div class="row card-panel">	

					<?php 
          
          		    $verProducto = new ControladorPlantilla();
              		$verProducto->CambioCompra_Principal();
           			
           			?>
					

    			</div>

					<?php 
          				if (isset($_POST["Total"])) {
          					 $verProducto = new ControladorPlantilla();
	              			$verProducto->FinalizarPrincipal();
          				}	          		   
           			?>
			</form>
		
			

	<style>
		.classCentrar{
			
			margin-left: auto;
			margin-right:auto;
			margin-top: 85px;
			align-content: center;
			width: 40%;
		}



      @media(max-width: 600px){
      	.classCentrar {
		  width: 90%;  
		}
		
      }

      @media(min-width:  601px) and  (max-width:  992px) {
      	.classCentrar {
		 width: 80%; 
		}
		
      }

      @media(min-width:  993px) and  (max-width:  1200px) {
        .classCentrar {
		  width: 70%;
		}
		
      }

      @media(min-width: 1201px) {

      }

       #header input.buscador1{
        display: none;
      }
      #header input.buscador2{
        display: block;
      }
      #header input.header-search-input:hover {
        background: rgba(255, 255, 255, 0.3);
      }

	</style>


<!--  <div class="fixed-action-btn toolbar">
    <a class="btn-floating btn-large blue">
      <i class="large material-icons">mode_edit</i>
    </a>
    <ul>
      <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">insert_chart</i></a></li>
      <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">format_quote</i></a></li>
      <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">publish</i></a></li>
      <li class="waves-effect waves-light"><a href="#!"><i class="material-icons">attach_file</i></a></li>
    </ul>
  </div> -->