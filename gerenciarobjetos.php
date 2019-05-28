<?php

session_start();

if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
  header("Location: login.php");
}

include 'controleDeLog.php';
inserirLog("O usuário visitou a página gerenciar objetos.");

include "conexao.php";


$id =(int) $_SESSION["id"];

$consulta = "select id, nome, descricao, observacoes, data_publicacao, status_atual from objeto where id_usuario = ?";
$prepare = $banco->prepare($consulta);
$prepare->bind_param('i', $id);
$prepare->bind_result($id_obje, $nome, $descricao, $observacoes, $data_publicacao, $status_atual);
$prepare->execute();
$prepare->store_result();
$linhasRetornadas = $prepare->num_rows;

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<h5 class="titulo-pagina flow-text"> Gerenciar Meus Objetos </h5>

<table class="striped responsive-table">

<?php

  $cont = 1;
  $num = 2000;
  $pag = 1;
  if ($linhasRetornadas == 0) {

    ?>

    <div class="row">
      <div class="col s3"></div>
        <div class="col s6">
          <div class="card-panel teal light-green accent-4">
            <center> <span class="white-text titulo-partes-projeto"> Nenhum objeto encontrado... </span> </center>
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
        for($i = 2; $i <= $numDepag; $i++){
          echo "<li class='linkpag' id='$i'><a href='#!'>$i</a></li>";
        }
      ?>
      <li id="ir"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
    </ul>
      <tr>
        <th>#</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Observações</th>
        <th>Status</th>
        <th>Editar</th>
        <th>Excluir</th>
      </tr>

    <?php


    while ($prepare->fetch()) {

      if ($status_atual != "excluido") {

        if($status_atual == "em avaliacao"){
          $cor = "rgb(255, 163, 41)";
          $status_certo = "Em avaliação";
        }else if($status_atual == "aprovado"){
          $cor = "rgb(67, 255, 11)";
          $status_certo = "Aprovado";
        }else if($status_atual == "reprovado"){
          $cor = "rgb(255, 9, 0)";
          $status_certo = "Reprovado";
        }
        $num = rand($num,$num + 1000);
        $_SESSION[md5($num)] = $id_obje;

        if($pag == 1){
          echo "<tr class='pagina$pag'>";
        }else{
          echo "<tr class='pagina$pag esconde'>";
        }
        echo "
            <td>$cont</td>

            <td>$nome</td>

            <td>
              <a class=\"light-green accent-4 btn modal-trigger\" href=\"#modalz$cont\"> Ver </a>

              <div id=\"modalz$cont\" class=\"modal\">
                <div class=\"modal-content\">
                  <h4>Descrição do Objeto</h4>
                  <p> $descricao </p>
                </div>
                <div class=\"modal-footer\">
                  <a href=\"#!\" class=\"modal-close btn-flat\"> Fechar </a>
                </div>
              </div>
            </td>
            ";
        if($status_atual == "reprovado"){
          echo "
            <td><a style='background-color: #64dd17;' class='cor-menu-usuario waves-effect waves-light btn modal-trigger' href='#modald$cont'><span style='color: white;'>Ver</span></a>

            <div id='modald$cont' class='modal'>
              <div class='modal-content'>
                <h4>Causa da reprovação</h4>
                <p>$observacoes</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Ok</a>
              </div>
            </div>
              ";
            }else{
              echo "<td></td>";
            }

            echo
              "
            <td style='color: $cor;'>$status_certo</td>

            <div id='modale$cont' class='modal'>
              <div class='modal-content'>
                <p style='font-size: 15pt;'>Deseja realmente editar?</p>
                <p>Após o objeto ser editado seu status será alterado para <span style='color: rgb(255, 163, 41)'>'Em avaliação'</span>, e será analisado novamente.</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                <a href='#!' class='btnEditarObje modal-close waves-effect waves-red btn-flat' data='".md5($num)."'>Editar</a>
              </div>
            </div>
            <td><a class='modal-trigger' href='#modale$cont'><i class='material-icons' style='color: black;'>edit</i></a></td>
            <div id='modal$cont' class='modal'>
              <div class='modal-content'>
                <p style='font-size: 15pt;'>Deseja realmente excluir?</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                <a href='#!' class='btnExcluirObje modal-close waves-effect waves-red btn-flat' data='".md5($num)."'> <span class='reprovar'> Excluir </span> </a>
              </div>
            </div>

            <td><a class='modal-trigger' href='#modal$cont'><i class='material-icons' style='color: red;'>close</i></a></td>

          </tr>
        ";
        if($cont % 4 == 0){
          $pag++;
        }
        $cont++;

      }


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
