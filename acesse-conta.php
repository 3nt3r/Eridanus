<?php
	session_start();
	if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
		header("Location: login.php");
	}
 ?>

<!DOCTYPE html>
<html style="height: 100%;">
<head>

	<title>Painel de Controle - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body style="height: 100%;">

<?php

	include_once "menu-usuario.php";

?>

</body>
</html>
