<?php

	function recuperationUnClient($unObjetPdo, $id){
		$sql = "SELECT * FROM CLIENT WHERE NOCLI=:pnocli";
		$ligne = $unObjetPdo->prepare($sql);
		$ligne->bindValue(':pnocli', $id, PDO::PARAM_INT);
		$ligne->execute();

		$unClient = $ligne->fetch(PDO::FETCH_OBJ);
		var_dump($unClient);
	}

	function afficheTousClients($unObjetPdo){
		$sql = "SELECT * FROM CLIENT";
		$lignes = $unObjetPdo->query($sql);

		$lignes->setFetchMode(PDO::FETCH_OBJ);

		while($unClient = $lignes->fetch()){
			echo "Numéro du client : " . $unClient->NOCLI . " Nom du client : " . $unClient->NOMCLI . " prenom : " . $unClient->PRENOMCLI . "<br>";
		}
	}


	function afficheTousClientsObjet($unObjetPdo){
		$tableauClients = recupPlusieursObjetsClient($unObjetPdo);
		echo "<p>Liste des clients : </p>";

		foreach ($tableauClients as $unObjetClient) {
			echo $unObjetClient->afficheUnClient() . "<br>";
		}
	}


	function recupUnObjetClient($unObjetPdo, $id){
		$sql = "SELECT * FROM CLIENT WHERE NOCLI=:pnocli";
		$ligne = $unObjetPdo->prepare($sql);
		$ligne->bindValue(':pnocli', $id, PDO::PARAM_INT);
		$ligne->execute();
		$unClient = $ligne->fetchObject('Client');
		var_dump($unClient);
		return $unClient;
	}

	function recupPlusieursObjetsClient($unObjetPdo){
		$sql = "select * from client";
		$lignes = $unObjetPdo->query($sql);

		if($lignes->rowCount() > 0){
			$tableauClients = $lignes->fetchAll(PDO::FETCH_CLASS, 'Client');
			return $tableauClients;
		}else{
			throw new Exception('Aucun client trouvé');
		}
	}
