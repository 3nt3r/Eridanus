<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>

	<title>Trocas - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

<?php 

	include "conexao.php";

	$consulta = "SELECT objeto.nome, objeto.descricao, objeto.data_publicacao, objeto.imagem, usuario.nome FROM objeto INNER JOIN usuario ON  status_atual = 'aprovado' and objeto.id_usuario = usuario.id";
	$prepare = $banco->prepare($consulta);
	$prepare->execute();
	$prepare->bind_result($nome, $descricao, $data, $imagem, $usuario);


	echo "<div class=\"row distancia-topo\">";
	while($prepare->fetch()){
		if (isset($_SESSION['email'])){
		echo "
		<div class=\"col s4 m4 l4\">
			<center> <span class=\"titulo-objeto\"> $nome </span> <br>
			<img class=\"responsive-img\" src=\"imagens-objetos/$usuario/$imagem\" height=\"150\" width=\"150\"> <br>
			$descricao <br> <br>
			Data de Envio: $data <br>
			<a class=\"waves-effect waves-light btn botao-objeto\"> Negociar </a>
			</center>
		</div>
		";
		}else{
		echo "
		<div class=\"col s4 m4 l4\">
			<center> <span class=\"titulo-objeto\"> $nome </span> <br>
			<img class=\"responsive-img\" src=\"imagens-objetos/$usuario/$imagem\" height=\"150\" width=\"150\"> <br>
			$descricao <br> <br>
			Data de Envio: $data <br>
			<a class=\"waves-effect waves-light btn botao-objeto disabled\"> Negociar </a>
			</center>
		</div>
		";
		}
	}
	echo "</div>";


	$prepare-> free_result();
	$banco->close();

?>

<?php

	include "rodape.php";

?>

</body>
</html>
