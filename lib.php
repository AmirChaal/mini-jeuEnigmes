<?php
require '../admin/secret.php';
session_start();

function connexionBD(){
    $mabd = null;
    try {
        $mabd = new PDO('mysql:host=127.0.0.1;port=3306;dbname=lab202;charset=UTF8;', UTILISATEUR, MDP);
        $mabd->query('SET NAMES utf8;');
    }catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    return $mabd;
}

function deconnexionBD(&$mabd) {
    $mabd=null;
}

function updateCheck($mabd, $equipe, $check, $val)
{
    $req = 'UPDATE equipes SET equipe_check'.$check.' = "'.$val.'" WHERE equipe_id = '.$equipe.';';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
}

function Check($mabd, $equipe, $check)
{
    $req = 'SELECT equipe_check'.$check.' FROM equipes WHERE equipe_id = '.$equipe.';';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        $result = $value['equipe_check'.$check];
        return $result;
    }
}

function equipePrise($mabd, $equipe)
{
    $req = 'SELECT equipe_start FROM equipes WHERE equipe_id = '.$equipe.';';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        $result = $value['equipe_start'];
        return $result;
    }
}

function ajoutCompte($mabd, $equipe, $tp)
{
    $req = 'UPDATE equipes SET equipe_tp = "'.$tp.'" WHERE equipe_id = '.$equipe.';';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
}

function debut($mabd, $equipe, $start)
{
    $req = "SELECT equipe_start FROM equipes where equipe_id = $equipe";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    foreach ($resultat as $value)
    {
        if ($value['equipe_start'] == 0)
        {
            $req = 'UPDATE equipes SET equipe_start = "'.$start.'" WHERE equipe_id = '.$equipe.'';
            try {
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }

            $req = 'UPDATE equipes SET equipe_score = 0 WHERE equipe_id = '.$equipe.'';
            try {
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
        }
    }
    $req = 'UPDATE equipes SET equipe_check1 = 0 WHERE equipe_id = '.$equipe.'';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    $req = 'UPDATE equipes SET equipe_check2 = 0 WHERE equipe_id = '.$equipe.'';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    $req = 'UPDATE equipes SET equipe_check3 = 0 WHERE equipe_id = '.$equipe.'';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
}

function recupDebut($mabd, $equipe) {
    $req = "SELECT equipe_start FROM equipes where equipe_id = $equipe";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        return $value['equipe_start'];
    }
}

function registerScore ($mabd, $equipe, $time)
{
    $req = "SELECT equipe_score FROM equipes where equipe_id = $equipe";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }

    foreach ($resultat as $value)
    {
        if ($value['equipe_score'] == 0)
        {
            $req = 'UPDATE equipes SET equipe_score = '.$time.' WHERE equipe_id = '.$equipe.';';
            try {
                $resultat = $mabd->query($req);
            } catch (PDOException $e) {
                // s'il y a une erreur, on l'affiche
                echo '<p>Erreur : ' . $e->getMessage() . '</p>';
                die();
            }
        }
    }
}

function afficherScore($mabd, $equipe) {

    echo '<div class="centrer">';

    /* AFFICHER LE TABLEAU */

    $req = "SELECT equipe_id, equipe_score FROM equipes WHERE equipe_id = $equipe ";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<p class="bravo">Bravo, équipe '.$value['equipe_id'].'. Vous avez mis '.$value['equipe_score'].' secondes
        pour finir le jeu !</p><br /><br />';
    }


    /* AFFICHER LE TABLEAU */

    $req = "SELECT equipe_nom, equipe_score FROM equipes ORDER BY equipe_score ASC";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    echo '<table>'."\n";
    echo '<thead><th>Équipe</th><th>Score</th></thead>'."\n";
    echo '<tbody>'."\n";
    foreach ($resultat as $value) {
        echo '<tr>'."\n";
        echo '<td>'.$value['equipe_nom'].'</td>'."\n";
        echo '<td>'.$value['equipe_score'].' secondes</td>'."\n";
        echo '</tr>'."\n";
    }
    echo '</tbody>'."\n";
    echo '</table>'."\n";


    /* AFFICHER L'EQUIPE GAGNANTE */
    
    $req = "SELECT equipe_id, equipe_score FROM equipes ORDER BY equipe_score ASC LIMIT 1";
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
    foreach ($resultat as $value) {
        echo '<br /><br /><p>L\'équipe gagnante est l\'équipe '.$value['equipe_id'].' !</p>';
    }
    echo '</div>';
}

function resetStart($mabd, $equipe)
{
    $req = 'UPDATE equipes SET equipe_start = 0, equipe_check1 = 0, equipe_check2 = 0, equipe_check3 = 0 WHERE equipe_id = '.$equipe.'';
    try {
        $resultat = $mabd->query($req);
    } catch (PDOException $e) {
        // s'il y a une erreur, on l'affiche
        echo '<p>Erreur : ' . $e->getMessage() . '</p>';
        die();
    }
}