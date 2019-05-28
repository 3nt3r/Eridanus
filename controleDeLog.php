<?php 

	function inserirLog($descricao){

		include "conexao.php";

		$data = date('d/m/y');
		$horario = date('H:i:s');
		$usuario = $_SESSION['id'];

		$inserir = "INSERT INTO controleLog (descricao, idUsuario, dataLog, horario) VALUES (?, ?, ?, ?)";
		$prepare = $banco->prepare($inserir);
		$prepare->bind_param("siss", $descricao, $usuario, $data, $horario);
		$prepare->execute();

	}

?>
