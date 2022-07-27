<div class="row">

  <h5><p></p></h5>

  <div class="col s2"></div>
  <div class="col s8">
    <form action="" method="POST" class="col s12 ">
      <div class="row card-panel formulario">
       <center><h5><p>Registrar Usuario</p></h5></center><br>
        <div class="input-field col s12 m6 l6">
          <input type="text"  id="idNombre" name="idNombre" class="validate" required>
          <label for="idNombre" >Nombre </label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input type="text"  id="idApellido" name="idApellido" class="validate" required>
          <label for="idApellido" >Apellido</label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input type="email"  id="idCorreo" name="idCorreo" class="validate" required>
          <label for="idProveedorMarca" >Correo</label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input type="password"  id="idContra" name="idContra" class="validate" required>
          <label for="idContra" >Contraseña</label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input type="password"  id="idContra2" name="idContra2" class="validate" required>
          <label for="idContra" >Repetir Contraseña</label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input disabled  id="idMunicipio" name="idMunicipio" value="Zacualtipán" type="text" class="validate">
          <label for="idMunicipio">Municipio </label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input type="text"  id="idColonia" name="idColonia" class="validate" required>
          <label for="idColonia" >Colonia</label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input type="text"  id="idCalle" name="idCalle" class="validate" required>
          <label for="idCalle" >Calle</label>
        </div>
        <div class="input-field col s12 m6 l4">
          <input type="number" minlength="10" id="idTelefono" name="idTelefono" class="validate" required>
          <label for="idTelefono"  >Teléfono</label>
        </div> 
        <div class="input-field col s4 m12 right-align ">
          <button class="btn green " type="submit">Registrar</button>
        </div>  
    </div>
    <?php 
    $controladorCliente = new ControladorCliente();
    $registro = $controladorCliente->registroControl();
    //var_dump($registro);
    ?>

    </form>

  </div>

</div>

  <style>
    .formulario{

      box-shadow: -12px -9px 17px 1px rgba(165, 173, 172, 0.43);


    }
</style>
