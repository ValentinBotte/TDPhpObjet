<!DOCTYPE html>

<html>

	<head>
		<title>TDPhpObjet</title>
		<meta charset="utf-8">
	</head>


	<?php

		try{
			define('RACINE', __DIR__);
			include_once('config/conf.php');
			include_once(INCLUDE_CLASS. 'autoloader.php');

			AutoLoader::AutoLoad(INCLUDE_CLASS. "connexionBd");
			AutoLoader::AutoLoad(INCLUDE_CLASS. "client");


			include_once(INCLUDE_PATH. 'traitements.php');

			$conn = ConnexionBdd::connectionBd();

	?>

	<body>
			<div><?php recuperationUnClient($conn, 123); ?></div>
			<div><?php afficheTousClients($conn); ?></div>
			<div><?php $unClient = recupUnObjetClient($conn, 123); ?></div>
			<div><?php echo $unClient->afficheUnClient(); ?></div>
			<div><?php recupPlusieursObjetsClient($conn); ?></div>
			<div><?php afficheTousClientsObjet($conn); ?></div>

	</body>

	<?php 
		}catch(Exception $ex){
			echo $ex->getMessage();
		}
	?>

</html>