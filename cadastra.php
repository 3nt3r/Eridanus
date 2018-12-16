<!DOCTYPE html>
<html>
<head>

	<title>xxxx - Eridanus</title>

	<?php 

		include "cabecalho.php";

	?>

</head>
<body>

<?php 

	include "menu.php";

 ?>


<?php 
/////////////////////////////////////////////////////////////////////////////

	$nome = htmlspecialchars($_POST['nome_cad']);
	$sobrenome = htmlspecialchars($_POST['sobrenome_cad']);
	$email = htmlspecialchars($_POST['email_cad']);
	$senha = htmlspecialchars($_POST['senha_cad']);
	$senhacomp = htmlspecialchars($_POST['senhacomp_cad']);

	if(!empty($nome) && !empty($sobrenome) && !empty($email) && !empty($senha) && !empty($senhacomp)){
		if($senha == $senhacomp){

			///////////////////////
			$banco = new mysqli('localhost', 'usuario_banco', 'senha_banco', 'nome_banco');
			///////////////////////
			if(mysqli_connect_errno()){
				?>
					<h3 class="titulo-pagina">Não foi possível a conexão com o banco de dados. Por favor, tente mais tarde!</h3>
				<?php
				exit;
			}

			$nome = strval($nome);
			$sobrenome = strval($sobrenome);
			$email = strval($email);
			$senha = strval($senha);





			$inserir = "INSERT INTO usuario (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)";

			$prepare = $banco->prepare($inserir);
			$prepare->bind_param("ssss", $nome, $sobrenome, $email, $senha);
			$prepare->execute();



			//////////////////////

		}else{
			?>
				<h3 class="titulo-pagina">As senhas não batem, tente novamente!</h3>
			<?php
			exit;
		}
	}else{
		?>
			<h3 class="titulo-pagina">Por favor, preencha todos os dados!</h3>
		<?php
		exit;
	}


/////////////////////////////////////////////////////////////////////////////
?>




<?php

	include "rodape.php";

?>


</body>
</html>
