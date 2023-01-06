<?php
    require 'admin/secret.php';
    session_start();

    $mabd = null;
    try {
        $mabd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=lab202;charset=UTF8;', UTILISATEUR, MDP);
        $mabd->query('SET NAMES utf8;');
    }catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    $req = 'UPDATE equipes SET equipe_start = 0, equipe_check1 = 0, equipe_check2 = 0, equipe_check3 = 0';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    $mabd=null;
?>