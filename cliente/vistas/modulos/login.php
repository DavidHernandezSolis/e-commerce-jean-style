<div class="row">
    <div class="col s2 m4 l4 "></div>
    <form action="" method="POST" class="col s8 m4 l4  classCentrar">
        <div class="row card-panel fondoFrom">  
            <center> <i class="large material-icons">account_circle</i></center>
            <h5 class="texto"><center> Iniciar sesión </center></h5>
            <div class="input-field col s12 m12">
                <input type="text"  id="idUsuario" name="idUsuario" class="validate" required>
                <label for="idUsuario" ><i class="material-icons">person</i>Usuario-Correo</label>
            </div>
            <div class="input-field col s12 m12">
                <input type="password"  id="idContrasena" name="idContrasena" class="validate" required>
                <label for="idContrasena" ><i class="material-icons">lock</i>Contraseña</label>
            </div>
            <div class="col s12"><center>
                <button class="btn waves-effect waves-light blue" type="submit">enviar </button></center>
            </div>
            <div class="col s12"><center>
                <a href="crearCuenta">Crear Cuenta</a></center>
            </div>
        </div>         
        <?php 
           $login = new ControladorCliente();
           $login -> loginControl();
       
        ?>
    </form>
</div>



<style>

  .fondoFrom{
    background: rgba(95, 226, 208, 0.06);
    margin: 30px auto;
  }

  .classCentrar{

    margin-left: auto;
    margin-right:auto;
    margin-top: 35px;
    align-content: center;
    width: 60%;
  }

/*
     @media(max-width: 300px){
        .fondoFrom {
      width: 5500px;
      margin:12px auto;  
     
    }

    @media(max-width: 300px){
        .texto {
      
      font-size: 14px;
    }

    
      }

      @media(max-width: 600px){
        .fondoFrom {
      width: 60%;
      margin:12px auto;  
    }
    
      }

      */

    </style>

