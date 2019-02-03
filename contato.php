<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>

	<title>Fale-Conosco - Eridanus</title>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>

<?php 

	include "cabecalho.php";

?>

</head>
<body>


<?php 

	include "menu.php";

?>


<p class="titulo-pagina" style="margin: .2em 0em;">Preencha as informações corretamente!</p>


<div>
	<form action="email.php" method="post" id="form-contato">
		<div class="input-field col s6">
      <input id="last_name" type="text" class="validate" name="nome">
      <label for="last_name">Nome Completo</label>
    </div>
				
    <div class="input-field col s6">
      <input id="last_name" type="text" class="validate" name="assunto">
      <label for="last_name">Assunto do E-mail</label>
    </div>

		<div class="input-field col s6">
      <input id="last_name" type="email" class="validate" name="email">
      <label for="last_name">Seu Email</label>
    </div>
				
    <div class="input-field col s12">
      <textarea id="textarea1" class="materialize-textarea" name="mensagem"></textarea>
      <label for="textarea1">Deixe-nos uma Mensagem</label>
    </div>

  <center>
    <button class="btn waves-effect waves-light" type="submit" name="btn-enviar" style="background-color: #64DD17;">Enviar
      <i class="material-icons right">send</i>
    </button>

    <button class="btn waves-effect waves-light" type="reset" name="action" style="background-color: #64DD17;">Limpar
      <i class="material-icons right">cached</i>
    </button>
  </center> <br>
	</form>
</div>


<?php

	include "rodape.php";

?>


</body>
</html>
