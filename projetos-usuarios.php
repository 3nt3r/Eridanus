<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>

	<title>Projetos dos Usuários - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>



<h5 class="titulo-pagina flow-text"> Conheça projetos enviados por nossos usuários! </h5>


<?php 

	include "conexao.php";



	$consulta = "SELECT titulo, autor, descricao, data_publicacao, imagem, materiais, video FROM projeto WHERE status_atual = 'aprovado'";
	$prepare = $banco->prepare($consulta);
	$prepare->execute();
	$prepare->bind_result($titulo, $autor, $descricao, $data, $imagem, $materiais, $video);


	echo "<div class=\"row distancia-topo\">";
	while($prepare->fetch()){
		echo "
		<div class=\"col s4 m4 l4\">
			<center> <span class=\"titulo-objeto\"> $titulo </span> <br>
			<img class=\"responsive-img\" src=\"imagens-projetos/$autor/$imagem\" height=\"150\" width=\"150\"> <br>
			Data de Envio: $data <br>
			<form method=\"post\" action=\"ver-projeto.php?titulo=$titulo&autor=$autor&descricao=$descricao&imagem=$imagem&materiais=$materiais&video=$video\">
				<button class=\"btn waves-effect waves-light botao-objeto\" type=\"submit\" name=\"action\">Ver Mais
    				<i class=\"material-icons right\">send</i>
  				</button>
			</form>
			</center>
		</div>
		";
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
