<?php session_start();  

  if (isset($_SESSION['email_admin']) && isset($_SESSION['senha_admin'])){
    header("Location: painel-admin.php");
  }

?>

<!DOCTYPE html>
<html>
<head>

	<title>Administrador - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

<div class="row">
	 <h3 class=" teat-text titulo-pagina" style="margin-left: 18%; text-align: left;">Área do Administrador</h3>
<br>

<div class="col m1 l2"></div>


	<form class="col s12 m9 l8" action="autentica-admin.php" method="post" style="margin-bottom: 1.5em;">

    <div class="row">
    	<div class="input-field col s12">
          <input id="entrar_admin" name="email-entrar_admin" type="email" class="validate">
          <label for="email">E-mail:</label>
        </div>
    </div>

    <div class="row">
    	<div class="input-field col s12">
          <input id="entrar_admin" name="senha-entrar_admin" type="password" class="validate">
          <label for="password">Senha:</label>
        </div>
    </div>

	<button class="btn light-green accent-4" type="submit" name="action">Entrar <i class="material-icons right">chevron_right</i> </button>

  </form>


	<div class="col m1 l2"></div>
</div>

<?php

	include "rodape.php";

?>

</body>
</html>
