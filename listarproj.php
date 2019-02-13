<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
  header("Location: login.php");
}
include "conexao.php";
$id =(int) $_SESSION["id"];
$consulta = "select codigo, titulo, descricao, status_atual, materiais, video from projeto where id_usuario = ?";
$prepare = $banco->prepare($consulta);
$prepare->bind_param("i",$id);
$prepare->bind_result($id_proj, $titulo, $descricao, $status_atual, $materiais, $video);
$prepare->execute();
$prepare->store_result();
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript" src="js/painel-usuario.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<h5 class="titulo-pagina flow-text"> Gerenciar meus Projetos </h5>
<table>
  <tr>
    <th>#</th>
    <th>Titulo</th>
    <th>Descrição</th>
    <th>Status</th>
    <th>Editar</th>
    <th>Excluir</th>
  </tr>
<?php
  $cont = 1;
  $num = 2000;
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
        <td style='color: $cor;'>$status_certo</td>
        <td><button class='btnEditarProj' type='button' data='".md5($num)."'><i class='material-icons'>edit</i></button></td>
        <div id='modal$cont' class='modal'>
          <div class='modal-content'>
            <p style='font-size: 15pt;'>Deseja realmente excluir?</p>
          </div>
          <div class='modal-footer'>
      			<a href='#!' class='modal-close waves-effect waves-green btn-flat'>Cancelar</a>
            <a href='#!' class='btnExcluirProj modal-close waves-effect waves-red btn-flat' data='".md5($num)."'>Excluir</a>
          </div>
        </div>
        <td><a class='modal-trigger' href='#modal$cont'><i class='material-icons' style='color: red;'>close</i></a></td>
      </tr>
    ";
    $cont++;
  }
?>
</table>
