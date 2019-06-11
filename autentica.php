<?php

	include 'controleDeLog.php';
	include "conexao.php";
	session_start();
	if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
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
				$_SESSION['email'] = $emailB;
				$_SESSION['senha'] = $senhaB;
				$_SESSION['nome'] = $nomeB;
				$_SESSION['id'] = $idB;
				$banco->close();
				inserirLog("O usuário fez login.");
				header("Location: acesse-conta.php");
			}else{
				$banco->close();
				header("Location: login.php?erro=1&email=$email");
			}
		}else{
			$banco->close();
		  header("Location: login.php?erro=2");
		}
	}else{
		echo "
			<script type=\"text/javascript\">
				alert(\"Não é possivel fazer o login como administrador e usuario comum ao mesmo tempo!\");
				window.location = 'painel-admin.php';
			</script>
		";
	}
?>
