
  <div class="slider" style="margin-top: 0px;">
    <ul class="slides slideslide font-estilo" >
      <?php 
        $slideControlador =new slideControlador();
        $slide =$slideControlador->mostrarSlideControl();
        foreach ($slide as $key => $value) {      
          echo '
            <li>
              <img class="responsive-img" src="'.$urlAdmin.$value["foto"].'"> 
              <div class="caption left-align">
                <div class="row">
                  <div class="col s12 m8 l6 xl6 columna-dentro-slide" >
                    <h5 class="black-text "><b>'.$value["titulo"].'</b></h5>
                    <hr>
                    <h6 class="black-text "><b> $'.$value["precio"].'</b></h6>
                    <h6>
                    <br>
                      <span class="black-text " style="font-style:justify; ">
                        '.$value["texto"].'
                      </span>
                    </h6>
                    <br>
                  </div>
                </div>  
              </div>
            </li>
          ';
        }
      ?>
    </ul>
  </div>
      




<script type="text/javascript">

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.slider');
    var instances = M.Slider.init(elems);
  });
</script>

<style type="text/css">
  .slider .slides {
     background-image:  url(<?php echo $url ?>vistas/imgCliente/usuarios/pantalones/SLIDE.jpg);
    
}
.slider .slides li .caption {
    color: #fff;
    position: inherit;
    top: 15%;
    left: 15%;
    width: 60%;
    height: 440px;
    opacity: 0;
    padding-bottom: 20px;
}



  .columna-dentro-slide{
    background: #ffffff99;
    box-shadow:-11px -10px 4px rgba(11, 31, 69, 0.64);
    padding: 2.4rem;
    border-radius: 5px;
  }

  .font-estilo{
    font-family: 'Quicksand', sans-serif;
    color:white;
  }
</style>

