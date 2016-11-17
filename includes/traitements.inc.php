<?php

	function recuperationUnClient($unObjetPdo, $id){
		$sql = "SELECT * FROM CLIENT WHERE NOCLI=:pnocli";
		$ligne = $unObjetPdo->prepare($sql);
		$ligne->bindValue(':pnocli', $id, PDO::PARAM_INT);
		$ligne->execute();

		$unClient = $ligne->fetch(PDO::FETCH_OBJ);
		var_dump($unClient);
	}

	function AfficheTousClients($unObjetPdo){
		$sql = "SELECT * FROM CLIENT";
		$lignes = $unObjetPdo->query($sql);

		$lignes->setFetchMode(PDO::FETCH_OBJ);

		while($unClient = $lignes->fetch()){
			echo "Numéro du client : " . $unClient->NOCLI . " Nom du client : " . $unClient->NOMCLI . " prenom : " . $unClient->PRENOMCLI . "<br>";
		}
	}