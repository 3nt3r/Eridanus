<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

	<title> Reportar Erro - Eridanus </title>

<?php 

	include "cabecalho.php";

?>

</head>
<body>


<?php 

	include "menu.php";

?>

<div class="container distancia-slider">
  <div class="row">
    <div class="col s3"></div>
        <div class="col s6">
            <h3 class=" teat-text titulo-pagina titulo-pagina-reportar"> Reportar Erro </h3>
        </div>
    <div class="col s3"></div>
  </div>
</div>

<div>

	<form action="emailReportarErro.php" method="post" id="form-contato">
		<div class="input-field col s6">
      <input id="last_name" type="text" class="validate" name="nome" required>
      <label for="last_name">Nome:</label>
    </div>
				
		<div class="input-field col s6">
      <input id="last_name" type="email" class="validate" name="email" required>
      <label for="last_name">Seu E-mail:</label>
    </div>
				
    <div class="input-field col s12">
      <textarea id="textarea1" class="materialize-textarea" name="erro" required></textarea>
      <label for="textarea1">Descrição do Erro:</label>
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
