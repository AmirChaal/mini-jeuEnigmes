<?php
	require '../lib.php';
	require '../debut_html.php';
?>

<main class="enigme1">

    <form class="centrer" action="fin.php" method="POST">
        <p>_ _ _ _ _ E T T E</p> <br />
        <input type="text" name="mdp1" required>

        <p>_ _ _ E N C E</p> <br />
        <input type="text" name="mdp2" required>

        <p>? ? ?</p> <br />
        <input type="text" name="mdp3" required> <br /> <br />

        <input class="submit" type="submit" value="Continuer">
    </form>

    <a class="gauche" href="gg.php">
        <img src="../img/gauche.png" alt="">
    </a>

    <a class="droite" href="gd.php">
        <img src="../img/droite.png" alt="">
    </a>

    <?php
        require '../fin_html.php'
    ?>
</main>