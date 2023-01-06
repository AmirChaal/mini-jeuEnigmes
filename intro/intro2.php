<?php
	require '../lib.php';
	require '../debut_html.php';
?>

<?php
	/* Register l'équipe et le tp dans la session */
	$_SESSION['equipe']=$_POST['equipe'];
	$_SESSION['tp']= $_POST['tp'];

	/* Equipe prise ? */
	$co=connexionBD();
	$result = equipePrise($co, $_SESSION['equipe']);
	if ($result > 0) {
		unset($_SESSION['equipe']);
		$_SESSION['warning'] = '<br /><p class="warning">Oops ! Cette équipe est déjà en jeu, veuillez choisir une autre équipe.</p>';
		header('location: index.php');
		exit();
	}


	/* Register l'équipe et le tp dans la database */
	$co=connexionBD();
	ajoutCompte($co, $_SESSION['equipe'], $_SESSION['tp']);
	deconnexionBD($co);

	echo
	'<form class="centrer" action="../enigme1/depart.php">
		<p>
			Bienvenue dans le labyrinthe, équipe '.$_SESSION['equipe'].' du TP '.$_SESSION['tp'].' !<br /><br />
			Dans cette application, vous serez plongé.es dans un jeu labyrinthique rempli d\'énigmes que vous devrez résoudre afin de progresser.
			Il y a trois labyrinthes différents, qu\'il va falloir parcourir en le moins de temps possible.<br /><br />
			en appuyant sur le bouton "CONTINUER", vous commencerez le premier labyrinthe, et le chrono se lancera ! <br /><br />

			Cliquez sur les flèches en bas de l\'écran pour descendre dans l\'arborescence web, et revenez à la page précédente pour remonter.<br /><br />

			Que l\'équipe la plus rapide gagne !<br /><br /><br />


			<input type="submit" value="CONTINUER"/>
		</p>
	</form>';

?>



<?php
    require '../fin_html.php'
?>
