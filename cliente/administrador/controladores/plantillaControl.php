<?php 


class ControladorPlantilla{

	

//-----------------------------------
//Funcion para incluir plantilla.php en index
//-----------------------------------
	public function plantilla(){
		include "vistas/plantilla.php";
	}
	public function rutasContenidoDinamico(){
		$rutas = $_GET["action"];
		$ruta =enlacesPaginas::enlacesPaginasModel($rutas); 
		include $ruta;
	}


	#Registro de productos nombre
	#---------------------------------------------
	public function registroProductos(){
		

		if (isset($_POST["nameCodigo"])) {

			if (isset($_POST["nameCategoria"]) && isset($_POST["nameTalla"]) && isset($_POST["nameMarca"])) {


				$imagen = $_FILES["imagen1"]["tmp_name"];
				$imagen1 = $_FILES['imagen1']['name'];
				$imagenRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen1;
				move_uploaded_file($imagen, $imagenRuta);

				$imagenNum2 = $_FILES["imagen2"]["tmp_name"];
				$imagen2 = $_FILES['imagen2']['name'];
				$imagenRutaNum2 = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen2;
				move_uploaded_file($imagenNum2, $imagenRutaNum2);

				$imagenNum3 = $_FILES["imagen3"]["tmp_name"];
				$imagen3 = $_FILES['imagen3']['name'];
				$imagenRutaNum3 = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen3;
				move_uploaded_file($imagenNum3, $imagenRutaNum3);

				if ($_POST["namePublicidad"] != 1 ) {

					if ($_POST["namePublicidad"] == 2) {

						$baner = 0;
						$general = 1;
						
					}

					if ($_POST["namePublicidad"] == 3) {

						$baner = 1;
						$general = 0;
						
					}
					
					
				} else {
					$baner = 0;
					$general = 0;

				}
				


					
				$cadenaController = array (
					"codigo" => $_POST["nameCodigo"],
					"Titulo"=> $_POST["nameTitulo"],
					"Fecha"=> $_POST["nameFecha"],
					"Categoria"=> $_POST["nameCategoria"],
					"Talla"=> $_POST["nameTalla"],
					"Marca"=> $_POST["nameMarca"],
					"color"=> $_POST["namecolor"],
					"Cantidad"=> $_POST["nameCantidad"],
					"imagen1"=>$imagenRuta,
					"imagen2"=>$imagenRutaNum2,
					"imagen3"=>$imagenRutaNum3,
					"PrecioProvee"=> $_POST["namePrecioProvee"],
					"PrecioPubli"=> $_POST["namePrecioPubli"],
					"Descripcion"=> $_POST["nameDescripcion"],
					"Oferta"=> $_POST["nameOferta"],
					"baner"=>$baner,
					"general"=>$general 
					);

				// aqui
				// $cadenaController = array (
				// 	"codigo" => $_POST["nameCodigo"]);

				$registrar = new Datos();
	          	$registrar -> registrarProductosCRUD($cadenaController, "productos");
	          	var_dump($registrar);


				// $respuesta = new Datos::registrarProductosCRUD($cadenaController, "productos");

				if ($respuesta="success") {
					header("location:index.php?action=insertarProductos");

					//var_dump($cadenaController);
					echo '
						<script>alert("hola");<script>
					';
					//header("location:index.php");
				}else{
					//var_dump($cadenaController);
					echo '
						<script>alert("adios");<script>
					';
					//header("location:index.php");
				}


			} else {
				echo '
				<script>
					alert("Verificar Categoria, Marca y Tallas");
				</script>
				';
			}
		}
				

		
	}

	#para ver la lista de las categorias y las marcas
	#-------------------------------------------------------

	static public function listaCategoriasPlantilla(){
		$respuesta = Datos::listaCategoriaCrud("categorias");
        return $respuesta;

	}

	static public function listaMarcaPlantilla(){
		$respuesta = Datos::listaMarcaCrud("marca");
        return $respuesta;

	}


	#visulizar la tabla consulta SELECT Productos
	#-------------------------------------------------------

	public function visualizarProductosController(){

		$respuesta = Datos::visualizarProductosCRUD("productos");

			#var_dump($respuesta);
		foreach ($respuesta as $row => $item) {

				#Código	Titulo	Categorìa	Marca	Tipo	Talla	Cantidad	Color	Descripcion	Foto	Oferta	Precio	Modificar	Eliminar
			
			echo '
			<tr >

			
			<td>'.$item['No_Codigo'].'</td>
			<td>'.$item['Titulo'].'</td>
			<td>'.$item['idCategorias'].'</td>
			<td>'.$item['idMarca'].'</td>
			<td>'.$item['Talla'].'</td>
			<td>'.$item['Cantidad'].'</td>
			<td>'.$item['Color'].'</td>
			<td>'.$item['Descripcion'].'</td>

			<td><img class="fotoLteral" src="'.$item['FotoFrontal'].'"></td>
			<td>'.$item['Oferta'].'</td>
			<td>'.$item['Precio'].'</td>
			<td>'.$item['Fecha'].'</td>
			<td>
			<a class="btn separar" href="index.php?action=EditarProducto&id='.$item["idProductos"].'"><i class="material-icons" >create</i></a>
			<a class="btn " href="index.php?action=verProductos&idBorrar='.$item["idProductos"].'"><i class="material-icons" >delete</i> </a></td>
			

			</tr>';
		} 

	}

		

		#Eliminar Productos id
		#--------------------------------------------------------------------------
		
	static public function BorrarProductosController(){
		
		
		if (isset($_GET["idBorrar"])) {
			$DatosControlador =$_GET["idBorrar"];
			$respuesta = Datos::BorrarProductosCrud($DatosControlador, "productos");

			if ($respuesta =="success") {
				header("location:index.php?action=verProductos");
			} 
			


	}
		

	}

		#para editar Productos id
		#--------------------------------------------------------------------------
		
		static public function idCategoriasPlantilla(){
		$respuesta = Datos::listaCategoriaCrud("categorias");
        return $respuesta;

	}

#Editar Productos
	#-------------------------------------------------------

