<?php 


class Conexion{
	
	public function conectar()
	{
		$link= new PDO("mysql:host=localhost;dbname=pantalones",
						"root",
						"",
						array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,
								PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);

		return $link;
	}
}

// $run =new Conexion();
// $run -> conectar();

// var_dump($run);