<?php 

	$conexion=mysqli_connect('localhost','root','','pantalones');

	echo "hola";
		//$id=$_REQUEST['id'];
		

		$sql="INSERT INTO ventalocal( marca, categoria, talla, precio, cantidad) VALUES (1,1,1,1,1)";

	
			

			echo $result=mysqli_query($conexion,$sql);


				if ($result==1) {
					header("Location:index.php?action=salidaProducto");
				} else {
					echo "error";
				}
				
		

?>