<!DOCTYPE html>
<html>
<head>

	<title></title>

	<?php 

		include "cabecalho.php";

	?>

</head>
<body>

<?php 

	include "menu.php";

 ?>










  <div class="row tela-login">
    <form class="col s12">
    	
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="Nome:" id="first_name" type="text" class="validate">
          
        </div>
        <div class="input-field col s6">
          <input id="last_name" type="text" class="validate" placeholder="Sobrenome:">

        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" placeholder="Senha:">
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="email" type="email" class="validate" placeholder="E-mail:">
        </div>
      </div>









    </form>
  </div>















<?php

	include "rodape.php";

?>


</body>
</html>
