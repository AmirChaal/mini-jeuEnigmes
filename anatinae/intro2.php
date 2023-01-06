<?php
	require '../lib.php';

	/* Register l'équipe et le tp dans la session */
	$_SESSION['equipe']=$_POST['equipe'];
	$_SESSION['tp']= $_POST['tp'];

	header('location: depart.php');
?>

