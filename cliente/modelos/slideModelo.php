<?php

	require_once "conexion.php";

	class slideModelo extends Conexion{

		static public function mostrarSlideModelo($tabla){
			$conexion =new Conexion();
			$stmt = $conexion->conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt -> null;
			
		}

	}

?>