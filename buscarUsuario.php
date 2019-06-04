<?php

	include "conexao.php";

	$prepare = $banco->prepare("SELECT id, nome, sobrenome FROM usuario");
	$prepare->bind_result($id, $nome, $sobrenome);
	$prepare->execute();
	$prepare->store_result();
	$linhasRetornadas = $prepare->num_rows;

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
    	$('.modal').modal();
  	});
</script>

<h5 class="titulo-pagina flow-text"> Registros de Log </h5>

<?php

	if ($linhasRetornadas == 0) {
    ?>
      <div class="row">
        <div class="col s3"></div>
          <div class="col s6">
            <div class="card-panel teal light-green accent-4">
              <center> 
              	<span class="white-text titulo-partes-projeto"> Nenhum usuário cadastrado... </span> 
              </center>
            </div>
          </div>
        <div class="col s3"></div>
      </div>
    <?php
	}else{
		?>

		<form method="post" action="verLogAdmin.php">

			<label> Selecione o usuário desejado abaixo: </label>
			<select class="browser-default" name="usuarioDesejado">		
			  	
			<?php

			while ($prepare->fetch()){
				echo " <option value=\"$id\"> $nome $sobrenome </option> ";
			}

			?>

			</select>

			<button class="btn waves-effect waves-light btnBuscarUsuario">Ver Log
				<i class="material-icons right">remove_red_eye</i>
			</button>		

		</form>

		<?php

	}

?>
