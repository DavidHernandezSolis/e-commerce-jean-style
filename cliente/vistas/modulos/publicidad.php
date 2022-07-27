<div class="contenedor-publicidad font-estilo" style="margin-top: 60px;">
	<div class="concentido con-cli blanco saltador-fondo" style="margin-top: 40px; background-color: #015ff585">
		<span style="font-size: 25px; margin-left: 30px;"> Date un Jeans Stylaso
		</span>
	</div>
	<div class="row center-align" style="padding:20px; padding-top: 20px; margin-top: 50px;" >

		<div class="col xl6 m10 offset-m1 s12" style="padding-top: ;">
			<div class="carrousel-publicidad font-quicksand-sf">

				<div class="carousel">
					<h4 class="">¿Que te pondras hoy?</h4>
					<?php 
					$controladorCliente = new ControladorCliente();
			        $publicidadBaner = $controladorCliente->mostrarProductosControl();
			         $i=1 ;
			          foreach ($publicidadBaner as $key => $value) {

			            //var_dump($value[" Nuevo"]);

			             if ($value["PublicidadBaner"]) {
			                echo '
			                	<div class="carousel-item" style="margin-top: -30px; "><img src="'.$urlAdmin.$value["FotoFrontal"].'"><p class=" btn-pu " style="color:blue;font-size:18px;margin-top: 5px; ">'.$value["Titulo"].'</p> 
			                	</div>
			                ';
			                $i++;
			             }
			            if ($i==4) {
			              break; 
			            }
			          }
			      ?>
				    

				    <!-- <a class="carousel-item" style="margin-top: -30px;"><button class="btn">Ver</button><img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon.jpg"><p class=" btn-pu">usa el pantalon Titulón</p> </a>

				    <a class="carousel-item" style="margin-top: -30px;"><button class="btn">Ver</button><img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon.jpg"><p class=" btn-pu">usa el pantalon Titulón</p> </a> -->

			  </div>
			</div>
		</div>
		<div class="col xl4 offset-xl1 m12 center-align derecha4" >
			<div class="row center-align">
				<?php 
					$controladorCliente = new ControladorCliente();
			        $publicidad = $controladorCliente->mostrarProductosControl();
			         $i=1 ;
			          foreach ($publicidad as $key => $value) {
			            //var_dump($value[" Nuevo"]);
			            $id = $value["idProductos"];

			             if ($value["Publicidad"]) {
			                echo '
			                	<div class="col xl6  l6 m6 s12" style="margin-top: 10px;">
									<div class="z-depth-3  img-contenedor" data-position="bottom" data-tooltip="Pantalon azul caballero " style="width: 100%;">
										<img src="'.$urlAdmin.$value["FotoFrontal"].'" class="   materialboxed"  style="width: 100%;">
									</div>
									<a href="'.$value["Titulo"].'/'.base64_encode($id).'" class="" style="font-size: 20px;">'.$value["Titulo"].'</a>
								</div>
			                ';
			                $i++;
			             }
			            if ($i==5) {
			              break; 
			            }
			        }
			    ?>
			</div>
			<!-- <div class="row center-align">
				<div class="col xl6 l6 m6 s12" style="margin-top: 10px;">
						<div class="z-depth-3   img-contenedor" data-position="bottom" data-tooltip="Pantalon azul caballero " style="width: 100%;">
							<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon1.jpg" class="  materialboxed"  style="width: 100%;">
						</div>
						<a href="#" class="" style="font-size: 20px;margin-top: 20px;">Ir a producto</a>
				</div>
				<div class="col xl6 l6 m6 s12" style="margin-top: 10px;">
						<div class="z-depth-3   img-contenedor" data-position="bottom" data-tooltip="Pantalon azul caballero " style="width: 100%;">
							<img src="<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/pantalon.jpg" class="  materialboxed"  style="width: 100%;">
						</div>
						<a href="#" class="" style="font-size: 20px;margin-top: 20px;">Ir a producto</a>
				</div>
			</div> -->
		</div>
	</div>
</div>


<style type="text/css">
	.carrousel-publicidad{
		background-image: linear-gradient(-33deg, #e3ddd9 50%, #e3ddd929 50%),
		url(<?php echo $url ?>vistas/imgCliente/plantilla/fu-pu2.jpg);
		min-height: 320px;
	}
	.carousel .carousel-item {
    width: 250px;
	}
	.btn-pu{
		margin-top: -30px;
		color:white;
	}
	.derecha4 img{
		height: 160px;
	}
	.carrousel-publicidad img{
		height: 240px;
		width: 190px;
	}
	 @media(max-width: 600px){
      	.derecha4 img{
		height: 250px;
		}
      }

	@media(min-width:  480px) and  (max-width:  600px) {
        .derecha4 img{
		height: 170px;
		}
    }

	.img-contenedor img {
		-webkit-transition:all .9s ease; /* Safari y Chrome */
		-moz-transition:all .9s ease; /* Firefox */
		-o-transition:all .9s ease; /* IE 9 */
		-ms-transition:all .9s ease; /* Opera */
		width:100%;
	}
	.img-contenedor:hover img {
		-webkit-transform:scale(1.25);
		-moz-transform:scale(1.25);
		-ms-transform:scale(1.25);
		-o-transform:scale(1.25);
		transform:scale(1.25);
	}
	.img-contenedor {/*Ancho y altura son modificables al requerimiento de cada uno*/
		width:300px;
		overflow:hidden;
	}

	 @media (max-width:  600px) {
	    .contenedor-publicidad{
	      font-size: 20px;
	    }
	  }

	@media(max-width:  1200px) {
		.derecha4 img{
		height: 270px;
		}
	}
</style>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems,{
    	duration:400,
    	indicators:true
    });
  });


	document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.materialboxed');
    var instances = M.Materialbox.init(elems);
  });
</script>