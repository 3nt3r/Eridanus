<?php

	$banco = new mysqli('localhost:3306', 'root', '', 'id8224055_eridanus');
	if(mysqli_connect_errno()){
		?>
			<h3 class="titulo-pagina">Não foi possível a conexão com o banco de dados. Por favor, tente mais tarde!</h3>
		<?php
		exit;
	}

?>
