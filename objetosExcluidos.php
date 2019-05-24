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
		<ul class="pagination" style="text-align: center">
      <li class="disabled" id="voltar"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
      <?php
        $divisao = $linhasRetornadas / 4;
        $resto = $linhasRetornadas % 4 == 0 ? 0 : 1;
        $numDepag = $divisao + $resto;
        echo "<li class='active linkpag' style='background-color: #64dd17' id='1' data='$numDepag'><a href='#!'>1</a></li>";
        for($i = 2; $i < $numDepag; $i++){
          echo "<li class='linkpag' id='$i'><a href='#!'>$i</a></li>";
        }
      ?>
      <li id="ir"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
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
				$pag = 1;
				while ($prepare->fetch()) {
					if($pag == 1){
	          echo "<tr class='pagina$pag'>";
	        }else{
	          echo "<tr class='pagina$pag esconde'>";
	        }
				    echo "


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
						if($cont % 4 == 0){
		          $pag++;
		        }
				    $cont++;

				}

				$banco->close();

			?>

		</table>
		<script type="text/javascript">
		  $(document).ready(function(){
		    var pagAtual = 1;
		    var totalDePag = Math.trunc($("#1").attr("data"));
		    $(".linkpag").click(function(event){
		      event.preventDefault();
		      var id = $(this).attr("id");
		      if(id != pagAtual){
		        $("#"+pagAtual).removeClass("active");
		        $(".pagina"+id).removeClass("esconde");
		        $("#"+id).css("background-color", "#64dd17");
		        $("#"+pagAtual).css("background-color", "inherit");
		        $(".pagina"+pagAtual).addClass("esconde");
		        $("#"+id).addClass("active");
		        pagAtual = id;
		      }
		      if(pagAtual == 1){
		        $("#voltar").addClass("disabled");
		      }else if(pagAtual == totalDePag){
		        $("#ir").addClass("disabled");
		      }else if(totalDePag == 1){
		        $("#ir").addClass("disabled");
		        $("#voltar").addClass("disabled");
		      }else{
		        $("#voltar").removeClass("disabled");
		        $("#ir").removeClass("disabled");
		      }
		    });
		    $("#voltar").click(function(event){
		      if(!$(this).hasClass("disabled")){
		        event.preventDefault();
		        let id = pagAtual-1;
		        $("#"+pagAtual).removeClass("active");
		        $(".pagina"+id).removeClass("esconde");
		        $("#"+id).css("background-color", "#64dd17");
		        $("#"+pagAtual).css("background-color", "inherit");
		        $(".pagina"+pagAtual).addClass("esconde");
		        $("#"+id).addClass("active");
		        pagAtual -= 1;
		        if(pagAtual == 1){
		          $("#voltar").addClass("disabled");
		        }else if(pagAtual == totalDePag){
		          $("#ir").addClass("disabled");
		        }else if(totalDePag == 1){
		          $("#ir").addClass("disabled");
		          $("#voltar").addClass("disabled");
		        }else{
		          $("#voltar").removeClass("disabled");
		          $("#ir").removeClass("disabled");
		        }
		      }
		    });
		    $("#ir").click(function(event){
		      if(!$(this).hasClass("disabled")){
		        event.preventDefault();
		        let id = pagAtual+1;
		        $("#"+pagAtual).removeClass("active");
		        $(".pagina"+id).removeClass("esconde");
		        $("#"+id).css("background-color", "#64dd17");
		        $("#"+pagAtual).css("background-color", "inherit");
		        $(".pagina"+pagAtual).addClass("esconde");
		        $("#"+id).addClass("active");
		        pagAtual += 1;
		        if(pagAtual == 1){
		          $("#voltar").addClass("disabled");
		        }else if(pagAtual == totalDePag){
		          $("#ir").addClass("disabled");
		        }else if(totalDePag == 1){
		          $("#ir").addClass("disabled");
		          $("#voltar").addClass("disabled");
		        }else{
		          $("#voltar").removeClass("disabled");
		          $("#ir").removeClass("disabled");
		        }
		      }
		    });
		  });
		</script>

		<?php
	}

?>
