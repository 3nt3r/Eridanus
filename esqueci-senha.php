<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>

	<title>Eridanus - Redefinir Senha</title>

  <script type="text/javascript" src="js/jquery.min.js"></script>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

<div class="row">
  <div class="col s3 m3 l3"></div>
  <div class="col s6 m6 l6">
    <div class="card-panel teal light-green accent-4">
      <center> 
        <span class="white-text titulo-partes-projeto"> Redefinir Senha! </span> 
      </center>
    </div>
  </div>
  <div class="col s3 m3 l3"></div>
</div>

<form action="emailRedefinicao.php" method="post">
  <div class="row">
    <div class="col m1 l3"> </div>
      <div class="input-field col s12 m10 l6">
         <input id="email" name="email" <?php if(isset($_GET["erro"]) && isset($_GET["email"])){ echo "value='".$_GET["email"]."'"; }?> type="email" class="validate">
         <label for="email">Email:</label>
         <p class="erro"><?php if(isset($_GET["erro"]) && isset($_GET["email"])){ echo "Email não cadastrado"; } ?></p>
         <br>
         <button style="margin-top: 20px; margin-bottom: 70px;" class="btn light-green accent-4" type="submit" name="button">Redefinir</button>
       </div>
     <div class="col m1 l3 "> </div>

  </div>
</form>

<?php

	include "rodape.php";

?>

</body>
</html>
