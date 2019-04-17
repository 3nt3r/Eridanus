<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

	<title>Email - Eridanus</title>

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
	$assunto = htmlspecialchars($_POST['assunto']);
	$mensagem = htmlspecialchars($_POST['mensagem']);
	$verificador = 0;

	if (isset($_POST['btn-enviar'])){

		if(preg_match('([A-Za-z])', $nome)){
			$verificador++;
		} else{
			echo "<p class='erro-email'>Nome inválido!</p>";
		}

		if(preg_match('([A-Za-z0-9])', $assunto)){
			$verificador++;
		}else{
			echo "<p class='erro-email'>Assunto inválido!</p>";
		}

		if(preg_match('^[_.a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^', $email)){
			$verificador++;
		} else{
			echo "<p class='erro-email'>Email inválido!</p>";
		}

		if ($verificador == 3){
			mail("calistosoftwares@gmail.com", "Assunto: ".$assunto.", ".$nome, $mensagem, $email);

			?>

  				<div class="row">
    				<div class="col s12 m12 l12 divp-email">
      					<div class="card light-green accent-4">
        					<div class="card-content white-text">
          						<span class="card-title flow-text">Email enviado com sucesso!</span>
          						<p>Assim que possível, vamos analisar sua mensagem e responder o mais rápido possível!</p>
        					</div>
        					<div class="card-action">
          						<a href="index.php"><span class="flow-text cor-span">Voltar ao início</span></a>
          						<a href="contato.php"><span class="flow-text cor-span">Enviar outro email</span></a>
       	 					</div>
      					</div>
   		 			</div>
  				</div>

  		<?php

		}else{
			?>

			<p class='erro-email'>Email não enviado! Por favor, tente mais tarde!</p>
			<center>
				<a class="btn-floating btn-large light-green accent-4 pulse" href="contato.php">
					<i class="material-icons">arrow_back</i>
				</a>
			</center>

			<br><br>

			<?php
		}

	}else{
		?>

		<script> 
			alert('Preencha todos os campos!'); window.location.href = 'contato.php'; 
		</script>

		<?php
	}

?>


<?php

	include "rodape.php";

?>

</body>
</html>
