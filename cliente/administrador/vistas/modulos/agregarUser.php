
<h5><p>Agregar Usuario</p></h5>

<form action="" method="post" class="col s12 " enctype="multipart/form-data" >
    <div class="row card-panel ">

        <div class="input-field col s8 m6 l4 ">
              <input type="text"  id="nombre" name="nombre" class="validate" required>
              <label for="nombre" >Nombre: </label>
        </div>

        <div class="input-field col s8 m6 l4">
              <input type="text"  id="apellidos" name="apellidos" class="validate" required>
              <label for="apellidos" >Apellidos: </label>
        </div>

        <div class="input-field col s8 m6 l4">
          <input type="text"  id="direcion" name="direcion" class="validate" required>
          <label for="direcion" >Dirección: </label>
        </div>
          
        <div class="input-field col s8 m6 l4">
          <input type="password"  id="contrasena" name="contrasena" class="validate" required>
          <label for="contrasena" >Contraseña: </label>
        </div>   

        <div class="input-field col s8 m6 l4">
          <input type="tel"  id="telefono" name="telefono" class="validate" required>
          <label for="telefono" >Teléfono: </label>
        </div>    
     
        <div class="col s12 m12"></div>

          <div class="input-field col s4 m4 ">
            <button class="btn green" type="submit">enviar</button>
          </div>
            <?php 
              $registrar = new ControladorPlantilla();
              $registrar -> registroAdmin();
            ?>

    </div>
</form>


  <style>
    
    .imagenes img{
      margin-top: 15px;
     max-width: 180px;
      max-height: 230px;
      min-width: 120px;
      min-height: 200px;
    }

    .claseImagenPrincipal{
      width: 100px;
      
      border: 1px solid;
      height: 150px;
    }

    .classEspacio{
    
      height: 30px;
    }

  
  .claseImagen1{
    background: #c2c2c2;
    width: 50px;
    height: 80px;
    border: 1px solid;

  }

  .claseImagen2{
    background: #c2c2c2;
    width: 50px;
    height: 80px;
    border: 1px solid;

  }

  .claseImagen3{
    background: #c2c2c2;
    width: 50px;
    height: 80px;
    border: 1px solid;
    

  }

  @media(max-width: 600px){
        .claseImagen3 {
     margin-top: 20px;  
    }}

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
