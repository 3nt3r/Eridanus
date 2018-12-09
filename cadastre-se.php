<!DOCTYPE html>
<html>
<head>

	<title>Cadastre-se - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

<br>
<br>


 <div class="row">
	 <h3 class=" teat-text" style="margin-left: 17%;">Cadastre-se</h3>
 <br>

	 <div class="col m1 l2"></div>
	  <form class="col s12 m9 l8" action="cadastra.php" method="post">
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" type="text" class="validate">
          <label for="first_name">Nome:</label>
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Sobrenome:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Senha:</label>
        </div>
        <div class="input-field col s12">
          <input id="password2" type="password" class="validate">
          <label for="password">Recoloque a Senha:</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate">
          <label for="email">Email:</label>
        </div>
      </div>
			<button class="btn light-green accent-4" type="submit" name="action">Enviar
	 <i class="material-icons right">send</i>
 </button>
    </form>
		 <div class="col m1 l2"></div>
  </div>
<br>
<br>


<?php

	include "rodape.php";

?>


</body>
</html>
