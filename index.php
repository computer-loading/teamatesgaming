<!DOCTYPE html>
<html lang="fr">
	<?php 
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=teamatesgaming;charset=utf8', 'root', '');
		}
		catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	?>
	<head>
		<title>Comptabilité</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>

	<body>
		<header>
			
		</header>
		
		<main>
			<!-- Formulaire en une partie par content type (line up, lan, cout) -->
			<form method="post" action="input.php">
				<legend>Lan</legend>
				<select class="form-control" name="lineups">
					<?php 
						$lineups = $bdd->query('SELECT Id, nom FROM lineup');
						while ($lineup = $lineups->fetch()) 
							{
					?>
					
					<?php
						}
						$lineups->closeCursor();
					?>
				</select>
			</form>
		</main>

		<footer>
			
		</footer>
	</body> 
</html>