<!DOCTYPE html>
<html>
<head>

	<title>Faça Login - Eridanus</title>

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
	 <h3 class=" teat-text titulo-pagina" style="margin-left: 17%; text-align: left;">Acesse a sua Conta!</h3>
<br>

<div class="col m1 l2"></div>
	<form class="col s12 m9 l8" action="autentica.php" method="post">



    <div class="row">
    	<div class="input-field col s12">
          <input id="email-entrar" <?php if(isset($_GET['email'])){$e = $_GET['email'];echo "value='$e'";}?> name="email-entrar" type="email" class="validate">
          <label for="email">Email:</label>
        </div>
    </div>



    <div class="row">
    	<div class="input-field col s12">
          <input id="senha-entrar" name="senha-entrar" type="password" class="validate">
          <label for="password">Senha:</label>
					<p class="erro" <?php session_start(); session_destroy(); if(isset($_GET['erro'])){echo" style='display: inline;'>"; if($_GET['erro'] == 1){echo "email e/ou senha incorreto(s)!";}else if($_GET['erro'] == 2){echo "Por favor preencha os dados!";}}else{echo">";} ?></p>
        </div>
    </div>


	<button class="btn light-green accent-4" type="submit" name="action">Entrar <i class="material-icons right">chevron_right</i> </button>

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
