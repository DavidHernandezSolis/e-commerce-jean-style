<div class="containerCayMa font-estilo negro"  style="margin-bottom: 100px;margin-top: 50px;">
  <div class="row">
    <div class="concentido con-cli center-align saltador-fondo blanco" style="margin-top: 40px;background-color:">
      <span style="font-size: 25px; "> De lo mejor
      </span>
    </div>
  </div>
  <!-- Categorias  y marcas mas vendidas -->
  <div class="row cate-marca center-align" >
    <!-- Categorias -->
    <div class="col xl4 offset-xl1 l4  m4 m12" style="padding:40px; " id="categoriaspie">
      <div class="row">
        <h5 style="color:black; " class="left-align"> Categorias </h5>

      </div>
      <div class="row">
        <div class="col s12 m12" style="padding:40px; background-color: #fff;">
                
          <div class="row center-align" style="padding:0px;background-color: ;">
            <div class="col s6 m6" style="padding: 0px;background-color: ;">
              <a href="Mujeres">
                <h5 >Mujeres</h5>
              </a>
            </div>
            <div class="col s6 m6" style="padding: 0px;border-left: 1px solid black">
              <a href="Hombres">
                <h5>Hombres</h5>
              </a>
            </div>
          </div>
          <hr style="width:120%; margin-left: -10%">
          <div class="row center-align" style="padding:0px;background-color: ;">
            <div class="col s6 m6" style="padding: 0px;background-color: ;">
              <a href="Niños">
                <h5>Niños</h5>
              </a>
            </div>
            <div class="col s6 m6" style="padding: 0px;border-left: 1px solid black;border">
              <a href="<?php echo $url?>categorias">
                <h5>Ver Mas...</h5>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Marcas mas Vendidas -->
    <div class="col xl6  l7  m8 m12" style="padding:40px; background-color:;">
      <h5 style="color:black;" class="left-align"> Nuestras marcas <small></small></h5>
      <div class="row center-align" style="padding:0px;background-color: ;">
        <?php 
          $controladorCliente = new ControladorCliente();
          $marcas = $controladorCliente->mostrarMarcasControl();
          $i=1 ;
          foreach ($marcas as $key => $value) {
                  //var_dump($value[" Nuevo"]);
              echo '
                  <div class="col s3" style="padding: 0px;background-color: ; margin-right:10px;">
                    <a href="#">
                      <img src="'.$urlAdmin.$value["icono"].'" class="z-depth-3 tooltipped" data-position="bottom" data-tooltip="Marca: '.$value["Nombre"].'" style="width: 130px; height: 120px;padding: 0px;">
                    </a>
                  </div>
              ';
              $i++;
            if ($i==4) {
              echo '
                </div>
                  <div class="row center-align" style="padding:0px;background-color: ;">
              ';
            }

            if ($i==7) {
              break; 
            }
          }
        ?> 
        <!-- <div class="col s3" style="padding: 0px;background-color: ;">
          <a href="#">
              <img src="<?php echo $url ?>vistas/imgCliente/plantilla/under.png" class="z-depth-3 tooltipped" data-position="bottom" data-tooltip="Marca undes xwz " style="width: 130px; height: 120px;padding: 0px;">
          </a>
        </div>
        <div class="col s3" style="padding: 0px;background-color: ;">
          <a href="#">
              <img src="<?php echo $url ?>vistas/imgCliente/plantilla/under.png" class="z-depth-3 tooltipped" data-position="bottom" data-tooltip="Marca undes xwz " style="width: 130px; height: 120px;padding: 0px;">
          </a>
        </div>
        <div class="col s3" style="padding: 0px;">
          <a href="#">
            <img src="<?php echo $url ?>vistas/imgCliente/plantilla/under.png" class="z-depth-3 tooltipped" data-position="bottom" data-tooltip="Marca undes xwz "  style="width: 130px; height: 120px;padding: 0px;">
          </a>
        </div>
      </div>
      <div class="row center-align" style="padding:0px;background-color: ;">
        <div class="col s3" style="padding: 0px;background-color: ;">
          <a href="#">
              <img src="<?php echo $url ?>vistas/imgCliente/plantilla/under.png" class="z-depth-3 tooltipped" data-position="bottom" data-tooltip="Marca undes xwz "  style="width: 130px; height: 120px;padding: 0px;">
          </a>
        </div>
        <div class="col s3" style="padding: 0px;">
          <a href="#">
            <img src="<?php echo $url ?>vistas/imgCliente/plantilla/under.png" class="z-depth-3 tooltipped" data-position="bottom" data-tooltip="Marca undes xwz "  style="width: 130px; height: 120px;padding: 0px;">
          </a>
        </div>
        <div class="col s3" style="padding: 0px;">
          <a href="#">
            <img src="<?php echo $url ?>vistas/imgCliente/plantilla/under.png" class="z-depth-3 tooltipped" data-position="bottom" data-tooltip="Marca undes xwz "  style="width: 130px; height: 120px;">
          </a>
        </div> -->
      </div>
    </div>
  </div>
</div>


<style type="text/css">
  .cate-marca h5{
    color:black;
  }

  .blanco{
    color:white;
  }

  .saltador-fondo{
    background-image: linear-gradient(1deg, #00bcd4  100%, #e3ddd929 10%),
    url(<?php echo $url ?>vistas/imgCliente/plantilla/fu-pu2.jpg);
  }
</style>
<!-- #00bcd4    --- #4dd0e1  -->
