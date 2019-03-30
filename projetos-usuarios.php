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
    <div class="col s3"></div>
      <div class="col s6">
        <div class="card-panel teal light-green accent-4">
          <center> <span class="white-text titulo-partes-projeto"> Conheça todos os projetos enviados por nossos usuários! </span> </center>
        </div>
      </div>
    <div class="col s3"></div>
  </div>

  <div class="row distancia-div-acima">
    <div class="col s3"></div>
      <div class="col s6">
        <div class="card-panel teal light-green accent-4">
          <center> 
            <span class="white-text titulo-partes-objeto">  
              Aqui estão disponíveis todos os projetos feitos pela nossa equipe e pelos usuários do projeto, e também, projetos recomendados. Ao selecionar o projeto, você será redirecionado ao bate-papo diretamente com o anunciante. Os acordos serão feitos diretamente entre usuário e anunciante. <br>
              Observação: Todos os anúncios passaram por aprovação.
            </span> 
          </center>
        </div>
      </div>
    <div class="col s3"></div>
  </div>  

<?php 

	include "conexao.php";

	$consulta = "SELECT titulo, autor, descricao, data_publicacao, imagem, materiais, video FROM projeto WHERE status_atual = 'aprovado'";
	$prepare = $banco->prepare($consulta);
	$prepare->execute();
	$prepare->bind_result($titulo, $autor, $descricao, $data, $imagem, $materiais, $video);

	echo "<div class=\"row distancia-topo\">";

  echo "
    <div class=\"col s12 m6 l3\">
      <div class=\"card\">
        <div class=\"card-image\">
          <a href=\"login.php\">
            <img src=\"imagens/projetos-usuarios-envie.png\" class=\"imagem-pagina-projetos\">
            <span class=\"card-title titulo-enviar-projeto\"> Envie seu Projeto! </span>
          </a>
        </div>
        <div class=\"card-content\">
          <p> Clique abaixo para enviar um projeto! </p>
        </div>
        <div class=\"card-action\">
          <a href=\"login.php\" class=\"botao-ver-projeto btn\"> Enviar Projeto </a>
        </div>
      </div>
    </div>
  ";

	while($prepare->fetch()){
		echo "
      <div class=\"col s12 m6 l3\">
      	<div class=\"card\">
        	<div class=\"card-image\">
          	<img src=\"imagens-projetos/$autor/$imagem\" class=\"imagem-pagina-projetos materialboxed\">
          	<span class=\"card-title titulo-enviar-projeto\"> $titulo </span>
        	</div>
        	<div class=\"card-content\">
          	<p class=\"truncate\"> $descricao </p>
        	</div>
        	<div class=\"card-action\">
          	<a href=\"ver-projeto.php?titulo=$titulo&autor=$autor&descricao=$descricao&imagem=$imagem&materiais=$materiais&video=$video&data=$data\" class=\"botao-ver-projeto btn\"> Ver Mais </a>
        	</div>
      	</div>
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
