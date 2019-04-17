<script type="text/javascript" src="js/painel-usuario.js"></script>

<?php

  session_start();

  include "conexao.php";

  $id_proj = $_SESSION[$_POST["data"]];
  $consulta = "select titulo, descricao, imagem, materiais, video from projeto where codigo = ?";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_param("i",$id_proj);
  $prepare->bind_result($titulo, $descricao, $imagem, $materiais, $video);
  $prepare->execute();
  $prepare->store_result();
  $prepare->fetch();

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">

<div class="row" style="margin-top: 3.5vw;">

  <h5 class="titulo-pagina flow-text"> Atualize seu projeto! </h5>

  <form id="enviarp" action="mudarproj.php" method="post" enctype="multipart/form-data">
<input type="text" class="esconde" name="data" value="<?php echo $_POST["data"];?>">
    <div class="input-field col s6">

      <input id="titulo" type="text" value="<?php echo $titulo; ?>" class="validate" name="titulo">
      <label for="titulo">Titulo:</label>
    </div>

    <div class="input-field col s12">
      <input id="descricao" type="text" value="<?php echo $descricao; ?>" class="materialize-textarea validate" name="descricao"></input>
      <label for="descricao">Descrição do Projeto:</label>
    </div>

    <div class="file-field input-field col s8">
      <div class="btn light-green accent-4">
        <span>Nova Imagem</span>
        <input type="file" name="imagem" value="<?php echo $imagem; ?>">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

    <div class="input-field col s12">
      <input id="materiais" type="text" value="<?php echo $materiais; ?>" class="validate" name="materiais"></input>
      <label for="materiais">Materiais Necessários:</label>
    </div>

    <div class="input-field col s6">
      <input id="video" type="text" class="validate" value="<?php echo $video; ?>" name="video">
      <label for="video">Link do Vídeo (Youtube):</label>
    </div>

    <div class="file-field input-field col s8" style="margin-top: 60px;">
      <button class="btn btn-small light-green accent-4" id="btncad" type="submit" name="action"> Enviar <i class="material-icons right">send</i>
      </button>
    </div>

  </form>

</div>
