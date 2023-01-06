<?php
    if ( (strtolower($_POST['mdp1']) == 'squelette') &&
    (strtolower($_POST['mdp2']) == 'silence') &&
    (strtolower($_POST['mdp3']) == 'toto1234') ) {
        require '../lib.php';
        $co = connexionBD();
        updateCheck($co, $_SESSION['equipe'], 3, 1);
        header("location: ../fin/fin.php");
        deconnexion();
    } else {
        header("location: gauche.php");
    };
?>