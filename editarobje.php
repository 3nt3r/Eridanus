<script type="text/javascript" src="js/painel-usuario.js"></script>

<?php

  session_start();

  $id_obje = $_SESSION[$_POST["data"]];

  include "conexao.php";

  $consulta = "select nome, descricao, imagem from objeto where id = ?";
  $prepare = $banco->prepare($consulta);
  $prepare->bind_param("i", $id_obje);
  $prepare->bind_result($nome, $descricao, $imagem);
  $prepare->execute();
  $prepare->store_result();
  $prepare->fetch();

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">

<div class="row distancia-topo-usuario">

  <h5 class="titulo-pagina flow-text"> Atualize seu Objeto! </h5>

  <form id="enviarp" action="mudarobje.php" method="post" enctype="multipart/form-data">

    <input type="text" class="esconde" name="data" value="<?php echo $_POST["data"];?>">

    <div class="input-field col s6">
      <input id="nome" type="text" class="validate" name="nome" value="<?php echo $nome; ?>">
      <label for="nome">Nome:</label>
    </div>

    <div class="input-field col s12">
      <textarea id="descricao" class="materialize-textarea validate" name="descricao"> <?php echo $descricao; ?> </textarea>
      <label for="descricao">Descrição do Objeto:</label>
    </div>

    <div class="file-field input-field col s8">
      <div class="btn light-green accent-4">
        <span>Nova Imagem</span>
        <input type="file" name="imagem">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>

    <div class="file-field input-field col s8" style="margin-top: 60px;">
      <button class="btn btn-small light-green accent-4" id="btncad" type="submit" name="action"> Enviar <i class="material-icons right">send</i>
      </button>
    </div>

  </form>

</div>
