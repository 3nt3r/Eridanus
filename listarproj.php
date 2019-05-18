<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

  include "conexao.php";
  
  $id =(int) $_SESSION["id"];
  $consulta = "select codigo, titulo, descricao, status_atual, observacoes, materiais, video from projeto where id_usuario = ? and status_atual != ?";
  $prepare = $banco->prepare($consulta);
  $excluido = "excluido";
  $prepare->bind_param("is", $id, $excluido);
  $prepare->bind_result($id_proj, $titulo, $descricao, $status_atual, $observacoes, $materiais, $video);
  $prepare->execute();
  $prepare->store_result();
  $linhasRetornadas = $prepare->num_rows;

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<h5 class="titulo-pagina flow-text"> Gerenciar Meus Projetos </h5>

<table class="striped">
<?php

  $cont = 1;
  $num = 2000;

  if ($linhasRetornadas == 0) {

    ?>

    <div class="row">
      <div class="col s3"></div>
        <div class="col s6">
          <div class="card-panel teal light-green accent-4">
            <center> <span class="white-text titulo-partes-projeto"> Nenhum projeto encontrado... </span> </center>
          </div>
        </div>
      <div class="col s3"></div>
    </div>

    <?php

  }else{
    ?>

    <tr>
      <th>#</th>
      <th>Titulo</th>
      <th>Descrição</th>
      <th>Observações</th>
      <th>Status</th>
      <th>Editar</th>
      <th>Excluir</th>
    </tr>

    <?php

    while ($prepare->fetch()) {
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
        $_SESSION[md5($num)] = $id_proj;
        echo "
          <tr>
            <td>$cont</td>
            <td>$titulo</td>
            <td>$descricao</td>
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
                <p>Após o projeto ser editado seu status será alterado para <span style='color: rgb(255, 163, 41)'>'Em avaliação'</span>, e será analisado novamente.</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                <a href='#!' class='btnEditarProj modal-close waves-effect waves-red btn-flat' data='".md5($num)."'>Editar</a>
              </div>
            </div>
            <td><a class='modal-trigger' href='#modale$cont'><i class='material-icons' style='color: black;'>edit</i></a></td>
            <div id='modal$cont' class='modal'>
              <div class='modal-content'>
                <p style='font-size: 15pt;'>Deseja realmente excluir?</p>
              </div>
              <div class='modal-footer'>
                <a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
                <a href='#!' class='btnExcluirProj modal-close waves-effect waves-red btn-flat' data='".md5($num)."'> <span class='reprovar'> Excluir </span> </a>
              </div>
            </div>
            <td><a class='modal-trigger' href='#modal$cont'><i class='material-icons' style='color: red;'>close</i></a></td>
          </tr>
        ";
        $cont++;
      }    
  }

  $banco->close();

?>

</table>
