<?php

	session_start();

	if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
		header("Location: login.php");
	}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Painel de Controle - Eridanus</title>
	<script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/painel-usuario.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      if($('#linha').height() < $('#conteudo').height())
        $('#linha').height($('#conteudo').height());
    });
  </script>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

<div class="row" id="linha">

	<div class="col s9 l10 m9">
 		<div id="conteudo" class="col s9 l10 m9" style="margin-left: 30px; height: auto;">

 			<h5 class="titulo-pagina flow-text"> Bem-Vindo <?php echo $_SESSION['nome_admin']; ?>! </h5>

      <div class="container distancia-slider distancia-texto-cima">
        <div class="row">
          <div class="col s3"></div>
              <div class="col s6">
                  <div class="card-panel teal light-green accent-4">
                    <center>
                      <span class="white-text titulo-partes-projeto"> Projetos Aguardando Aprovação </span>
                    </center>
                  </div>
              </div>
          <div class="col s3"></div>
        </div>
      </div>

      <?php include_once "projetos-painel-admin.php" ?>

 		</div>
	</div>

  <div class="col s3 l2 m3 menu-usuario z-depth-5">
    <table>
      <tr>
        <th>
          <center>
            <span class="ola-usuario"> Menu Principal </span>
          </center>
        </th>
      </tr>

      <tr>
        <td> <a href="painel-admin.php"> <span> <i class="material-icons">home</i> Início </span> </a> </td>
      </tr>

      <tr>
        <td> <a href="#" id="btnverobjetos"> <span> <i class="material-icons">check</i> Aprovar Objetos </span> </a> </td>
      </tr>

      <tr>
        <td> <a href="#" id="btnProjetosExcluidos"> <span> <i class="material-icons">close</i> Projetos Excluídos </span> </a> </td>
      </tr>

      <tr>
        <td> <a href="#" id="btnObjetosExcluidos"> <span> <i class="material-icons">close</i> Objetos Excluídos </span> </a> </td>
      </tr>

      <tr>
        <td> <a href="sair.php"> <span> <i class="material-icons" style="margin-bottom: 30px;">exit_to_app</i> Sair </span> </a> </td>
      </tr>

    </table>
  </div>

</div>

<?php

	include "rodape.php";

 ?>

</body>
</html>
