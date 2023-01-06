<?php
	require '../lib.php';
	require '../debut_html.php';
?>

<form class="centrer" action="intro2.php" method="POST">
	<h1 >LABYRINTHE 2</h1>

	<hr /><br />

	<p>
		Attention : changer de nom d'équipe d'un labyrinthe à l'autre vous fera perdre votre progression et vous ne pourrez pas finir le jeu !
	</p>
	<br />
	<p>Choisis ton équipe</p><br />
	<select name="equipe" required>
		<option value="1">Équipe 1</option>
		<option value="2">Équipe 2</option>
		<option value="3">Équipe 3</option>
		<option value="4">Équipe 4</option>
	</select>

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
