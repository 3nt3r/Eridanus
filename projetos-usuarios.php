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

  <div class="row">
    <div class="col s12">
      <div class="card-panel teal light-green accent-4">
        <center> <span class="white-text"> Conheça todos os projetos enviados por nossos usuários! </span> </center>
      </div>
    </div>
  </div>

<?php 

	include "conexao.php";

	$consulta = "SELECT titulo, autor, descricao, data_publicacao, imagem, materiais, video FROM projeto WHERE status_atual = 'aprovado'";
	$prepare = $banco->prepare($consulta);
	$prepare->execute();
	$prepare->bind_result($titulo, $autor, $descricao, $data, $imagem, $materiais, $video);

	echo "<div class=\"row distancia-topo\">";
	while($prepare->fetch()){
		echo "
    		<div class=\"col s12 m6 l3\">
      			<div class=\"card\">
        			<div class=\"card-image\">
          				<img src=\"imagens-projetos/$autor/$imagem\">
          				<span class=\"card-title\"> $titulo </span>
        			</div>
        			<div class=\"card-content\">
          				<p> $descricao </p>
        			</div>
        			<div class=\"card-action\">
          				<a href=\"ver-projeto.php?titulo=$titulo&autor=$autor&descricao=$descricao&imagem=$imagem&materiais=$materiais&video=$video&data=$data\" class=\"botao-ver-projeto btn\"> Ver Mais </a>
        			</div>
      			</div>
   			 </div> ";
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
