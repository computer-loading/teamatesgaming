<script type="text/javascript" src="plotly.js" />
<script type="text/javascript">
	function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}
</script>

<?php 
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=teamatesgaming;charset=utf8', 'root', '');
	}
	catch (Exception $e) {
		die('Erreur: ' . $e->getMessage());
	}

	//Génerer chaque tableau et graphique, afficher en fct d'un formulaire
	$current_year = date('Y');
	$annuel = $bdd->query("SELECT * FROM couts ORDER BY date DESC ");

	$months = [];
	while ($cout = $annuel->fetch())
	{
		if ($cout['type'] == 'mensuel'){
			for ($i = 0; $i < 12; $i ++) {
				$months[$i] += $cout['prix'];
			};
		}
		else if(date_format($cout['date'], 'Y') == $current_year) {
			$months[intval(date_format($cout['date'], 'm'))] += $cout['prix'];
		}
?>

<div id="compta">
	<div id="graphique_annuel">
		
	</div>

	<div id="tableau_annuel">
		<table>
			<?php 
				foreach ($months as $key => $value) {
				
			?>
			<tr>
				<th>Mois</th>
				<th>Coût</th>
			</tr>
			<?php echo '<tr><td>'.$key.'</td><td>'.$value.'</td></tr>';
		}
		$annuel->closeCursor();
	?>
		</table>
	</div>
</div>

<script type="text/javascript">
	
	var curve = {
		x: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
		y: list(<?php echo $months;?>),
		name: '',
		type: 'scatter'
	};
	var year_div = document.getElementById('graphique_annuel');
	Plotly.plot(year_div, curve);
	
</script>