<?php

class ConnexionBdd{

	const STR = "mysql:host=localhost;dbname=clicom";
	const USER = "root";
	const PASS = "";



	function connectionBd() {
		try{

			$options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			$options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";

			return new PDO(self::STR, self::USER, self::PASS,$options);

		}catch (PDOExceptionException $e){
			throw new Exception("Erreur à la connexion \n". $e->getMessage());
		}
	}

}

?>