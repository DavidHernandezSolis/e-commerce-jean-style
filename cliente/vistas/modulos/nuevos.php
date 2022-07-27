
<div class="container-nuevo" style="margin-top: 50px;">
  <div class="row fila-img-nue" >
    <div class="col s8">
      <span  class="font-estilo negro" style=" font-size:26px; ">Productos nuevos &nbsp;&nbsp;<a href="Productos nuevos" style="font-size: 18px;">ver mas ...</a></span>
    </div>
  </div>
  <div class="row fila-img-nue articulos-ofertas " >

      <?php 
      $controladorCliente =new ControladorCliente();
        $ofertas = $controladorCliente->mostrarProductosControl();
         $i=1 ;
          foreach ($ofertas as $key => $value) {
            $id = $value["idProductos"];
            //var_dump($value[" Nuevo"]);

             if ($value["Nuevo"]) {
                echo '
                  <div class="articulo articulo-oferta">
                    <figure>
                      <a href="'.$value["Titulo"].'/'.base64_encode($id).'">
                        <img src="'.$urlAdmin.$value["FotoFrontal"].'">
                      </a>
                    </figure>
                    <div class="info-articulo">
                      <div class="estado">
                        <span class="estado-articulo-nuevo left-align">
                          &nbsp;  Nuevo &nbsp;
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
                      <span class="descripcion" style="margin-top: 5px;">
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
    .negro{
      color:black;
    }
  .font-estilo{
    font-family: 'Quicksand', sans-serif;

  }
  .container-nuevo {
    position: relative;
    width: 100%;
  }
    .estado-articulo-nuevo{
    background-color: #61aba6;
      color: rgb(255, 255, 255);
    font-weight: 200;
    max-width: max-content;
    padding left:  1px;
    border-radius: 3px;
    margin-right: 18px;
     font-size: 0.8em;
  }

  </style>

<script type="text/javascript">
    $(document).ready(function(){
    $('.tooltipped').tooltip();
  });
       
</script>






