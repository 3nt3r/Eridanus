<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

?>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">

<div class="row" style="margin-top: 3.5vw;">

  <h5 class="titulo-pagina flow-text"> Preencha todos os campos para enviar seu objeto! </h5>

  <form id="enviaro" action="cadastrarobjeto.php" method="post" enctype="multipart/form-data">

    <div class="input-field col s6">
      <input id="nome" type="text" class="validate" name="nome" required>
      <label for="nome"><span style="color: red">* </span> Nome:</label>
    </div>

    <div class="input-field col s12">
      <textarea id="descricao" class="materialize-textarea validate" name="descricao" required></textarea>
      <label for="descricao"><span style="color: red">* </span> Descrição do Objeto:</label>
    </div>

    <div class="file-field input-field col s8">
      <div class="btn light-green accent-4">
        <span><span style="color: red">* </span> Imagem</span>
        <input type="file" name="imagem" required>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text" required>
      </div>
      <span style="color: red; font-size: 9pt; margin-top: 10px;">(*) Campos obrigatórios. </span>
    </div>
    <div class="file-field input-field col s8" style="margin-top: 60px;">
      <button class="btn btn-small light-green accent-4" id="btncad" type="submit" name="action"> Enviar <i class="material-icons right">send</i>
      </button>
    </div>

  </form>

</div>
