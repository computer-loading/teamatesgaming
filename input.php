<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=teamatesgaming;charset=utf8', 'root', '')
	}
	
	catch (Exception $e) {
		die('Erreur: ' . $e->getMessage());
	}

//Nouvelle lan
if (isset($_POST['teams'])){
	$teams_results = ''
	foreach ($_POST['teams'] as $value) {
		$teams_results = $value.';'
	}
}
//Nouvelle line up
if (isset($_POST['new_team'])){
	
}
?>