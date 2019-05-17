<?php

	include "conexao.php";

	if(isset($_POST['email-entrar']) && isset($_POST['senha-entrar'])){
		$email = trim(htmlspecialchars($_POST['email-entrar']));
	  $senha = md5(trim(htmlspecialchars($_POST['senha-entrar'])));
		$verifica = 'select id, nome, email, senha from usuario where email = ? AND senha = ?';
		$prepare = $banco->prepare($verifica);
		$prepare->bind_param("ss", $email, $senha);
		$prepare->bind_result($idB, $nomeB, $emailB, $senhaB);
		$prepare->execute();
		$prepare->store_result();
		$prepare->fetch();
		if($email == $emailB && $senha == $senhaB){
			session_start();
			$_SESSION['email'] = $emailB;
			$_SESSION['senha'] = $senhaB;
			$_SESSION['nome'] = $nomeB;
			$_SESSION['id'] = $idB;
			$banco->close();
			header("Location: acesse-conta.php");
		}else{
			$banco->close();
			header("Location: login.php?erro=1&email=$email");
		}
	}else{
		$banco->close();
	  header("Location: login.php?erro=2");
	}

?>
