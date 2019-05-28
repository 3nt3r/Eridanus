<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

	<title>Reportar Erro - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

?>

<?php

	$nome = htmlspecialchars($_POST['nome']);
	$email = htmlspecialchars($_POST['email']);
	$erro = htmlspecialchars($_POST['erro']);
	$verificador = 0;

	if (isset($_POST['btn-enviar'])){

		if(preg_match('([A-Za-z])', $nome)){
			$verificador++;
		} else{
			echo "<p class='erro-email'>Nome inválido!</p>";
		}

		if(preg_match('^[_.a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^', $email)){
			$verificador++;
		} else{
			echo "<p class='erro-email'>E-mail inválido!</p>";
		}

		if(preg_match('([A-Za-z])', $erro)){
			$verificador++;
		} else{
			echo "<p class='erro-email'>Descrição de erro inválida!</p>";
		}		

		if ($verificador == 3){
			mail("calistosoftwares@gmail.com", "Assunto: Erro encontrado, Por: $nome", $erro, $email);

			?>

          	<script type="text/javascript">
          		alert("E-mail enviado com sucesso!");
          		window.location.href = 'index.php';
          	</script>

  		<?php

		}else{
			?>

			<p class='erro-email'>E-mail não enviado! Por favor, tente novamente mais tarde!</p>
			<center>
				<a class="btn-floating btn-large light-green accent-4 pulse" href="reportarerro.php">
					<i class="material-icons">arrow_back</i>
				</a>
			</center>

			<br><br>

			<?php
		}

	}else{
		?>

		<script> 
			alert('Preencha todos os campos!'); 
			window.location.href = 'reportarerro.php'; 
		</script>

		<?php
	}

?>

<?php

	include "rodape.php";

?>

</body>
</html>
