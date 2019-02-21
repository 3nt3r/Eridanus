<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

	<title>Fale-Conosco - Eridanus</title>

<?php 

	include "cabecalho.php";

?>

</head>
<body>


<?php 

	include "menu.php";

?>

<p class="titulo-pagina flow-text">Preencha as informações corretamente!</p>

<div>

	<form action="email.php" method="post" id="form-contato">
		<div class="input-field col s6">
      <input id="last_name" type="text" class="validate" name="nome" required>
      <label for="last_name">Nome Completo</label>
    </div>
				
    <div class="input-field col s6">
      <input id="last_name" type="text" class="validate" name="assunto" required>
      <label for="last_name">Assunto do E-mail</label>
    </div>

		<div class="input-field col s6">
      <input id="last_name" type="email" class="validate" name="email" required>
      <label for="last_name">Seu Email</label>
    </div>
				
    <div class="input-field col s12">
      <textarea id="textarea1" class="materialize-textarea" name="mensagem" required></textarea>
      <label for="textarea1">Deixe-nos uma Mensagem</label>
    </div>

  <center>
    <button class="btn cor-btn" type="submit" name="btn-enviar">Enviar
      <i class="material-icons right">send</i>
    </button>

    <button class="btn cor-btn" type="reset" name="action">Limpar
      <i class="material-icons right">restore_from_trash</i>
    </button>
  </center> <br>
	</form>
  
</div>


<?php

	include "rodape.php";

?>


</body>
</html>
