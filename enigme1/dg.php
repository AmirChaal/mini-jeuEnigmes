<?php
	require '../lib.php';
	require '../debut_html.php';
?>

<form class="centrer" action="fin.php" method="POST">
    <p>Entrez le mot de passe à 9 lettres, commençant par "R" et finissant par "K"</p> <br />
    <input type="text" name="mdp1" required>

    <p>Entrez le mot de passe à 13 lettres, commençant par "P" et finissant par "S"</p> <br />
    <input type="text" name="mdp2" required> <br /> <br />

    <input class="submit" type="submit" value="Continuer">
</form>

<?php
    require '../fin_html.php'
?>