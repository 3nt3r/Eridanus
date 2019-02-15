<?php session_start();  ?>
<!DOCTYPE html>
<html>
<head>

	<?php 

	if (isset($_GET['titulo'])) {
		$titulo = $_GET['titulo'];
		$autor = $_GET['autor'];
		$descricao = $_GET['descricao'];
		$imagem = $_GET['imagem'];
		$materiais = $_GET['materiais'];
		$video = $_GET['video'];
	}else{
		header("Location: index.php");
	}


	?>

	<title><?php echo $titulo; ?> - Eridanus</title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>


	<h5 class="titulo-pagina flow-text"> <?php echo $titulo; ?> </h5>

	<h5 class="titulo-pagina flow-text"> Descrição do Projeto: </h5>

	<div class="row">
		<div class="col s2 m2 l2"></div>
		<p class="descricao-ver-mais flow-text col s8 m8 l8"> <?php echo $descricao; ?> </p>
		<div class="col s2 m2 l2"></div>
	</div>

	<h5 class="titulo-pagina flow-text"> Imagem Referente ao Projeto: </h5>

	<div class="row">
		<div class="col s2 m2 l2"></div>
		<img <?php echo "src=\"imagens-projetos/$autor/$imagem\""; ?> class="responsive-img imagem-ver-projeto">
		<div class="col s2 m2 l2"></div>
	</div>

	<h5 class="titulo-pagina flow-text"> Materiais Necessários: </h5>

	<div class="row">
		<div class="col s2 m2 l2"></div>
		<p class="descricao-ver-mais flow-text col s8 m8 l8"> <?php echo $materiais; ?> </p>
		<div class="col s2 m2 l2"></div>
	</div>

	<h5 class="titulo-pagina flow-text"> Assista ao Vídeo do Projeto: </h5>

	<div class="row">
		<div class="col s2 m2 l2"></div>
		<iframe width='476' height='267' <?php echo "src=\"$video\""; ?> ></iframe>
		<div class="col s2 m2 l2"></div>
	</div>


<?php

	include "rodape.php";

?>

</body>
</html>