		public function EditarProductosController(){
			$rutaGeneral = "http://localhost/ProyectoE-commerceEquipo1/administrador/";
				$info= $_GET["id"];

			#EditarProductosCRUD falta agregarlo al CRUD
			$respuesta = Datos::EditarProductosCRUD($info, "productos");
			#idProductos`, `No_Codigo`, `Titulo`, `Precio`, `PrecioProveedor`, `Cantidad`, `Color`, `Talla`, `Oferta`, `Descripcion`, `FotoFrontal`, `idMarca`, `idCategorias`, `Fecha`, `Nuevo`, `FotoLateral`, `FotoTrasera`, `Publicidad`, `PublicidadBaner

		//var_dump($respuesta["FotoFrontal"]);
		//var_dump($respuesta["FotoLateral"]);
		//var_dump($respuesta["FotoTrasera"]);
		
			
			echo '

			<div class="input-field col s12">
						<input  type="hidden" value="'.$respuesta["idProductos"].'" id="idid" name="nameid" class="validate" required>
					</div>



       <div class="input-field col s12 m8 l2">
              <input type="text"  id="idCodigo" value="'.$respuesta["No_Codigo"].'" name="nameCodigo" class="validate" required>
              <label for="idCodigo" >No. Código* </label>
        </div>

        <div class="input-field col s12 m6 l6">
              <input type="text"  id="idTitulo" value="'.$respuesta["Titulo"].'"  name="nameTitulo" class="validate" required>
              <label for="idTitulo" >Titulo*</label>
        </div>

        <div class="input-field col s12 m6 l4">
              <input type="date"  id="idFecha" value="'.$respuesta["Fecha"].'" name="nameFecha" class="validate" required>
              <label for="idFecha" ></label>
        </div>

        <div class="input-field col s12 m6 l4">
              <select name="nameCategoria" >
                  <option  value="'.$respuesta["idCategorias"].'"   selected>'.$respuesta["Nombres"].'</option>
                  ';
              	
              		
                      //$Categoria =ControladorPlantilla::idCategoriasPlantilla();

                      $Categoria =ControladorPlantilla::listaCategoriasPlantilla();
                          

                      foreach ($Categoria as $key => $valueC) {
                        
                        echo '
                        	<option value="'.$valueC["idCategorias"].'">'.$valueC["Nombres"].'</option>

                        ';
                        
                      }
                  
             echo '
               </select>   
        </div>
             
        <div class="input-field col s12 m6 l4">
              <select name="nameTalla">
                <option  value="'.$respuesta["Talla"].'"   selected>'.$respuesta["Talla"].'</option>

                  
                <option value="Extra Pequeño">Extra Pequeño</option>
                <option value="Pequeño">Pequeño</option>
                <option value="Mediano">Mediano</option>
                <option value="Grande">Grande</option>
                <option value="Extra Granda">Extra Granda</option>
                <option value="Extra Extra Grande">Extra Extra Grande</option>

              </select> 
            
        </div>


        <div class="input-field col s12 m6 l4">
          <select name="nameMarca">
             <option value="'.$respuesta["idMarca"].'"  selected>'.$respuesta["Nombre"].'</option>';

            
            $marca =ControladorPlantilla::listaMarcaPlantilla();
                //var_dump($Categoria);
                foreach ($marca as $key => $value) {
               		echo '
            			<option value="'.$value["idMarca"].'">'.$value["Nombre"].'</option>
            			';
                }
            
        echo '
          </select>
         
        </div>

        	

        <div class="input-field col s12 m6 l3">

          <input type="text"  value="'.$respuesta["Color"].'" id="idColor" name="namecolor" class="validate" required>
          <label for="idColor" >Color*</label>
        </div>
          
        <div class="input-field col s12 m6 l3">
          <input type="number" value="'.$respuesta["Cantidad"].'" id="idCantidad" name="nameCantidad" class="validate" required>
          <label for="idCantidad" >Cantidad*</label>
        </div>

        <div class="input-field col s12 m6 l3">
          <input type="number" value="'.$respuesta["PrecioProveedor"].'" id="idPrecioProvee" name="namePrecioProvee" class="validate" required>
          <label for="idPrecioProvee" >Precio Proveedor*</label>
        </div>

       

        <div class="input-field col s12 m6 l3">
          <input type="number" value="'.$respuesta["Precio"].'" id="idPrecioPubli" name="namePrecioPubli" class="validate" required>
          <label for="idPrecioPubli" >Precio Publico*</label>
        </div>
          

    
        <div class="input-field col s12 m6 l6">
          <input type="number" value="'.$respuesta["Oferta"].'" placeholder="ingresar la Cantidad" value="0" id="idOferta"  name="nameOferta" class="validate" required>
          <label for="idOferta" >Oferta</label>
        </div>

         <div class="input-field col s12 m6 l6">
              
            
        </div>


          <div class="input-field col s12 m6 l6">
          <textarea placeholder="Descripción*" value=""  name="nameDescripcion" class="materialize-textarea">'.$respuesta["Descripcion"].'</textarea>
        </div>

          <div class="col s12"><center><p class="" style="text-align: center;">Foto del producto</p></center></div>
        <div class="col m3 classEspacio">
        <!-- para divir las imagnes para que se bajen --> 
        </div>

        <div class="col s12 imagenes">
            <div class="col s3 ">
             
             <input type="file" accept="image/*"" value="" name="imagen1" onchange="openFile(event)"><br>
              <img id="output" src="'.$rutaGeneral.$respuesta["FotoFrontal"].'">

               <input type="hidden" name="frontal" value="'.$respuesta["FotoFrontal"].'">

            </div>
            <div class="col s3 offset-s1 ">
              <input type="file" accept="image/*" value="" name="imagen2" onchange="openFile2(event)"><br>
              <img id="output2" src="'.$rutaGeneral.$respuesta["FotoLateral"].'">

               <input type="hidden" name="lateral" value="'.$respuesta["FotoLateral"].'">

            </div>
            <div class="col s3 offset-s1 ">
              <input type="file" accept="image/*" value="" name="imagen3" onchange="openFile3(event)"><br>
              <img id="output3" src="'.$rutaGeneral.$respuesta["FotoTrasera"].'">

               <input type="hidden" name="trasera" value="'.$respuesta["FotoTrasera"].'">

            </div>
          </div>



			';



		
	}

