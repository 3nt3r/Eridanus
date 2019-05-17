<?php

  session_start();

?>

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

<center>
	<div id="aviso" class="esconde"></div>
</center>

<div class="row">
<div id="cadastro">

	 <h3 class=" teat-text titulo-pagina flow-text titulo-pagina-cadastre-se">Cadastre-se!</h3>

 <br>

	 <div class="col m1 l2"></div>
	  <form class="col s12 m9 l8" id="form" action="cadastra.php" method="post">

      <div class="row">
        <div class="input-field col s12 m6 l6">
          <input id="first_name" type="text" class="validate" name="nome_cad" required>
          <label for="first_name">Primeiro Nome:</label>
        </div>
        <div class="input-field col s12 m6 l6">
          <input id="last_name" type="text" class="validate" name="sobrenome_cad" required>
          <label for="last_name">Sobrenome:</label>
        </div>
      </div>

      <div class="row">
          <div class="input-field col s12 m6 l6">
            <input id="email" type="email" class="validate" name="email_cad" required>
            <label for="email">Email:</label>
  					<span class="erro" id="erroE"></span>
          </div>
          <div class="input-field col s12 m6 l6">
            <input id="cidade" type="text" class="validate" name="cidade_cad" required>
            <label for="cidade">Cidade:</label>
          </div>
    </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="senha_cad" required>
          <label for="password">Senha:</label>
					<span class="erro" id="erroS"></span>
        </div>
        <div class="input-field col s12">
          <input id="password2" type="password" class="validate" name="senhacomp_cad" required>
          <label for="password">Recoloque a Senha:</label>
					<span class="erro" id="erroSC"></span>
				</div>
      </div>

      <button class="btn light-green accent-4" id="btncad" type="submit" name="action">
        Criar Conta
        <i class="material-icons right">assignment_ind</i>
      </button>

      <a class="btn light-green accent-4" href="login.php">
        Fazer Login
        <i class="material-icons right">keyboard_arrow_right</i>
      </a>

 <div id="preloader">
  <div class="preloader-wrapper small active">
 	 <div class="spinner-layer spinner-blue">
 		 <div class="circle-clipper left">
 			 <div class="circle"></div>
 		 </div><div class="gap-patch">
 			 <div class="circle"></div>
 		 </div><div class="circle-clipper right">
 			 <div class="circle"></div>
 		 </div>
 	 </div>

 	 <div class="spinner-layer spinner-red">
 		 <div class="circle-clipper left">
 			 <div class="circle"></div>
 		 </div><div class="gap-patch">
 			 <div class="circle"></div>
 		 </div><div class="circle-clipper right">
 			 <div class="circle"></div>
 		 </div>
 	 </div>

 	 <div class="spinner-layer spinner-yellow">
 		 <div class="circle-clipper left">
 			 <div class="circle"></div>
 		 </div><div class="gap-patch">
 			 <div class="circle"></div>
 		 </div><div class="circle-clipper right">
 			 <div class="circle"></div>
 		 </div>
 	 </div>

 	 <div class="spinner-layer spinner-green">
 		 <div class="circle-clipper left">
 			 <div class="circle"></div>
 		 </div><div class="gap-patch">
 			 <div class="circle"></div>
 		 </div><div class="circle-clipper right">
 			 <div class="circle"></div>
 		 </div>
 	 </div>
  </div>
 </div>

</form>

<div class="col m1 l2"></div>

</div>
</div>

<br>
<br>

<?php

	include "rodape.php";

?>

</body>
</html>
