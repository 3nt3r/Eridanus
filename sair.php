<?php

	session_start();

	if ($_SESSION['id']) {
		include 'controleDeLog.php';
		inserirLog("O usuário saiu do sistema.");
	}

	$_SESSION = array();
	session_destroy();
	header("Location: index.php");

?>
