<?php 

	session_start(); 

	if (!$_SESSION['nome_admin']) {
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Resultado Registros de Log - Eridanus</title>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/materialize.js"></script>
	<script type="text/javascript" src="js/painel-usuario.js"></script>

	<?php

		include "cabecalho.php";

	?>

</head>
<body>

<?php

	include "menu.php";

?>

<?php

	$idUsuarioBuscar = $_POST["usuarioDesejado"];

	include "conexao.php";

	$prepare = $banco->prepare("SELECT DISTINCT controleLog.descricao, controleLog.dataLog, controleLog.horario, usuario.nome, usuario.sobrenome FROM controleLog INNER JOIN usuario ON controleLog.idUsuario = ? and controleLog.idusuario = usuario.id ORDER BY controleLog.horario DESC");
	$prepare->bind_param("i", $idUsuarioBuscar);
	$prepare->bind_result($descricao, $data, $horario, $usuario, $sobrenome);
	$prepare->execute();
	$prepare->store_result();
	$linhasRetornadas = $prepare->num_rows;

?>

<script type="text/javascript">
	$(document).ready(function(){
    	$('.modal').modal();
  	});
</script>

<h5 class="titulo-pagina flow-text"> Registros de Log </h5>

<center> 
	<a class="waves-effect waves-light btn light-green accent-4 btnPesquisarNovamente pulse" href="painel-admin.php"> Nova Pesquisa </a> 
</center>

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
		<table class="striped registroDeLogsResultado responsive-table">

		  <tr>
		    <th>Descrição</th>
		    <th>Usuário</th>
		    <th>Data</th>
		    <th>Horario</th>
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

				        <td> $descricao </td>

				        <td> $usuario </td>

				        <td> $data </td>

				        <td> $horario </td>

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


<?php

	include "rodape.php";

?>

</body>
</html>