		#Ahora si Modificar Productos
	#------------------------------------------	
	public function ActualizarProductos(){
	

		if (isset($_POST["nameTitulo"])) {

			if (empty($_FILES["imagen1"]["tmp_name"]) && empty($_FILES["imagen2"]["tmp_name"]) && empty($_FILES["imagen3"]["tmp_name"])) {

				$frontalRuta = $_POST["frontal"];
				$lateralRuta = $_POST["lateral"];
				$traseroRuta = $_POST["trasera"];

				
			}else if (empty($_FILES["imagen1"]["tmp_name"]) && empty($_FILES["imagen2"]["tmp_name"])) {

				$frontalRuta = $_POST["frontal"];
				$lateralRuta = $_POST["lateral"];


				 $imagen = $_FILES["imagen3"]["tmp_name"];
				$imagen3 = $_FILES['imagen3']['name'];
				$traseroRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen3;
				move_uploaded_file($imagen, $traseroRuta);

				// $imagen = $_FILES["imagen1"]["tmp_name"];
				//  $imagen1 = $_FILES['imagen1']['name'];
				//  $frontalRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen1;
				//  move_uploaded_file($imagen, $frontalRuta);

				//  $imagenNum2 = $_FILES["imagen2"]["tmp_name"];
				//  $imagen2 = $_FILES['imagen2']['name'];
				//  $lateralRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen2;
				//  move_uploaded_file($imagenNum2, $lateralRuta);


			}else if (empty($_FILES["imagen1"]["tmp_name"]) && empty($_FILES["imagen3"]["tmp_name"])) {
				$frontalRuta = $_POST["frontal"];
				
				$imagenNum2 = $_FILES["imagen2"]["tmp_name"];
			 	$imagen2 = $_FILES['imagen2']['name'];
			 	$lateralRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen2;
			 	move_uploaded_file($imagenNum2, $lateralRuta);


				$traseroRuta = $_POST["trasera"];

				// $imagen = $_FILES["imagen1"]["tmp_name"];
				//  $imagen1 = $_FILES['imagen1']['name'];
				//  $frontalRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen1;
				//  move_uploaded_file($imagen, $frontalRuta);

				//  $imagenNum3 = $_FILES["imagen3"]["tmp_name"];
				//  $imagen3 = $_FILES['imagen3']['name'];
				//  $traseroRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen2;
				//  move_uploaded_file($imagenNum3, $traseroRuta);

				
				// $lateralRuta = $_POST["lateral"];
			

			}else if (empty($_FILES["imagen2"]["tmp_name"]) && empty($_FILES["imagen3"]["tmp_name"])) {



				

				$imagen = $_FILES["imagen1"]["tmp_name"];
				$imagen1 = $_FILES['imagen1']['name'];
				$frontalRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen1;
				move_uploaded_file($imagen, $frontalRuta);

				$lateralRuta = $_POST["lateral"];

				$traseroRuta = $_POST["trasera"];
				
				

			}else if (empty($_FILES["imagen1"]["tmp_name"])) {

				$frontalRuta = $_POST["frontal"];

				// $imagen = $_FILES["imagen1"]["tmp_name"];
				//  $imagen1 = $_FILES['imagen1']['name'];
				//  $frontalRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen1;
				//  move_uploaded_file($imagen, $frontalRuta);

				 $imagen = $_FILES["imagen2"]["tmp_name"];
				 $imagen2 = $_FILES['imagen2']['name'];
				 $lateralRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen2;
				 move_uploaded_file($imagen, $lateralRuta);

				 $imagenT2 = $_FILES["imagen3"]["tmp_name"];
				 $imagen3 = $_FILES['imagen3']['name'];
				 $traseroRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen3;
				 move_uploaded_file($imagenT2, $traseroRuta);

				
				
			} else if (empty($_FILES["imagen2"]["tmp_name"])) {

				// $imagen = $_FILES["imagen2"]["tmp_name"];
				//  $imagen2 = $_FILES['imagen2']['name'];
				//  $lateralRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen2;
				//  move_uploaded_file($imagen, $lateralRuta);

				$imagen01 = $_FILES["imagen1"]["tmp_name"];
				$imagen1 = $_FILES['imagen1']['name'];
				$frontalRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen1;
				move_uploaded_file($imagen01, $frontalRuta);

				$lateralRuta = $_POST["lateral"];

				 $imagen03 = $_FILES["imagen3"]["tmp_name"];
				 $imagen3 = $_FILES['imagen3']['name'];
				 $traseroRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen3;
				 move_uploaded_file($imagen03, $traseroRuta);

			}else if (empty($_FILES["imagen3"]["tmp_name"])) {

				$imagen01 = $_FILES["imagen1"]["tmp_name"];
				$imagen1 = $_FILES['imagen1']['name'];
				$frontalRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen1;
				move_uploaded_file($imagen01, $frontalRuta);

				// $imagen = $_FILES["imagen3"]["tmp_name"];
				//  $imagen3 = $_FILES['imagen3']['name'];
				//  $traseroRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen3;
				//  move_uploaded_file($imagen, $traseroRuta);

				$imagen02 = $_FILES["imagen2"]["tmp_name"];
				$imagen2 = $_FILES['imagen2']['name'];
				$lateralRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen2;
				move_uploaded_file($imagen02, $lateralRuta);

				$traseroRuta = $_POST["trasera"];

			} else {
				
				 
				$imagen = $_FILES["imagen1"]["tmp_name"];
				 $imagen1 = $_FILES['imagen1']['name'];
				 $frontalRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen1;
				 move_uploaded_file($imagen, $frontalRuta);

				$imagenNum2 = $_FILES["imagen2"]["tmp_name"];
				 $imagen2 = $_FILES['imagen2']['name'];
				 $lateralRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen2;
				  move_uploaded_file($imagenNum2, $lateralRuta);

				 $imagenNum3 = $_FILES["imagen3"]["tmp_name"];
				 $imagen3 = $_FILES['imagen3']['name'];
				 $traseroRuta = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagen3;
				move_uploaded_file($imagenNum3, $traseroRuta);
			}
			
			// echo $_POST["nameid"];frontal lateral  trasera
			echo $frontalRuta;
			echo $lateralRuta;
			echo $traseroRuta;

				 $DatosControlador = array (
				 	
				 	"idid"=> $_POST["nameid"],
				 	"Codigo"=> $_POST["nameCodigo"],
				 	"Titulo"=> $_POST["nameTitulo"],
				 	"Fecha"=> $_POST["nameFecha"],
				 	"Categoria"=> $_POST["nameCategoria"],
				 	"Talla"=> $_POST["nameTalla"],
				 	"Marca"=> $_POST["nameMarca"],
				 	"color"=> $_POST["namecolor"],
				 	"Cantidad"=> $_POST["nameCantidad"],
				 	"Provee"=> $_POST["namePrecioProvee"],
				 	"PrecioPubli"=> $_POST["namePrecioPubli"],
				 	"Descripcion"=> $_POST["nameDescripcion"],
				 	"Oferta"=> $_POST["nameOferta"],
				 	"nimagen1"=> $frontalRuta,
				 	"nimagen2"=> $lateralRuta,
				 	"nimagen3"=> $traseroRuta

				 	
				 );

				var_dump($DatosControlador);
				$respuesta = Datos::ActualizarProductosCRUD($DatosControlador, "productos");
				echo $respuesta;

				if ($respuesta=="success") {
				 header("location:index.php?action=verProductos");
				}else{
				 echo "error";
				}

		}

	}


	

	#visulizar Usuario registrados
	#-------------------------------------------------------

	static public function visualizarClientesController(){

			$respuesta = Datos::visualizarClientesCRUD("usuario");

			#var_dump($respuesta);
			foreach ($respuesta as $row => $item) {
				
			
			 
			echo '
		<tr >

			
			<td>'.$item['idUsuario'].'</td>
			<td>'.$item['Nombre'].'</td>
			<td>'.$item['Apellido'].'</td>
			<td>'.$item['Correo'].'</td>
			<td>'.$item['Domicilio'].'</td>
			<td>'.$item['Telefono'].'</td>
			<td>
				<a class="btn separar" href="index.php?action=EditarUsuario&id='.$item['idUsuario'].'">
					<i class="material-icons" >create</i>
				</a>
					
			</td>
			
		
		</tr>';
	} 
	}

	#Ediatar Usuarios
	#------------------------------------------	
	public function EditarUsuarios(){
	$info= $_GET["id"];
	
	$respuesta = Datos::EditarUsuariosCRUD($info, "usuario" );
	//echo $respuesta[0];



	echo '<div class="input-field col s12">
						<input  type="hidden" value="'.$respuesta["idUsuario"].'" id="idid" name="nameid" class="validate" required>
					</div>

					<div class="input-field col s12">
						<input type="text"  value="'.$respuesta["Nombre"].'"  id="idnombre" name="nameNombre" class="validate" required>
						<label for="idDescripcionMarca" >Nombre</label>
					</div>

					<div class="input-field col s12">
						<input type="text"   value="'.$respuesta["Apellido"].'" id="idApellidos" name="nameApellidos" class="validate" required>
						<label for="idApellidos" >Apellidos</label>
					</div>

					<div class="input-field col s12">
						<input type="text"  value="'.$respuesta["Correo"].'" id="idCorreo" name="nameCorreo" class="validate" required>
						<label for="idCorreo" >Correo</label>
					</div>

					<div class="input-field col s12">
						<input type="text"  value="'.$respuesta["Domicilio"].'" id="idDireccion" name="nameDireccion" class="validate" required>
						<label for="idDireccion" >Dirección</label>
					</div>

					<div class="input-field col s12">
						<input type="text"  value="'.$respuesta["Telefono"].'"  id="idTelefono" name="nameTelefono" class="validate" required>
						<label for="idTelefono" >Telefono</label>
					</div> 
					<div class="col s12">
				

                    <input type="submit" class="btn waves-effect waves-cyan" value="Actualizar">

                    <div class="row"></div>

                    <br>
				</div>';

	}

