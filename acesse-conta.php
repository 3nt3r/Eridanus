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
















<div class="menu-usuario">
	

	<table>
		<tr>
			<th> <center> <span style="color: white;"> <i class="material-icons" style="margin-right: 5px;">pan_tool</i> Olá, <?php  echo $_SESSION['nome'];  ?>! </span> </center> </th>
		</tr>


		<tr>
			<td> <a href="index.php"> <span> <i class="material-icons" style="margin-right: 5px;">home</i> Voltar ao Início </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="informacoes-usuario.php"> <span> <i class="material-icons" style="margin-right: 5px;">person</i> Informações do Usuário </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">near_me</i> Enviar Projeto </span> </a> </td>
		</tr>		


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">edit</i> Gerenciar Projeto </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">near_me</i> Enviar Objeto </span> </a> </td>
		</tr>		


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">edit</i> Gerenciar Objeto </span> </a> </td>
		</tr>


		<tr>
			<td> <a href="#"> <span> <i class="material-icons" style="margin-right: 5px;">exit_to_app</i> Sair </span> </a> </td>
		</tr>	


	</table>

</div>




<iframe src="painel-usuario.php" name="painel-usuario" id="frame-usuario">
	



</iframe>






































<?php

	include "rodape.php";

?>


</body>
</html>
