<div class="row" style="padding: 10px; margin-left: 20px;">
  <div class="col s12">
    <h4>Elije calida... Elije seguridad... Elije " JEANS STYLE "</h4>
    <h6>El mejor mercado de pantalones de la zona</h6>
  </div>
</div>


<div class="row pago-comudidad">
  <div class="col xl6 l6 m6 s12 center-align">
    <h5>Los consentimos con las comudidades</h5>
    <h6>Formas de pago</h6>
  </div>
  <div class="col xl6 l6 m6 s12 centrar" >
    <div class="row centrar" style="padding-top: 20px;">
      <div class="col xl6 l6 m6 s6 center-align">
        <img src="<?php echo $url ?>vistas/imgCliente/plantilla/pago-vs-entrega.png" class="responsive-img"  style="width: 80px;">
      </div>
      <div class="col xl6 l6 m6 s6 center-align">
        <img src="<?php echo $url ?>vistas/imgCliente/plantilla/ppal.jpg" class="responsive-img"  style="width: 80px;">
      </div>
    </div>
  </div>
</div>


<div class="container-oferta " style="margin-top: 60px;">
  <div class="row fila-img-ofer" >
    <div class="col s10">
      <span  class="font-estilo" style="color:black; font-size:26px; ">Productos en ofertas &nbsp;&nbsp;<a href="Productos ofertas" style="font-size: 18px;">ver mas ...</a></span>
    </div>
  </div>
  <div class="row fila-img-ofer articulos-ofertas " >

      <?php 
        $controladorCliente =new ControladorCliente();
        $ofertas = $controladorCliente ->mostrarProductosControl();
         $i=1 ;
          foreach ($ofertas as $key => $value) {
            $id = $value["idProductos"];

             if ($value["Oferta"] != 0) {
                echo '
                  <div class="articulo articulo-oferta">
                    <figure>
                      <a href="'.$value["Titulo"].'/'.base64_encode($id).'">
                        <img src="'.$urlAdmin.$value["FotoFrontal"].'">
                      </a>
                    </figure>
                    <div class="info-articulo">
                      <div class="estado">
                        <span class="estado-articulo-ofer left-align">
                          &nbsp;  Oferta &nbsp;
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
                
                $i++;
             }

            
            if ($i==6) {
              break; 
            }
          }
      ?>

  </div>

</div>


<style type="text/css">


  .pago-comudidad{
    background-image: linear-gradient(-33deg, #03a9f4e3 50%, #00bcd46e 50%);
    text-align: center;
  }

  .centrar{
    justify-content: center;
  }
  .font-estilo{
    font-family: 'Quicksand', sans-serif;

  }
  .container-oferta {
  }






  .articulos-ofertas{
    display: grid;
    grid-template-columns: repeat(auto-fit, 250px);
    grid-gap:0.6em;
    justify-content:center; 
    padding: 0px;
  }
  .articulo{
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
  }




  .navegacion-cp{
    margin-top: 25px;
    padding: 10px;
    background-color: rgba(225, 225, 225, 0.19);
  }
  /* etuiqueta articulo */

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
    margin-top: 0px;
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
  .descripcion{
    margin-top: -10px;
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

 

  
</style>