	#Ahora si Modificar Usuarios
	#------------------------------------------	
	public function Actualizarsuarios(){
	

		if (isset($_POST["nameNombre"])) {
			// echo $_POST["nameid"];
				 $DatosControlador = array (
				 	"idUsuario"=> $_POST["nameid"],
				 	"Nombre"=> $_POST["nameNombre"],
				 	"Apellido"=> $_POST["nameApellidos"],
				 	"correo"=> $_POST["nameCorreo"],
				 	"Direccion"=> $_POST["nameDireccion"],
				 	"Telefono"=> $_POST["nameTelefono"]
				 );

				 $respuesta = Datos::ActualizarsuariosSCRUD($DatosControlador, "usuario");
				 echo $respuesta;

				 if ($respuesta=="success") {
				 	header("location:index.php?action=clientesRegistrados");
				 }else{
				 	echo "error";
				 }

		}

	}




	#visulizar clientes Activos
	#-------------------------------------------------------

	static public function visualizarClientesACTIVOSController(){

			$respuesta = Datos::visualizarClientesACTIVOSCRUD("cliente");

			#var_dump($respuesta);
			foreach ($respuesta as $row => $item) {
				
			#BD  idCliente`, `Nombre`, `Testigo1`, `Colonia`, `Calle`, `calle2`, `Referencia`, `foto`, `Telefono_Cliente`, `Telefono_Testigo
			echo '
		<tr >

			
			<td>'.$item['idCliente'].'</td>
			<td>'.$item['Nombre'].'</td>
		
			<td>no esta en la BD</td>
			<td>'.$item['Colonia'].'</td>
			<td>'.$item['Referencia'].'</td>
			<td><a class="btn separar" href=""><i class="material-icons" >create</i></a>
			<a class="btn " href=""><i class="material-icons" >delete</i> </a></td>
			
		
		</tr>';
	} 
	}
		

		#visulizar ventas Fisicas
	#-------------------------------------------------------

	static public function visualizarventasFisicasController(){

			$respuesta = Datos::visualizarVentasFisicasCRUD("com_fisica_new");

			#var_dump($respuesta);
			foreach ($respuesta as $row => $item) {
				
			
			echo '
		<tr >



			
			<td>'.$item['id'].'</td>
			<td>'.$item['Titulo'].'</td>
		
			<td>'.$item['Marca'].'</td>
			<td>'.$item['Categoría'].'</td>
			<td>'.$item['Talla'].'</td>
			<td>'.$item['Cantidad'].'</td>
			<td>'.$item['Precio'].'</td>
			<td>'.$item['PrecioTotal'].'</td>
			<td>'.$item['PrecioProveedor'].'</td>
			<td>'.$item['fecha'].'</td>

			<td>
			<a class="btn " href="index.php?action=ventasFisicas&idBorrarProduto='.$item["id"].'"><i class="material-icons" >delete</i> </a></td>
			
		
		</tr>';
	} 
	}


	#Eliminar Conuslta para eliminar producto
		#--------------------------------------------------------------------------
		
		static public function BorrarProductoPrincipal(){
		
		
		if (isset($_GET["idBorrarProduto"])) {
			$DatosControlador =$_GET["idBorrarProduto"];
			$respuesta = Datos::BorrarProductoCrud($DatosControlador, "com_fisica_new");

			if ($respuesta =="success") {
				header("location:index.php?action=ventasFisicas");
				
			  } else if($respuesta =="error"){

				echo '<script> alert("Este Categoria se esta utilizando en un Producto ");
				window.location="index.php?action=categorias";
				</script>'; 
			}
		}
	}
	
	
	
		#visulizar ventas Online
	#-------------------------------------------------------

	static public function 	visualizarventasOnlineController(){

			
			$respuesta = Datos::VentasOnline("compras_online");
			//var_dump($respuesta);

			
			// $status = $respuesta["CondicionProceso"];
			// if ($status == 0) {				
			// 	echo '
			// 		colocar button Para editar CondicionProceso y colocarlo a 1
			// 	';
			// }else{
			// 	echo '
			// 		Entregado
			// 	';
			// }

			// echo $respuesta['Cantidad'];
			$numClientes =0;
			$pagoTotal = 0;
			$totalProveedor = 0;
			foreach ($respuesta as $row => $item) {
				$numClientes++;
			
				$Codiccion="";
	 			if ($item['CondicionProceso']==0) {
	 				
	 				$Codiccion="
	 				<td style=' border: 1px solid White;  ' class='center'>
	 					<a class='btn separar red' href=''>Pendiente</a>
	 				</td>";
	 			}else{
	 				$Codiccion="
	 				<td class='center'><a class='btn separar green' >Entregado</a></td>";

	 			}



	 			$Oferta = $item["Oferta"];
				$Cantidad = $item["Cantidad"];
				$Precio = $item["Precio"];
				if ($Oferta == 0) {				
					$CantidadTotal = $Cantidad * $Precio;
				}else{
					$CantidadTotal = $Cantidad * $Oferta;
				}

				$pagoTotal += $CantidadTotal;

				$precioProveedor = $item["PrecioProveedor"];
				$precioProveedorPorCantidad =$precioProveedor *$Cantidad;
				$totalProveedor += $precioProveedorPorCantidad;

				
				
				echo '
				<tr class="separarFilas">
				<td>'.$item["idCompras"].'</td>			
				<td>'.$item["Nombre"].' '.$item["Apellido"].'</td>
				<td>'.$item["Titulo"].'</td>
				<td>'.$Cantidad.'</td>
				<td>'.$CantidadTotal.'</td>
				<td>'.$item["Fechas"].'</td>
					'.$Codiccion.'
				<td  class="center">
				<a class="btn " href="index.php?action=ventasGeneradasOnline&idBorrarVentasOnline='.$item["idCompras"].'"  ><i class="material-icons" >delete</i> </a></td>
				
			
				</tr>';

		
		} 

		$totalGanancias =$pagoTotal - $totalProveedor;

		echo '</table>
			</div>

	


			</div>	

							<div class="fixed-action-btn toolbar">
								<a class="btn-floating btn-large blue">
									<i class="large material-icons">attach_money</i>
								</a>
								<ul style="text-align: center;">
									<li class="right-align Informes"> No. Clintes: 
								
	 							<span class="">
	 							'.$numClientes.'
	 							</span></li>
									<li class="center-align Informes ">Ventas:<span>$
										'.$pagoTotal.'
									</span></li>
									<li class="left-align Informes ">Inversiòn:<span>$
										'.$totalProveedor.'
									</span></li>
									<li class="left-align Informes ">Gananacias:
									<span>$ '.$totalGanancias.'</span>  </li>
									
								</ul>
							</div>';
	}



	#Eliminar Conuslta para eliminar Ventas online
		#--------------------------------------------------------------------------
		
	static public function BorrarVentasOnlinePrincipal(){
			try {
			    if (isset($_GET["idBorrarVentasOnline"])) {
					$DatosControlador =$_GET["idBorrarVentasOnline"];
					$respuesta = Datos::BorrarVentasOnlineCrud($DatosControlador, "compras_online");

					if ($respuesta =="success") {
						header("location:index.php?action=ventasGeneradasOnline");
						
					}
				}
			} catch (Throwable $e) {
			  echo '
			   	<script>
			   		alert("La categoria no se puede eliminar en estos momentos ya que esta siendo utilizada por algun producto");
			   		setTimeout(function () {
					        window.location.href = "index.php?action=categorias";
					}, 400);
			   	</script>
			   ';
			}
	}




