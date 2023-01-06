<?php
	require '../lib.php';
	require '../debut_html.php';
?>

<h1 >Qui êtes-vous ?</h1>
<hr />
<?php
	if (!empty($_SESSION['warning'])) {
		echo $_SESSION['warning'];
		unset($_SESSION['warning']);
	}
?>
<form class="centrer init" action="intro2.php" method="POST">
	<p>
		Veuillez choisir une équipe. Rappelez vous de votre numéro d'équipe, vous l'utiliserez de nouveau !
	</p>
	<br />
	<select name="equipe" required>
		<option value="1">Équipe 1</option>
		<option value="2">Équipe 2</option>
		<option value="3">Équipe 3</option>
		<option value="4">Équipe 4</option>
	</select><br /><br />

	<p>
		Groupe de TP
	</p>
	<br />
	<select name="tp" required>
		<option value="A">TP A</option>
		<option value="B">TP B</option>
		<option value="C">TP C</option>
		<option value="D">TP D</option>
		<option value="E">TP E</option>
		<option value="F">TP F</option>
		<option value="G">TP G</option>
		<option value="H">TP H</option>
	</select><br /><br />

	<input class="submit" type="submit" value="CONTINUER" /><br /><br />
</form>

<?php
    require '../fin_html.php'
?>