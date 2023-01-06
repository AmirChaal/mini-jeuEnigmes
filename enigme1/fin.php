<?php
if ( strtolower(($_POST['mdp1']) == 'retroduck') && (strtolower($_POST['mdp2']) == 'platyrhynchos') ) {
    require '../lib.php';
    $co = connexionBD();
    updateCheck($co, $_SESSION['equipe'], 1, 1);
    header("location: fin2.php");
    deconnexion();
} else {
    header("location: dg.php");
};
?>