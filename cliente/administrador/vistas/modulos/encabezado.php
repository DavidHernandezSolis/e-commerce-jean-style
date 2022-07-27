<header id="header" class="page-topbar">
      <!-- start header nav-->
      <div class="navbar-fixed ">
        <nav class="navbar-color gradient-45deg-light-blue-cyan">
          <div class="nav-wrapper">
            <ul class="left">
              <li>
                <h1 class="logo-wrapper">
                  <a href="index.php" class=" darken-1 aa">
                    <div><hr class="icono-linea"><hr><h5>Jeans Style</h5></div>
                  </a>

                </h1>
              </li>
            </ul>
            <div class="header-search-wrapper hide-on-small-only" id="id_buscador1">
              <i class="material-icons hide-on-small-only" id="iconoBuscar">search</i>
              <input type="text" name="Search" id="search" class="header-search-input z-depth-2 hide-on-small-only buscador1" placeholder="Explorar Administración" />
              <input  disabled type="text" name="Search" id="search" class="header-search-input z-depth-2 hide-on-small-only buscador2" placeholder="Explorar Administración"  />
            </div>
            <ul class="right ">
              
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button hide-on-small-only" data-activates="mensajes-dropdow">
                  <i class="material-icons">message
                    <small class="notification-badge pink accent-2">3</small>
                  </i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button hide-on-small-only" data-activates="notifications-dropdown">
                  <i class="material-icons">notifications_none
                    <small class="notification-badge pink accent-2">5</small>
                  </i>
                </a>
              </li>
              <li>
                <a href="javascript:void(0);" class="waves-effect waves-block waves-light profile-button btn-medium " data-activates="profile-dropdown">
                  <span class="avatar-status avatar-online">
                    <img src="vistas/imgAdmin/imgPlantilla/avatar/avatar-7.png" alt="avatar">
                    <i></i>
                  </span>
                </a>
              </li>
            </ul>

            <!-- messages-dropdown -->
            <ul id="mensajes-dropdow" class="dropdown-content">
              <li class="mensaje-li">
                <h6>MENSAJES
                  <span class="new badge"><a href="index.php?action=ayuda" style="color:white;">Ver Todo...</a>3</span>
                </h6>
              </li>
              <li class="divider "></li>
              <li>
                <a href="#!" class="grey-text text-darken-2 mensaje-li-a">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> aqui va el nuevo mensaje que ya se m olvido en que consistia</a>
                <time class="media-meta tiempo-mensaje" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li class="mensaje-li-men"> 
                <a href="#!" class="grey-text text-darken-2 mensaje-li-m">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> aqui va el nuevo mensaje que ya se m olvido en que consistia</a>
                <time class="media-meta tiempo-mensaje" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li class="mensaje-li-men"> 
                <a href="#!" class="grey-text text-darken-2 mensaje-li-m">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> aqui va el nuevo mensaje que ya se m olvido en que consistia</a>
                <time class="media-meta tiempo-mensaje" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
            </ul>
            <!-- notifications-dropdown -->
            <ul id="notifications-dropdown" class="dropdown-content">
              <li>
                <h6>NOTIFICACIONES
                  <span class="new badge"><a href="index.php?action=notificaciones">Ver Todo...</a>5</span>
                </h6>
              </li>
              <li class="divider"></li>
               <li>
                <a href="#!" class="grey-text text-darken-2 mensaje-li-a">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> aqui va el nuevo mensaje que</a>
                <time class="media-meta tiempo-mensaje" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
              <li>
                <a href="#!" class="grey-text text-darken-2 mensaje-li-a">
                  <span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span> aqui va el nuevo mensaje que</a>
                <time class="media-meta tiempo-mensaje" datetime="2015-06-12T20:50:48+08:00">2 hours ago</time>
              </li>
            </ul>
            <!-- profile-dropdown -->
            <ul id="profile-dropdown" class="dropdown-content">
            <?php 
              if ( isset($_SESSION["validarSesionAdmin"]) && $_SESSION["validarSesionAdmin"] == "ok" ) {
                  echo '
                      <li>
                        <a href="#" class="grey-text text-darken-1">
                          <i class="material-icons">face</i>'.$_SESSION["nombreUser"].'</a>
                      </li>
                  ';
              }
            ?>
              <li class="hide-on-med-and-up">
                <a href="#" class="grey-text text-darken-1 ">
                  <i class="material-icons">message</i>Mensajes &nbsp; <span class="light-blue-text text-darken-4" >+3</span></a>
              </li>
              <li class="hide-on-med-and-up">
                <a href="#" class="grey-text text-darken-1 ">
                  <i class="material-icons">notifications_none  
                  </i>Notificaciones&nbsp; <span class="light-blue-text text-darken-4" >+4</span>
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="index.php?action=Salir" class="grey-text text-darken-1">
                  <i class="material-icons">keyboard_tab</i> Salir</a>
              </li>
            </ul>
          </div>
        </nav>
        
      </div>
      <!-- end header nav-->
    </header>



    <style type="text/css">







      .div-icono{
        margin-top: -20px;
      }
      .icono-linea{
        width: 60%;
      }
      .mensaje-li{
        padding-left: 20px;
        padding-right: 20px;
        padding-top: 10px;
      }

      .mensaje-li-a{
        padding-left: 20px;
        padding-right: 20px;
      }
      .tiempo-mensaje{
        padding-left: 22px;
      }
      .mensaje-li-men{
        border-top: solid 1px #6e696924;
      }



    #header input.buscador1{
        display: block;
    }
    #header input.buscador2{
        display: none;
    }




      @media(max-width: 600px){
        .aa{
          margin-left: 30px;
        }
      }

      @media(min-width:  601px) and  (max-width:  992px) {
        .aa{
          margin-left: 20px;
        }

        #header .header-search-wrapper{
          margin-left: 0px;
          width: 240px;
        }

      }

      @media(min-width:  993px) and  (max-width:  1200px) {
        #header .header-search-wrapper{
          width: 500px;
        }
      }

      @media(min-width: 1201px) {

      }




    </style>