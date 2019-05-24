<?php

  session_start();

  if(!isset($_SESSION['email_admin']) && !isset($_SESSION['senha_admin'])){
    header("Location: login.php");
  }

	include "conexao.php";

	$consulta = "select o.codigo, o.titulo, o.descricao, o.materiais ,o.imagem, o.video, u.nome, u.email from projeto o join usuario u on o.id_usuario = u.id where status_atual = 'em avaliacao'";
	$prepare = $banco->prepare($consulta);
	$prepare->bind_result($id_proj, $titulo, $descricao, $materiais, $imagem, $video, $autor, $email);
  $prepare->execute();
  $prepare->store_result();
  $linhasRetornadas = $prepare->num_rows;

?>

<meta charset="utf-8">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">

<h5 class="titulo-pagina flow-text"> Projetos a Serem Aprovados: </h5>

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

      <table class="striped">

        <tr>
          <th>#</th>
          <th>Titulo</th>
          <th>Descrição/Materiais</th>
          <th>Video/Foto</th>
          <th>Aprovar</th>
          <th>Reprovar</th>
        </tr>

        <script type="text/javascript">
          $(document).ready(function(){
            $('.modal').modal();
          });
        </script>

       <?php

        $cont = 1;
        $num = 2000;
        $pag = 1;
        ?>
        <ul class="pagination" style="text-align: center">
          <li class="disabled" id="voltar"><a href="#!">
            <i class="material-icons">chevron_left</i></a>
          </li>
        <?php
          $divisao = $linhasRetornadas / 4;
          $resto = $linhasRetornadas % 4 == 0 ? 0 : 1;
          $numDepag = $divisao + $resto;
          echo "<li class='active linkpag' style='background-color: #64dd17' id='1' data='$numDepag'><a href='#!'>1</a></li>";
          for($i = 2; $i <= $numDepag; $i++){
            echo "<li class='linkpag' id='$i'><a href='#!'>$i</a></li>";
          }
          ?>
          <li id="ir"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
        <?php
        while ($prepare->fetch()) {
          $num = rand($num,$num + 1000);
          $_SESSION[md5($num)] = $id_proj;
          if($pag == 1){
            echo "<tr class='pagina$pag'>";
          }else{
            echo "<tr class='pagina$pag esconde'>";
          }
          echo "
                <td>$cont</td>
                <td>$titulo</td>
                <td><a style='background-color: #64dd17;' class='cor-menu-usuario btn modal-trigger' href='#modala$cont'><span style='color: white;'>Ver<span></a></td>

                  <div id='modala$cont' class='modal'>
                    <div class='modal-content'>

                      <p>Descrição: <br>$descricao</p>
                      <br>
                      <p>Materiais: <br>$materiais</p>
                    </div>
                    <div class='modal-footer'>
                      <a href='#!' class='modal-close btn-flat'>OK</a>
                    </div>
                  </div>

                <td><a style='background-color: #64dd17;' class='cor-menu-usuario btn modal-trigger' href='#modalb$cont'><span style='color: white;'>Ver<span></a></td>

                  <div id='modalb$cont' class='modal'>
                    <div class='modal-content'>
                      Imagem: <br><img src='imagens-projetos/".md5($email)."/$imagem' width='476' height='267'>";




                      if ($video) {
                        echo "<br><br>Video: <br><iframe width='476' height='267' src='$video'></iframe>";
                      }




                      echo"

                    </div>
                    <div class='modal-footer'>
                      <a href='#!' class='modal-close btn-flat'>OK</a>
                    </div>
                  </div>

                  <td><a style='background-color: #64dd17;' class='cor-menu-usuario btn modal-trigger' href='#modalc$cont'><span style='color: white;'><i class='material-icons'>check</i></span></a>

                  <div id='modalc$cont' class='modal'>
                    <div class='modal-content'>
                      <h4>Deseja realmente aprovar o objeto?</h4>
                      <p>Ao aprovar o projeto seu status mudará para aprovado e será apresentado na pagina de Trocas.</p>
                    </div>
                    <div class='modal-footer'>
                      <a href='#!' class='btnMudarStatus modal-close btn-flat aprovar' status='aprovado' data='".md5($num)."'>Aprovar</a><a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                    </div>

                  <td><a style='background-color: red;' class='cor-menu-usuario btn modal-trigger' href='#modald$cont'><span style='color: white;'><i class='material-icons'>close</i></span></a>

                  <div id='modald$cont' class='modal'>
                    <div class='modal-content'>
                      <h4>Motivo da Reprovação</h4>
                      <form>
                      <div class='input-field col s6'>
                        <input id='motivo' type='text' class='validate' name='motivo' required>
                        <label for='motivo'>Motivo:</label>
                      </div>
                      </form>
                    </div>
                    <div class='modal-footer'>
                      <a href='#!' class='btnMudarStatus modal-close btn-flat reprovar' status='reprovado' data='".md5($num)."'>Reprovar</a><a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                    </div>
               </tr>
          ";
          if($cont % 4 == 0){
            $pag++;
          }
          $cont++;
        }
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
