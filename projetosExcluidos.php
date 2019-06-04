<?php

	include "conexao.php";

	$prepare = $banco->prepare("select codigo, titulo, autor, descricao, data_publicacao, materiais, video from projeto where status_atual = ?");
	$excluido = "excluido";
	$prepare->bind_param("s", $excluido);
	$prepare->bind_result($codigo, $titulo, $autor, $descricao, $data, $materiais, $video);
	$prepare->execute();
	$prepare->store_result();
	$linhasRetornadas = $prepare->num_rows;

?>

<script type="text/javascript">
	$(document).ready(function(){
    	$('.modal').modal();
  	});
</script>

<h5 class="titulo-pagina flow-text"> Projetos Excluídos: </h5>

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
        $divisao = $linhasRetornadas / 5;
        $resto = $linhasRetornadas % 5 == 0 ? 0 : 1;
        $numDepag = (int) ($divisao + $resto);
        echo "<li class='active linkpag' style='background-color: #64dd17' id='1' data='$numDepag'><a href='#!'>1</a></li>";
        for($i = 2; $i < $numDepag; $i++){
          echo "<li class='linkpag' id='$i'><a href='#!'>$i</a></li>";
        }
      ?>
      <li class="<?php if($numDepag == 1){echo "disabled";}?>" id="ir"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
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
				$pag = 1;
				while ($prepare->fetch()) {
						if($pag == 1){
		          echo "<tr class='pagina$pag'>";
		        }else{
		          echo "<tr class='pagina$pag esconde'>";
		        }
				    echo "

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

				        <td>

				    ";

					echo date("d/m/Y", strtotime($data));

				    echo "
				        </td>

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

				        ";

				        if ($video) {
				        	echo "<a class=\"btn light-green accent-4\" href=\"$video\" target=\"_blank\"> Ver </a>";
				        }else{
				        	echo "Nenhum vídeo encontrado.";
				        }

				     echo "

				        </td>

				      	</tr>
				    ";
						if($cont % 5 == 0){
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
					$("#voltar").removeClass("disabled");
		      $("#ir").removeClass("disabled");
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
		      }
		      if(pagAtual == totalDePag){
		        $("#ir").addClass("disabled");
		      }
		      if(totalDePag == 1){
		        $("#voltar").addClass("disabled");
		        $("#ir").addClass("disabled");
		      }
		    });
		    $("#voltar").click(function(event){
		      if(!$(this).hasClass("disabled")){
		        event.preventDefault();
						$("#voltar").removeClass("disabled");
			      $("#ir").removeClass("disabled");
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
			      }
			      if(pagAtual == totalDePag){
			        $("#ir").addClass("disabled");
			      }
			      if(totalDePag == 1){
			        $("#voltar").addClass("disabled");
			        $("#ir").addClass("disabled");
			      }
		      }
		    });
		    $("#ir").click(function(event){
		      if(!$(this).hasClass("disabled")){
		        event.preventDefault();
		        let id = pagAtual+1;
						$("#voltar").removeClass("disabled");
			      $("#ir").removeClass("disabled");
		        $("#"+pagAtual).removeClass("active");
		        $(".pagina"+id).removeClass("esconde");
		        $("#"+id).css("background-color", "#64dd17");
		        $("#"+pagAtual).css("background-color", "inherit");
		        $(".pagina"+pagAtual).addClass("esconde");
		        $("#"+id).addClass("active");
		        pagAtual += 1;
						if(pagAtual == 1){
			        $("#voltar").addClass("disabled");
			      }
			      if(pagAtual == totalDePag){
			        $("#ir").addClass("disabled");
			      }
			      if(totalDePag == 1){
			        $("#voltar").addClass("disabled");
			        $("#ir").addClass("disabled");
			      }
		      }
		    });
		  });
		</script>
		
		<?php
	}

?>
