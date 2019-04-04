<?php 

	include "conexao.php";

	$prepare = $banco->prepare("select codigo, titulo, autor, descricao, data_publicacao, materiais, video from projeto where status_atual = ?");
	$excluido = "excluido";
	$prepare->bind_param("s", $excluido);
	$prepare->bind_result($codigo, $titulo, $autor, $descricao, $data, $materiais, $video);
	$prepare->execute();
	$prepare->store_result();

?>

<script type="text/javascript">
	$(document).ready(function(){
    	$('.modal').modal();
  	});
</script>

      <div class="container distancia-slider distancia-texto-cima">
        <div class="row">
          <div class="col s3"></div>
              <div class="col s6">
                  <div class="card-panel teal light-green accent-4">
                    <center> 
                      <span class="white-text titulo-partes-projeto"> Projetos Excluídos </span>
                    </center>
                  </div>
              </div>
          <div class="col s3"></div>
        </div>
      </div>

<table class="striped estiloProjetosExcluidos centered responsive-table">

  <tr>
    <th>Código</th>
    <th>Título</th>
    <th>Autor</th>
    <th>Descrição</th>
    <th>Data Publicação</th>
    <th>Materiais</th>
    <th>Vídeo</th>
  </tr>

	<?php 

		$cont = 1;

		while ($prepare->fetch()) {

		    echo "
		      <tr>
		        <td>$codigo</td>
		        <td> <span class=\"truncate\"> $titulo </span> </td>
		        <td>$autor</td>

		        <td> 
				  <a class=\"btn modal-trigger light-green accent-4\" href=\"#modala$cont\"> Ver </a>
				  <div id=\"modala$cont\" class=\"modal\">
				    <div class=\"modal-content\">
				      <h4>Descrição</h4>
				      <p> $descricao </p>
				    </div>
				    <div class=\"modal-footer\">
				      <a href=\"#!\" class=\"modal-close btn-flat\">Fechar</a>
				    </div>
				  </div>
		        </td>

		        <td>$data</td>
		       	
		        <td> 
				  <a class=\"btn modal-trigger light-green accent-4\" href=\"#modalb$cont\"> Ver </a>
				  <div id=\"modalb$cont\" class=\"modal\">
				    <div class=\"modal-content\">
				      <h4>Materiais</h4>
				      <p> $materiais </p>
				    </div>
				    <div class=\"modal-footer\">
				      <a href=\"#!\" class=\"modal-close btn-flat\">Fechar</a>
				    </div>
				  </div>
		        </td>

		        <td>
		        	<a class=\"btn light-green accent-4\" href=\"$video\" target=\"_blank\"> Ver </a>
		        </td>

		      </tr>
		    ";

		    $cont++;

		}

		$banco->close();

	?>

</table>
