<?php
$banco = new mysqli('localhost', 'root', '', 'eridanus');
if(mysqli_connect_errno()){
	?>
		<h3 class="titulo-pagina">Não foi possível a conexão com o banco de dados. Por favor, tente mais tarde!</h3>
	<?php
	exit;
}
echo "teste";
if(isset($_POST['email-entrar']) && isset($_POST['senha-entrar'])){
	echo "teste";
	$email = trim(htmlspecialchars($_POST['email-entrar']));
  $senha = md5(trim(htmlspecialchars($_POST['senha-entrar'])));
	var_dump($senha);
	$verifica = 'select id,nome,email,senha from usuario where email = ? AND senha = ?';
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
		header("Location: acesse-conta.php");
	}else{
			header("Location: login.php?erro=1&email=$email");
	}
}else{
  header("Location: login.php?erro=2");
}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Autênticando...</title>

</head>
<body>

</body>
</html>
