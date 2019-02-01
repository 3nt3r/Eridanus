<?php

include "conexao.php";

if(isset($_POST['email-entrar']) && isset($_POST['senha-entrar'])){
	$email = trim(htmlspecialchars($_POST['email-entrar']));
  	$senha = md5(trim(htmlspecialchars($_POST['senha-entrar'])));
	$verifica = 'select nome, email, senha from administrador where email = ? AND senha = ?';
	$prepare = $banco->prepare($verifica);
	$prepare->bind_param("ss", $email, $senha);
	$prepare->bind_result($nomeB, $emailB, $senhaB);
	$prepare->execute();
	$prepare->store_result();
	$prepare->fetch();
	if($email == $emailB && $senha == $senhaB){
		session_start();
		$_SESSION['email'] = $emailB;
		$_SESSION['senha'] = $senhaB;
		$_SESSION['nome'] = $nomeB;
		
		//header("Location: acesse-conta.php");
	}else{
			//header("Location: login.php?erro=1&email=$email");
	}
}else{
  //header("Location: login.php?erro=2");
}
?>
