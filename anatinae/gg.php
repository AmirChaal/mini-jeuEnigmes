<?php
	require '../lib.php';
	require '../debut_html.php';
?>

<form class="centrer" action="fin.php" method="POST">
    <p>Entrez ici l'âge du père</p> <br />
    <input type="text" name="mdp1" required>

    <p>Entrez ici l'âge de la femme</p> <br />
    <input type="text" name="mdp2" required> <br /> <br />

    <input class="submit" type="submit" value="Continuer">
</form>

<?php
    require '../fin_html.php';
?>