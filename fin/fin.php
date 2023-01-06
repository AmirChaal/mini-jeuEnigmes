<?php
	require '../lib.php';
    $co = connexionBD();
    $result1 = Check($co, $_SESSION['equipe'], 1);
    $result2 = Check($co, $_SESSION['equipe'], 2);
    $result3 = Check($co, $_SESSION['equipe'], 3);
    deconnexionBD($co);

    if ($result1 == 0 || $result2 == 0 || $result3 == 0)
    {
        header("location: ../volans/fin.php");
    } else
    {
        require '../debut_html.php';

        $_SESSION['timeend'] = microtime(true);

        $co = connexionBD();

        $timestart = recupDebut($co, $_SESSION['equipe']);
        $time = $_SESSION['timeend'] - $timestart;

        registerScore($co, $_SESSION['equipe'], $time);

        afficherScore($co, $_SESSION['equipe']);
        resetStart($co, $_SESSION['equipe']);
        deconnexionBD($co);

        echo '<br /><br /><a href="../intro/index.php">Recommencer</a>';

        require '../fin_html.php';
    };
?>