		#visulizar Categorias
	#-------------------------------------------------------

	static public function visualizarCategoriasController(){

			$respuesta = Datos::visualizarCategoriasCRUD("categorias");

		
			foreach ($respuesta as $row => $item) {
				
			#BD  idCategorias`, `Nombres`, `Descripcion`, `icono
			
			echo '
		<tr >

			
			<td>'.$item['idCategorias'].'</td>
			<td>'.$item['Nombres'].'</td>
		
			<td>'.$item['Descripcion'].'</td>
			<td><img class="imagenesVisualizar" src="'.$item['icono'].'"></td>

			<td><a class="btn separar" href="index.php?action=EditarCategoria&id='.$item['idCategorias'].'"><i class="material-icons" >create</i></a>
			<a class="btn " href="index.php?action=categorias&idBorrarCate='.$item["idCategorias"].'"><i class="material-icons" >delete</i> </a></td>
			
		
		</tr>';
	
	} 
	}


	#Eliminar Conuslta para eliminar Categoria
		#--------------------------------------------------------------------------
		
	static public function BorrarCategoriaPrincipal(){
			try {
			    if (isset($_GET["idBorrarCate"])) {
					$DatosControlador =$_GET["idBorrarCate"];
					$respuesta = Datos::BorrarCategoriaCrud($DatosControlador, "categorias");

					if ($respuesta =="success") {
						header("location:index.php?action=categorias");
						
					}
				}
			} catch (Throwable $e) {
			  echo '
			   	<script>
			   		alert("La categoria no se puede eliminar en estos momentos ya que esta siendo utilizada por algun producto");
			   		setTimeout(function () {
					        window.location.href = "index.php?action=categorias";
					}, 400);
			   	</script>
			   ';
			}
	}



	#Registro de Categorias
	#---------------------------------------------
	public function registroCategoria(){

		if (isset($_POST["nameNombre"])) {
				
				$imagenCategoria = $_FILES["imagenCategorias"]["tmp_name"];
				$imagenCategorias = $_FILES['imagenCategorias']['name'];
				$imagenRutaCate = "vistas/imgAdmin/imgCategorias/".$imagenCategorias;
				move_uploaded_file($imagenCategoria, $imagenRutaCate);

			$cadenaController = array (
				"codigo" => $_POST["nameNombre"],
				"Titulo"=> $_POST["nameDescripcion"],
				"imgCategoria"=> $imagenRutaCate				
				);
			$registrar = new Datos();
          $registrar -> registrarCategoriaCRUD($cadenaController, "categorias");

		}		
	}





	#Registro de Marca
	#---------------------------------------------
	public function registroMarca(){

		if (isset($_POST["nameMarca"])) {
			
				$imagenMarca = $_FILES["imagenMarca"]["tmp_name"];
				$imagenM = $_FILES['imagenMarca']['name'];
				$imagenRutaM = "vistas/imgAdmin/imgAdministrador/".$imagenM;
				move_uploaded_file($imagenMarca, $imagenRutaM);

				
				$cadenaController = array (
				"marca" => $_POST["nameMarca"],
				"descripcion"=> $_POST["nameDescripcion"],
				"proveedor"=> $_POST["nameProveedor"],
				"imagenGuardar"=> $imagenRutaM
				);

		
			 $registrar = new Datos();
           $registrar -> registrarMarcaCRUD($cadenaController, "marca");

		}		

	}

#visulizar Marcas
#-------------------------------------------------------

	static public function visualizarMarcasController(){

			$respuesta = Datos::visualizarMarcasCRUD("marca");

		
			foreach ($respuesta as $row => $item) {
				
			#BD ID	Nombre	Descripciòn	Proveedor `, ``, ``, ``
			
			echo '
		<tr >

			
			<td>'.$item['idMarca'].'</td>
			<td>'.$item['Nombre'].'</td>
			<td>'.$item['Descripcion'].'</td>
			<td>'.$item['Proveedor'].'</td>
			<td><img class="fotoLteral" src="'.$item['icono'].'"></td>
			

			<td><a class="btn separar" href="index.php?action=EditarMarca&id='.$item["idMarca"].'"><i class="material-icons" >create</i></a>
			<a class="btn " href="index.php?action=caracteristicas&idBorrarMarca='.$item["idMarca"].'"><i class="material-icons" >delete</i> </a></td>
					
		</tr>';
	
	} 
	}


	#Captura de Datos para modificar Marca
	#------------------------------------------	
	public function EditarCategoriaPrincipal(){
		$rutaGeneral = "http://localhost/ProyectoE-commerceEquipo1/administrador/";
	$info= $_GET["id"];
	
	$respuesta = Datos::EditarCategoriasEstaEnCRUD($info, "categorias" );
	//echo $respuesta[0];

	//idMarca`, `Nombre`, `Proveedor`, `Descripcion`, `icono

	echo '<div class="col s12 m12 l10">
					<div class="input-field col s12">
						<input type="hidden"  id="idMarca" value="'.$respuesta["idCategorias"].'" name="nameIDCategoria" class="validate" required>
						
					</div>



					<div class="col s12 m12 l6">
					<br><br>
					<div class="input-field col s12">
						<input type="text"  id="idNombreMarca" value="'.$respuesta["Nombres"].'" name="nameCategoria" class="validate" required>
						<label for="idNombreMarca" >Nombre de la Marca</label>
					</div>

					<div class="input-field col s12">
						<input type="text" value="'.$respuesta["Descripcion"].'" id="idDescripcionCategoria" name="nameDescripcionCate" class="validate" required>
						<label for="idDescripcionCategoria" >Descripción</label>
					</div>

					
					</div>


					
				<div class="col s12 m12 l6">
				<div class="col s12 imagenes">
            <div class="col s3 ">
             <input type="file"  name="nameImgCategoria" onchange="openFileM(event)"><br>
              <img id="outputM" src="'.$respuesta["icono"].'">
               <input type="hidden" name="imgMaraRespaldo" value="'.$respuesta["icono"].'">
            </div>
            </div>
            </div>
            	<div class="col s12">
    			<button class="btn green boton_enviar" type="submit">Actualizr</button>
    			</div>
            ';

	}


	#Ahora si Modificar Categoria
	#------------------------------------------	
	public function ActualizarCategorias(){
	

		if (isset($_POST["nameCategoria"])) {

			if (empty($_FILES["nameImgCategoria"]["tmp_name"])) {

				$RutaCategoria = $_POST["imgMaraRespaldo"];
					
			}else  {


				$imagen = $_FILES["nameImgCategoria"]["tmp_name"];
				$imagenCategoria = $_FILES['nameImgCategoria']['name'];
				$RutaCategoria = "vistas/imgAdmin/imgCategorias/".$imagenCategoria;
				move_uploaded_file($imagen, $RutaCategoria);


			} 
			
			echo $RutaMarca;
			
				 $DatosControlador = array (

				 	
				 	"idCategoria"=> $_POST["nameIDCategoria"],
				 	"NombreCate"=> $_POST["nameCategoria"],
				 	"nombreDescriCate"=> $_POST["nameDescripcionCate"],
				 	"ImgRuta"=> $RutaCategoria

				 	
				 );

				var_dump($DatosControlador);
				$respuesta = Datos::ActualizarCategoriasCRUD($DatosControlador, "categorias");
				echo $respuesta;

				if ($respuesta=="success") {
				 header("location:index.php?action=categorias");
				}else{
				 echo "error";
				}
		}
	}

