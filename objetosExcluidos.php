<?php 

	include "conexao.php";

	$prepare = $banco->prepare("SELECT objeto.id, objeto.nome, objeto.descricao, objeto.data_publicacao, objeto.imagem, usuario.nome FROM objeto INNER JOIN usuario ON status_atual = 'excluido' and objeto.id_usuario = usuario.id");
	$prepare->bind_result($codigo, $nome, $descricao, $data, $imagem, $autor);
	$prepare->execute();
	$prepare->store_result();
	$linhasRetornadas = $prepare->num_rows;

?>

<script type="text/javascript">
	$(document).ready(function(){
    	$('.modal').modal();
  	});
</script>

<h5 class="titulo-pagina flow-text"> Objetos Excluídos: </h5>

<?php 

	if ($linhasRetornadas == 0) {
    ?>
      <div class="row">
        <div class="col s3"></div>
          <div class="col s6">
            <div class="card-panel teal light-green accent-4">
              <center> <span class="white-text titulo-partes-projeto"> Nenhum resultado encontrado... </span> </center>
            </div>
          </div>
        <div class="col s3"></div>
      </div>
    <?php 
	}else{
		?>
		<table class="striped estiloProjetosExcluidos centered responsive-table">

		  <tr>
		    <th>Código</th>
		    <th>Título</th>
		    <th>Descrição</th>
		    <th>Data Publicação</th>
		    <th>Imagem</th>
		    <th>Autor</th>
		  </tr>

			<?php 

				$cont = 1;

				while ($prepare->fetch()) {

				    echo "
				      <tr>

				        <td>$codigo</td>

				        <td> <span class=\"truncate\"> $nome </span> </td>

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

				        <td>

				        ";

				        echo date("d/m/Y", strtotime($data));

				        echo "
				        </td>

				        <td> 
						  <a class=\"btn modal-trigger light-green accent-4\" href=\"#modalb$cont\"> Ver </a>
						  <div id=\"modalb$cont\" class=\"modal\">
						    <div class=\"modal-content\">
						      <img src=\"imagens-objetos/$autor/$imagem\" height=\"240\" width=\"320\">
						    </div>
						    <div class=\"modal-footer\">
						      <a href=\"#!\" class=\"modal-close btn-flat\">Fechar</a>
						    </div>
						  </div>
				        </td>

				        <td>$autor</td>

				      </tr>
				    ";

				    $cont++;

				}

				$banco->close();

			?>

		</table>
		<?php
	}

?>
