<?php
if ( ($_POST['mdp1'] == '36') && ($_POST['mdp2'] == '43') ) {
    require '../lib.php';
    $co = connexionBD();
    updateCheck($co, $_SESSION['equipe'], 2, 1);
    header("location: fin2.php");
    deconnexion();
} else {
    header("location: gg.php");
};
?>