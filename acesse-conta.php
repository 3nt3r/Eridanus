<?php

	session_start();

	if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
		header("Location: login.php");
	}

 ?>

<!DOCTYPE html>
<html>
<head>

	<title>Painel de Controle - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

<script type="text/javascript" src="js/painel-usuario.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
		if($('#linha').height() < $('#conteudo').height())
			$('#linha').height($('#conteudo').height());
	});
</script>

<div class="row" id="linha">

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
	        	<td> <a href="acesse-conta.php"> <span> <i class="material-icons">home</i> Início </span> </a> </td>
	      	</tr>
			<tr>
				<td> <a href="informacoes-usuario.php" id="btnAlt"> <span> <i class="material-icons">person</i> Informações do Usuário </span> </a> </td>
			</tr>
			<tr>
				<td> <a href="enviarproj.php" id="bntEnviarProj"> <span> <i class="material-icons">near_me</i> Enviar Projeto </span> </a> </td>
			</tr>
			<tr>
				<td> <a href="#EditarProjetos" id="btnListarProj"> <span> <i class="material-icons">edit</i> Gerenciar Projeto </span> </a> </td>
			</tr>
			<tr>
				<td> <a href="#EnviarObjeto" id="bntEnviarObjeto"> <span> <i class="material-icons">near_me</i> Enviar Objeto </span> </a> </td>
			</tr>
			<tr>
				<td> <a href="#" id="gerenciarobjetos"> <span> <i class="material-icons">edit</i> Gerenciar Objeto </span> </a> </td>
			</tr>

			<tr>
				<td> 
					<a href="sair.php"> <span> <i class="material-icons" style="margin-bottom: 30px;">exit_to_app</i> Sair </span> </a> 
				</td>
			</tr>

		</table>
	</div>

	<div class="col s9">
 		<div id="conteudo" class="col s9 l10 m9" style="margin-left: 30px; height: auto;">

 			<h5 class="titulo-pagina flow-text"> Bem-Vindo, <?php echo $_SESSION['nome']; ?>! </h5>

			<div class="container distancia-slider">
			  <div class="row">
			    <div class="col s1"></div>
			        <div class="col s10">
			        	<center>
				 			<table class="striped distancia-lados-tabela centered">
								<tr>
									<th>Informações do Usuário</th>
									<td>Alterar dados e senha</td>
								</tr>
								<tr>
									<th>Enviar projeto</th>
									<td>Envio de Projetos para análise</td>
								</tr>
								<tr>
									<th>Gerenciar Projetos</th>
									<td>Editar, Excluir e acompanhar Status dos projetos enviados</td>
								</tr>
								<tr>
									<th>Enviar Objeto</th>
									<td>Envio de Objetos para análise</td>
								</tr>
								<tr>
									<th>Gerenciar Objetos</th>
									<td>Editar, Excluir e acompanhar Status dos objetos enviados</td>
								</tr>
							</table>
			            </center>
			        </div>
			    <div class="col s1"></div>
			  </div>
			</div>
 		</div>
	</div>

</div>

<?php

	include "rodape.php";

 ?>

</body>
</html>