	#Captura de Datos para modificar Marca
	#------------------------------------------	
	public function EditarMarcaPrincipal(){
		$rutaGeneral = "http://localhost/ProyectoE-commerceEquipo1/administrador/";
	$info= $_GET["id"];
	
	$respuesta = Datos::EditarMarcaEstaEnCRUD($info, "marca" );
	//echo $respuesta[0];

	//idMarca`, `Nombre`, `Proveedor`, `Descripcion`, `icono

	echo '<div class="col s12 m12 l10">
					<div class="input-field col s12">
						<input type="hidden"  id="idMarca" value="'.$respuesta["idMarca"].'" name="nameIDMarca" class="validate" required>
						
					</div>

					<div class="col s12 m12 l6">
					<div class="input-field col s12">
						<input type="text"  id="idNombreMarca" value="'.$respuesta["Nombre"].'" name="nameMarca" class="validate" required>
						<label for="idNombreMarca" >Nombre de la Marca</label>
					</div>

					<div class="input-field col s12">
						<input type="text" value="'.$respuesta["Descripcion"].'" id="idDescripcionMarca" name="nameDescripcion" class="validate" required>
						<label for="idDescripcionMarca" >Descripción</label>
					</div>

					<div class="input-field col s12">
						<input type="text" value="'.$respuesta["Proveedor"].'"  id="idProveedorMarca" name="nameProveedor" class="validate" required>
						<label for="idProveedorMarca" >Proveedor</label>
					</div>
					</div>
					
				<div class="col s12 m12 l6">
				<div class="col s12 imagenes">
            <div class="col s3 ">
             <input type="file"  name="imagenMarca" onchange="openFileM(event)"><br>
              <img id="outputM" src="'.$respuesta["icono"].'">
               <input type="hidden" name="imgMaraRespaldo" value="'.$respuesta["icono"].'">
            </div>
            </div>
            </div>
            	<div class="col s12">
    			<button class="btn green boton_enviar" type="submit">Actualizr</button>
    			</div>
            ';

	}


	#Ahora si Modificar marcar
	#------------------------------------------	
	public function ActualizarMarcas(){
	

		if (isset($_POST["nameMarca"])) {

			if (empty($_FILES["imagenMarca"]["tmp_name"])) {

				$RutaMarca = $_POST["imgMaraRespaldo"];
					
			}else  {


				$imagen = $_FILES["imagenMarca"]["tmp_name"];
				$imagenMarca = $_FILES['imagenMarca']['name'];
				$RutaMarca = "vistas/imgAdmin/imgAdministrador/imgPantalones/".$imagenMarca;
				move_uploaded_file($imagen, $RutaMarca);

			} 
			
			
			echo $RutaMarca;
			
				 $DatosControlador = array (

				 	
				 	"idMarca"=> $_POST["nameIDMarca"],
				 	"NombreMarca"=> $_POST["nameMarca"],
				 	"nombreDescripcion"=> $_POST["nameDescripcion"],
				 	"nombreProveedor"=> $_POST["nameProveedor"],
				 	"ImgRuta"=> $RutaMarca

				 	
				 );

				var_dump($DatosControlador);
				$respuesta = Datos::ActualizarMarcasCRUD($DatosControlador, "marca");
				echo $respuesta;

				if ($respuesta=="success") {
				 header("location:index.php?action=caracteristicas");
				}else{
				 echo "error";
				}
		}
	}



	#Eliminar Conuslta para eliminar MARCA
		#--------------------------------------------------------------------------
		
		static public function BorrarMarca(){

			try {
    			if (isset($_GET["idBorrarMarca"])) {
					$DatosControlador =$_GET["idBorrarMarca"];
					$respuesta = Datos::BorrarMarcaCrud($DatosControlador, "marca");

					if ($respuesta =="success") {
						header("location:index.php?action=caracteristicas");
					}
				}
			} catch (Throwable $e) {
			   echo '
			   	<script>
			   		alert("La marca no se puede eliminar en estos momentos ya que esta siendo utilizada por algun producto");
			   		setTimeout(function () {
					        window.location.href = "index.php?action=caracteristicas";
					}, 500);
			   	</script>
			   ';
			  
			}
	}


		#visulizar ventas Online
	#-------------------------------------------------------

	static public function visualizarventaGralPrincipal(){

		if (isset($_POST["nameCodigo"])) {
			//echo $_POST["nameCodigo"];

			$info= $_POST["nameCodigo"];

				
			$respuesta = Datos::VentaSalidaCRUD($info, "productos");

				if ($respuesta != "error") {
				if ($respuesta["Cantidad"] > 0) {
					
					
					$d=$respuesta["Nombres"];
					

					echo '
						

						<div  class="input-field col s12">
									<input  hidden type="text" value="'.$respuesta["idProductos"].'" id="idProductoP" name="nameidProductoSalida">

						<div class=" row col s12 m6" >
							<div class="input-field col s12">
									<input  Disabled type="text" value="'.$respuesta["Nombre"].'" id="" class="" >

									<input type="hidden" name="nameMarcaSalida" value="'.$respuesta["idMarca"].'"  id="idMarcaP" class="validate" required>
									<label for="idMarca" >Marca</label>
								</div>
							

				  		    <div class="input-field col s12">
				  		    	<input  Disabled type="text" value="'.$respuesta["Nombres"].'" id="" class="" >
						    	<input type="hidden" name="nameCategoriaSalida" value="'.$respuesta["idCategorias"].'" id="idCategoriaP" class="validate" required>
								<label for="idCategoria" >Categoria</label>
							</div>


				  			<div class="input-field col s12 ">
								<input  type="text" name="nameTallaSalida" hidden value="'.$respuesta["Talla"].'" id="idTallaP" class="validate" required>

								<input Disabled type="text"  value="'.$respuesta["Talla"].'" class="validate" required>
								<label for="idTalla" >Talla</label>
							</div>

							<div class="input-field col s12 m6 ">

								<input type="number" hidden name="namePrecioSalida" value="'.$respuesta["Precio"].'"  id="idPrecioP" class="validate" required>

								<input Disabled type="number"  value="'.$respuesta["Precio"].'"   class="validate" required>
								<label for="idPrecio" >Precio Por Producto</label>
							</div>
							
				  		    <div class="input-field col s12 m6">

				  		    <select name="CantidadP" id="CantidadP"  class="validate" required>
			                  ';

			                  if ($respuesta["Cantidad"]>5) {
			                  			# code...
			                  		
			                  	for ($i=1; $i <= 5; $i++) { 
			                  		
			                        echo ' 
			                          <option value="'.$i.'">'.$i.'</option>
			                        ';
			                    }
			                   
			                }else{

			                    	for ($i=1; $i <= $respuesta["Cantidad"]; $i++) { 
			                  		
			                        echo ' 
			                          <option value="'.$i.'">'.$i.'</option>
			                        ';

			                    }
			                }

			                 echo ' 
			               </select> 
				    		<label for="idPrecio" >Cantidad</label>
					  		</div>

						</div>

					
				    
				      <div class="col s1"></div>

				      <div class="claseImagenPrincipal imagenes col s5">
				      
				             <input hidden type="text" name="nameFotoRuta" value="'.$respuesta["FotoFrontal"].'"  id="idFotoP" class="validate" required>
				              <img  src="'.$respuesta["FotoFrontal"].'">



				      </div>
				  			

				        <div class="row col s12">

				      

				         <div class="input-field col s12 m4 ">
				    		<input type="submit" id="nuevoProducto"class="btn" value="Nuevo Producto">
				    		</div>
				        


				  		  <div class="input-field col s12 m4 ">
				    			<input type="button" id=""class="btn green ConfirmarVenta" value="Confirmar Venta">
				    		</div>

				        </div>
				       
				       <style>
					       .divContenedor{
					       		display:none;
					       }
					       .ocultar{
					       		display:none;
					       }
				       </style>

					';
				}else{
					echo '
						<script>
						
						alert("PRODUCTO SIN EXISTENCIA");
						</script>
					';

				}
				} else {

					echo '
						<script>
						
						alert("PRODUCTO NO ÉXISTE EN EL SISTEMA");
						</script>
					';
				}				
		
		}


	}

