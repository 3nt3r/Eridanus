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
			$data = $_GET['data'];
		}else{
			header("Location: index.php");
		}

	?>

	<title> <?php echo $titulo; ?> - Eridanus </title>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

 ?>

<div class="container">

	<div class="row">
		<div class="col s3"></div>
    		<div class="col s6">
      			<div class="card-panel teal light-green accent-4">
        			<center>
        				<span class="white-text titulo-partes-projeto"> <?php echo $titulo; ?> </span>
        			</center>
        			<br>
        			<hr>
        			<center>
        				<span class="white-text textos-projeto-ver-projeto"> Usuário Responsável: <?php echo $autor; ?> </span>
        			</center>
        			<br>
        			<center>
        				<span class="white-text textos-projeto-ver-projeto"> Data de Envio: <?php echo $data; ?> </span>
        			</center>
      			</div>
    		</div>
		<div class="col s3"></div>
	</div>

	<div class="row">
		<div class="col s3"></div>
    		<div class="col s6">
      			<div class="card-panel teal light-green accent-4">
        			<center> <span class="white-text titulo-partes-projeto"> Descrição </span> </center>
      			</div>
    		</div>
		<div class="col s3"></div>
	</div>

	<div class="row">
		<div class="col s2"></div>
    		<div class="col s8">
        		<center> <span class="titulo-partes-projeto descricao-ver-mais"> <?php echo $descricao; ?> </span> </center>
    		</div>
		<div class="col s2"></div>
	</div>

  	<div class="row">
  		<div class="col s3"></div>
    		<div class="col s6">
      			<div class="card">
        			<div class="card-image">
          				<img <?php echo "src=\"imagens-projetos/".md5($_GET['email'])."/$imagem\""; ?> class="imagem-ver-projeto responsive-img materialboxed" >
          				<span class="card-title frase-card-ver-projetos"> Projeto: <?php echo $titulo; ?> </span>
        			</div>
      			</div>
    		</div>
    	<div class="col s3"></div>
  	</div>

	<div class="row">
		<div class="col s3"></div>
    		<div class="col s6">
      			<div class="card-panel teal light-green accent-4">
        			<center> <span class="white-text titulo-partes-projeto"> Materiais Necessários </span> </center>
      			</div>
    		</div>
		<div class="col s3"></div>
	</div>

	<div class="row">
		<div class="col s2"></div>
    		<div class="col s8">
        		<center> <span class="titulo-partes-projeto descricao-ver-mais"> <?php echo $materiais; ?> </span> </center>
    		</div>
		<div class="col s2"></div>
	</div>

	<div class="row">
		<div class="col s3"></div>
    		<div class="col s6">
      			<div class="card-panel teal light-green accent-4">
        			<center> <span class="white-text titulo-partes-projeto"> Assista ao Vídeo do Projeto </span> </center>
      			</div>
    		</div>
		<div class="col s3"></div>
	</div>

	<div class="row">
		<div class="col s3"></div>
			<div class="col s6">
				<center>
					<iframe width='476' height='267' <?php echo "src=\"$video\""; ?>> </iframe>
				</center>
			</div>
		<div class="col s3"></div>
	</div>

</div>

<?php

	include "rodape.php";

?>

</body>
</html>
