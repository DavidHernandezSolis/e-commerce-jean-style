<footer class="page-footer" >
	<div class="contenedor-pie ">
		<hr class="pie-separador-fila1"><hr class="pie-separador-fila2">
		<div class="row ">
			<div class="col   xl3 l3 m3 s12 ">
				<div class="row center-align">
					<span class="pie-col-span-titulo negro"><b>Acerca De</b></span>
				</div>
				<div class="row pie-col-span negro" style="text-align: justify;">
					Somos Jeans Style, la mejor tienda dedicada a la venta de pantalones- Localizada en Zacualtipan de Angeles, Colonia S/N.
				</div>
			</div>
			<div class="col  pie-col-span  xl2 offset-xl1 l2 offset-l1  m3 offset-m1 s6  todo" style="">
				<div class="row center-align">
					<span class="pie-col-span-titulo negro"><b>Contacto</b></span>
				</div>
				<div class="row ">
					<div class="col s12 valign-wrapper">
						<i class="material-icons negro">phone_in_talk </i><span  class="pie-col-span negro">7713234567</span>
					</div>	
				</div>
				<div class="row ">
					<div class="col s12 valign-wrapper">
						<i class="material-icons negro">mail_outline</i><span  class="pie-col-span negro">  jeansStyle@gmail.com</span>
					</div>	
				</div>
			</div>
			<div class="col  xl1 offset-xl1 l1 offset-l2  m2 offset-m1 s2   todo">
				<div class="row center-align">
					<span class="pie-col-span-titulo negro"><b>Siguenos</b></span>
				</div>
				<div class="row ">
					<a href="#">
						<img src="<?php echo $url ?>vistas/imgCliente/plantilla/facebook.svg" class="responsive-img"  style="width: 25px;">
						<span  class="pie-col-span  pie-mostrar-ocultar negro">Facebook</span>
					</a>
				</div>
				<div class="row ">
					<a href="#">
						<img src="<?php echo $url ?>vistas/imgCliente/plantilla/twitter.svg" class="responsive-img"  style="width: 28px;">
						<span  class="pie-col-span hpie-mostrar-ocultar negro">Twitter</span> 
					</a>
				</div>
			</div>
			<div class="col   xl2 offset-xl1 l2 offset-l1  m2  s4  todo">
				<div class="row center-align">
					<span class="pie-col-span-titulo negro"><b>Forma de Pago</b></span>
				</div>
				<div class="row">
					<div class="col s6 ">
						<img src="<?php echo $url ?>vistas/imgCliente/plantilla/ppal.jpg" class="responsive-img"  style="width: 100px;">
					</div>
					<div class="col s6 ">
						<img src="<?php echo $url ?>vistas/imgCliente/plantilla/pago-vs-entrega.png" class="responsive-img"  style="width: 100px;">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 center-align">
				<a href="#">
					<span class="pie-col-span">Terminos y Condiciones</span>
				</a>
			</div>
		</div>
	</div>
	<div class="footer-copyright">
        <div class="container">
            © 2020 Jeans Style - Derechos reservados
         </div>
    </div>
</footer>

<style type="text/css">
	.blanco{
		color:white;
	}
	.negro{
		color:black;
	}
	.contenedor-pie{
		margin-top: 0px;
		padding-left: 40px;
		padding-right:  40px;
	}
	.contenedor-pie .pie-separador-fila1{
		width: 90%;
	}
	.contenedor-pie .pie-separador-fila2{
		width: 80%;
		margin-bottom: 40px;
	}
	.contenedor-pie .pie-col-span {
		font-size: 16px;
	}
	.contenedor-pie .pie-col-span-titulo{
		font-size: 18px;
	}

	.page-footer {
    	background-color:#7a787836;
	}

	.page-footer .footer-copyright {
    	color: rgba(255, 255, 255, 0.56);
    	background-color: rgba(51, 51, 51, 0.46);
	}



	@media(max-width: 400px){
		.contenedor-pie .row .col.medio {
		    width: 50%;
		    margin-left: auto;
		    left: auto;
		    right: auto;
		}
		.contenedor-pie .row .col.todo {
		    width: 100%;
		    margin-left: auto;
		    left: auto;
		    right: auto;
		}

		.contenedor-pie .pie-col-span {
			font-size: 12px;
		}

		.contenedor-pie .pie-col-span-titulo {
			font-size: 14px;
		}

		.pie-mostrar-ocultar{
			display: block;
		}
		/*#id_oferta{
			display: none;
		}*/
		/*#id_Oferta_No_Esta{
			
		}*/
	}

	@media (min-width:  401px) and (max-width: 600px){
    	.contenedor-pie .pie-col-span {
			font-size: 12px;
		}

		.contenedor-pie .pie-col-span-titulo {
			font-size: 14px;
		}

		.pie-mostrar-ocultar{
			display: none;
		}

    }

    @media(min-width:  601px) and  (max-width:  992px) {
    	.contenedor-pie .pie-col-span {
			font-size: 14px;
		}

		.contenedor-pie .pie-col-span-titulo {
			font-size: 16px;
		}
    }

    @media(min-width:  993px) and  (max-width:  1200px) {

    }

    @media(min-width: 1201px) {

    }
	
</style>