	#para insertar productos temporal de las ventas
	#---------------------------------------------------------
	static public function insetarTemporalPrincipal($capturaDatos){
		
		

			$info=$capturaDatos["IdProd"];
			$Cantidad=$capturaDatos["Precio"];
		
			include_once "../modelos/crud.php";
			$DatosProducto = Datos::TempVentaSalidaCRUD("productos",$info);	
			echo $DatosProducto;	
			
			//para tener la fecha actual
			$fechaActual =date("d")."-".date("m")."-".date("y");

			 $idProducto = $DatosProducto["idProductos"];
		 	 $titulo = $DatosProducto["Titulo"];
			 $marca = $DatosProducto["Nombre"];
			 $idCategorias=$DatosProducto["Nombres"];
			 $talla=$DatosProducto["Talla"];
			 $precio=$DatosProducto["Precio"];
			 $precioProveedor=$DatosProducto["PrecioProveedor"];
		     $idProductos= $DatosProducto["idProductos"];
			  $precioTotal=$Cantidad*$precio;


			 //"CantidadSalida" => $Cantidad,
		 $cadenaControllernew = array (
		 	"idProductoSalida" => $idProducto,
		 	 "TituloSalida" => $titulo,
		 	 "MarcaSalida" => $marca,
		 	 "CategoriaSalida" => $idCategorias,
		 	 "TallaSalida" => $talla,
		 	 "PrecioSalida" => $precio,
		 	 "precioProveedor" => $precioProveedor,
		    "CantidadSalida" => $Cantidad,
		    "fecha" => $fechaActual,
		    "CantidadTotal" => $precioTotal

		 );

		 

		
		 $registrarDato = new Datos();
	            $registrarDato -> InsertarTemporalCRUD($cadenaControllernew, "ventalocal");
		

		return 	$registrarDato;



	
	}

	static public function ventaPrincipal(){


		if (isset($_POST["nameCodigo"])) {
			echo $_POST["nameCodigo"];

				$info= $_POST["nameCodigo"];

					
					$respuesta = Datos::VentaSalidaCRUD($info, "productos");
					
					
				
			}

 	}

 	static public function insertarGralPrincipal(){

 		if (isset($_POST["nameidProductoSalida"])) {
 			echo '

 			<script>
 				var URLActual = window.location.href;
 				window.location =URLActual;
 			</script>
 			
 		';
 		} else {
 			# code...
 		}
 		
 		
 	}

 	

	#visulizar Usuario registrados
	#-------------------------------------------------------

	static public function visualizarResumenCompraPrincipal(){

			$respuesta = Datos::visualizarTablaTemporalCRUD("ventalocal");
			
			
			#var_dump($respuesta);
			foreach ($respuesta as $row => $item) {
				$idVenta = $item['idVenta'];
			 
			echo '
		<tr >

			<td>'.$item['idVenta'].'</td>
			<td>'.$item['Titulo'].'</td>
			<td>'.$item['marca'].'</td>
			<td>'.$item['categoria'].'</td>
			<td>'.$item['talla'].'</td>
			<td>'.$item['cantidad'].'</td>
			<td>'.$item['precio'].'</td>
			
			<td>'.$item['cantidadTotal'].'</td>
			<td><a href="index.php?action=confirmarVenta&idVenta='.$idVenta.'" class="btn" ><i class="material-icons" style="font-size: 25px;">delete_forever</i></a></td>
			
			
		
		</tr>';

	} 

	}

	#consulta count (*)
	#-------------------------------------------------------

	     static public function visualizarTotalRegistros(){

			$catidadPro = Datos::visualizarTablaTemporalCOUNT_CRUD("ventalocal");
			
	
				
			 
			echo '

			<div class="col s3 m1">
					<p class="TextoLetra">'.$catidadPro[0].'</p>
				</div>
				';

		
	}


	#consulta count (*) Venta Fisicas
	#-------------------------------------------------------

	     static public function visualizarClientesTotales(){

			$cOUNT = Datos::visualizarTablaTemporalCOUNT_CRUD("com_fisica_new");
			
			#var_dump($respuesta);
			foreach ($cOUNT as $row => $item2) {
				
			 
			echo '

			
					'.$item2['cantidadTotal'].'
				
				';

		} 
	}


	#consulta PARA SUMAR
	#-------------------------------------------------------

	static public function visualizarSUMARregistros(){

			$sum = Datos::visualizarTablaTemporalSUM_CRUD("ventalocal");
			//var_dump($sum);
			echo '
				
				 <div class="col s3 m3">
					<p class="TextoLetra">$'.$sum[0].'.00</p>
				</div>

				
				';
	}

	#consulta PARA SUMAR la ventas fisicas
	#-------------------------------------------------------

	static public function visualizarSUMAR_Ventas(){

			$sum = Datos::sumarVentasFisicas_CRUD("com_fisica_new");
			//var_dump($sum);
			echo '
				 
					$'.$sum[0].'.00
					
				';
	}


	#consulta PARA SUMAR para las GANCIAS
	#-------------------------------------------------------

	static public function Ganancias_fiscas_principal(){

			$sum = Datos::sumarGANANCIIAS_CRUD("com_fisica_new");
			//var_dump($sum);
			echo '
				 
					$'.$sum[0].'.00
					
				';
	}

		#consulta PARA SACAR la ganacia tienda Fisica
	#-------------------------------------------------------

	static public function visualizar_Ganancias(){

			$sum = Datos::sumarVentasFisicas_CRUD("com_fisica_new");
			//var_dump($sum);
			$VentasTotal=$sum[0];

		$sumProveedor = Datos::sumarProveedor_CRUD("com_fisica_new");
		
		$ProveedorTotal=$sumProveedor[0];

		$resultado=$VentasTotal-$ProveedorTotal;
			echo '
				 
					$'.$resultado.'.00
					
				';
 
	}


		#para eliminar los registros
	#-------------------------------------------------------

	static public function CancelarCompraPrincipal(){

		
			$respuesta = Datos::DELETE_tablaTemporal_CRUD("ventalocal");

			if ($respuesta == "success") {
				echo '
						<script>
						
						alert("VENTA CANCELADA");
						
 						window.location ="index.php?action=salidaProducto";
						</script>
					';
			}

			

	}


		#para eliminar los registros
	#-------------------------------------------------------

	static public function eliminarProductosLocalCo($dato){
			$respuesta = Datos::eliminarProductosLocal_CRUD("ventalocal", $dato);
			echo '
			   	<script>
			   		window.location.href = "index.php?action=confirmarVenta";
			   	</script>
			';
	}



		#para eliminar los registros y pasarlo a la otra tabla
	#-------------------------------------------------------

