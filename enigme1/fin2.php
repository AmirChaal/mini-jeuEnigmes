<?php
	require '../lib.php';
    $co = connexionBD();
    $result = Check($co, $_SESSION['equipe'], 1);
    deconnexionBD($co);
    if ($result == 0) {
        header("location: fin.php");
    }
	require '../debut_html.php';
?>

<p class="centrer">
    BRAVO !<br /><br />
    Vous avez fini le premier labyrinthe !<br />Souvenez-vous du mot de passe ci-dessous, montrez-le au surveillant de la salle, il vous dirigera vers la salle suivante où vous pourrez commencer le deuxième labyrinthe.<br /><br />
    <button><a href="../anatinae/index.php">anatinae</a></button>
</p>

<?php
    require '../fin_html.php';
?>