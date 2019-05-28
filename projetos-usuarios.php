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
              Aqui estão disponíveis todos os projetos feitos pela nossa equipe, por nossos usuários e também, projetos recomendados. Ao selecionar o projeto, você será redirecionado a uma página com todas as informações referentes ao mesmo. <br>
              Observação: Todos os anúncios passaram por aprovação.
            </span>
          </center>
        </div>
      </div>
    <div class="col s3"></div>
  </div>

  <script type="text/javascript">
    $(document).ready(function(){
      $('.modal').modal();
    });
  </script>

<?php

	include "conexao.php";
	
	//Recebe o número da página
	$pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
	
	//Quantidade de itens por página
	$qtd_result_pg = 11;
	
	//Visualização de itens
	$inicio = ($qtd_result_pg * $pagina) - $qtd_result_pg;

	$consulta = "SELECT projeto.titulo, projeto.descricao, projeto.data_publicacao, projeto.imagem, projeto.materiais, projeto.video, usuario.nome, usuario.email, usuario.sobrenome FROM projeto INNER JOIN usuario ON  status_atual = 'aprovado' and projeto.id_usuario = usuario.id LIMIT $inicio, $qtd_result_pg";
	$prepare = $banco->prepare($consulta);
	$prepare->bind_result($titulo, $descricao, $data, $imagem, $materiais, $video, $autor, $email, $sobrenome);
  $prepare->execute();
  $prepare->store_result();
  $linhasRetornadas = $prepare->num_rows;

	echo "<div class=\"row distancia-topo\">";

  if ($linhasRetornadas == 0) {
  echo "
    <div class=\"col s12 m6 l3\">
      <div class=\"card\">
        <div class=\"card-image\">
          <a href=\"login.php\">
            <img src=\"imagens/projetos-usuarios-envie.png\" class=\"imagem-pagina-projetos\">
            <span class=\"card-title titulo-enviar-projeto\"> <b> Nenhum Projeto Encontrado... </b> </span>
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
  }else{
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
  }

	while($prepare->fetch()){
		echo "
      <div class=\"col s12 m6 l3\">
      	<div class=\"card\">
        	<div class=\"card-image\">
          	<img src=\"imagens-projetos/".md5($email)."/$imagem\" class=\"imagem-pagina-projetos materialboxed\">
          	<span class=\"card-title titulo-enviar-projeto\"> $titulo </span>
        	</div>
        	<div class=\"card-content\">
            <p class=\"truncate\"> $descricao </p>
        	</div>
        	<div class=\"card-action\">
          	<a href=\"ver-projeto.php?titulo=$titulo&autor=$autor&descricao=$descricao&imagem=$imagem&materiais=$materiais&video=$video&data=$data&email=$email&sobrenome=$sobrenome\" class=\"botao-ver-projeto btn\"> Ver Mais </a>
        	</div>
      	</div>
   	  </div>
    ";
	}

	echo "</div>";
	
	//Quantidade de linhas no BD
	$result_pg = "SELECT COUNT(codigo) AS num_result FROM projeto";
	$resultado_pg = mysqli_query($banco, $result_pg);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	
	
	//Quantidade de páginas
	$quantidade_pg = ceil($row_pg['num_result'] / $qtd_result_pg);
	
	//Limitar links antes e depois
	$max_links = 5;
	
    //Paginação
	echo "<center><ul class='pagination'>
	<li class='waves-effect'><a href='projetos-usuarios.php?pagina=1'><i class='material-icons'>chevron_left</i></a></li>";
		
	for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
		if($pag_ant >= 1){
			echo "<li class='waves-effect'><a href='projetos-usuarios.php?pagina=$pag_ant'>$pag_ant</a></li>";
		}
	}
	
	echo "<li class='active fundo-paginacao'>$pagina</li>";
	
	for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
		if($pag_dep <= $quantidade_pg){
			echo "<li class='waves-effect'><a href='projetos-usuarios.php?pagina=$pag_dep'>$pag_dep</a></li>";
		}
	}	
	echo "<li class='waves-effect'><a href='projetos-usuarios.php?pagina=$quantidade_pg'><i class='material-icons'>chevron_right</i></a></li></center>";
  
	$prepare-> free_result();
	$banco->close();

?>

<?php

	include "rodape.php";

?>

</body>
</html>