	static public function FinalizarPrincipal(){

	
		 $respuesta1 = Datos::Respaldo_CRUD("ventalocal");
		 //var_dump($respuesta1);

		 if ($respuesta1 == "success") {

		 	$respuesta2 = Datos::obtenerProductos("ventalocal");
		 	foreach ($respuesta2 as $key => $value) {
		 		$idProductos = $value["idProducto"];
		 		$cantidad = $value["cantidad"];
		 		$respuesta3 = Datos::descontarProductos("productos", $idProductos, $cantidad);
		 	}

		 		 $respuesta4 = Datos::DELETE_tablaTemporal_CRUD("ventalocal");
		 		 	echo '
		 		 		<script>
						
		 		 		alert("VENTA EXITOSA");
						
 	 		 			window.location ="index.php?action=salidaProducto";
		 		 		</script>
		 		 ';
		}
	}


	#visulizar RESUMEN de la venta
	#-------------------------------------------------------

	static public function CambioCompra_Principal(){

			
			
		

			
			// $total=$capturaDatos2["TotalPro"];
			// $pago=$capturaDatos2["Pago"];
		
			// include_once "../modelos/crud.php";
			$respuesta = Datos::visualizarTablaTemporalSUM_CRUD("ventalocal");
				
			 
			echo '
	

			
			<div class="input-field col s12">
						<input type="number" name="Total" value="'.$respuesta[0].'" id="idTotal" class="validate" required>
						<label for="idTotal" >Total</label>
				</div>

				<div class="input-field col s12">
						<input type="number"  id="idPago" class="validate" required>
						<label for="idPago" >Pago</label>
				</div>
					
				<div class="input-field col s12">
						<input type="number" value=""  id="idCambio" class="validate"  required>
						<label for="idCambio" >Cambio</label>
				</div>

				<div class="col s4"></div>
						<div>
						<input type="submit" value="Aceptar"  id="envio" class="btn green "  >
						
    					</div>
    					
    					<div style="margin-top:10px;">
    					<div class="col s5"></div>
    					<a  id="btnFinalizar" href="index.php?action=salidaProducto"  >Regresar</a>
    					</div>
		';



	}









		#visulizar la tabla consulta SELECT administrador
	#-------------------------------------------------------

	public function visualizarAdminController(){

		$respuesta = Datos::visualizarAdminCRUD("administrador");

		foreach ($respuesta as $row => $item) {	
			echo '
			<tr >
				<td>'.$item['Nombre'].' '.$item['Apellidos'].'</td>
				<td>'.$item['Dirreccion'].'</td>
				<td>'.$item['Telefono'].'</td>
				<td>
					<a class="btn separar" href="index.php?action=editarAdmin&id='.$item["idAdministrador"].'"><i class="material-icons" >create</i>
					</a>
					<a class="btn separar" href="index.php?action=admin&idBorrarA='.$item["idAdministrador"].'"><i class="material-icons" >delete</i>
					</a>
					
				</td>
			</tr>';
		} 

	}

	#Eliminar Productos id
		#--------------------------------------------------------------------------
	static public function BorrarAdminController(){
		if (isset($_GET["idBorrarA"])) {
			$DatosControlador =$_GET["idBorrarA"];
			$respuesta = Datos::BorrarAdminCrud($DatosControlador, "administrador");

			if ($respuesta =="success") {
				header("location:index.php?action=admin");
			}
		}
	}

	#Registro de admin nombre
	#---------------------------------------------
	public function registroAdmin(){
		if (isset($_POST["nombre"])) {

			$cadenaController = array (
				"nombre" => $_POST["nombre"],
				"apellidos"=> $_POST["apellidos"],
				"direcion"=> $_POST["direcion"],
				"contrasena"=> $_POST["contrasena"],
				"telefono"=> $_POST["telefono"]
			);

			$registrar = new Datos();
			$registrar -> registrarAdminCRUD($cadenaController, "administrador");

			if ($respuesta="success") {
				echo '
				<script>alert("Agregado");<script>
				';
				header("location:index.php?action=admin");	
			}else{
				echo '
				<script>alert("Algo fallo");<script>
				';
				header("location:index.php?action=agregarUser");	
			}
		}	
	}

	#actualizar de admin nombre
	#---------------------------------------------
	public function EditarAdmin(){
		if (isset($_GET["id"])) {

			$cadenaController = array (
				"id" => $_GET["id"],
				"nombre" => $_POST["nombre"],
				"apellidos"=> $_POST["apellidos"],
				"direcion"=> $_POST["direcion"],
				"contrasena"=> $_POST["contrasena"],
				"telefono"=> $_POST["telefono"]
			);

			$registrar = new Datos();
			$registrar -> editarAdminCRUD($cadenaController, "administrador");

			if ($respuesta="success") {
				echo '
				<script>alert("Editado");<script>
				';
				header("location:index.php?action=admin");	
			}else{
				echo '
				<script>alert("Algo fallo");<script>
				';
				header("location:index.php?action=agregarUser");	
			}
		}	
	}

	public function visualizarEditarAdminController(){
		$info= $_GET["id"];
		$respuesta = Datos::visualizarEditarAdminCRUD($info, "administrador");
		
			echo '
				<div class="input-field col s8 m6 l4 ">
		              <input type="text"  id="nombre" name="nombre" class="validate"  value="'.$respuesta ["Nombre"].'" required>
		              <label for="nombre" >Nombre: </label>
		        </div>

		        <div class="input-field col s8 m6 l4">
		              <input type="text"  id="apellidos" name="apellidos" class="validate" value="'.$respuesta ["Apellidos"].'" required>
		              <label for="apellidos" >Apellidos: </label>
		        </div>

		        <div class="input-field col s8 m6 l4">
		          <input type="text"  id="direcion" name="direcion" class="validate" value="'.$respuesta ["Dirreccion"].'" required>
		          <label for="direcion" >Dirección: </label>
		        </div>
		          
		        <div class="input-field col s8 m6 l4">
		          <input type="password"  id="contrasena" name="contrasena" class="validate" value="'.$respuesta ["Contrasena"].'" required>
		          <label for="contrasena" >Contraseña: </label>
		        </div>   

		        <div class="input-field col s8 m6 l4">
		          <input type="tel"  id="telefono" name="telefono" class="validate" value="'.$respuesta ["Telefono"].'" required>
		          <label for="telefono" >Teléfono: </label>
		        </div>    
		     
		        <div class="col s12 m12"></div>

		          <div class="input-field col s4 m4 ">
		            <button class="btn green" type="submit" name="envio">enviar</button>
		          </div>
			';

	}





}//no se eliminar es la de la clase



































#aqui va con ajax1
#--------------------------------------------------------------------

if (isset($_POST['functions']) && !empty($_POST['functions'])) {

	$funcion=$_POST['functions'];

	$contenedor = new ControladorPlantilla();

		if ($funcion=='addVentaTemporal') {
			
			$CapDatos = $_POST['Datos'];
			$contenedor->insetarTemporalPrincipal($CapDatos);
			//var_dump($CapDatos);
			

		} 
}//cierra ajax 1

	

	#aqui va con ajax2
#--------------------------------------------------------------------

// if (isset($_POST['accion']) && !empty($_POST['accion'])) {

// 	$funcion=$_POST['accion'];

// 	$contenedor = new ControladorPlantilla();

// 		if ($funcion=='VentaFinalizar') {
// 			$CapDatos = $_POST['DatosDeAjax'];
// 			$contenedor->CambioCompra_Principal($CapDatos);
// 			//var_dump($CapDatos);
			

// 		} 
// }//cierra ajax 2
 
