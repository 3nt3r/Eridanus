<?php
session_start();
if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
  header("Location: login.php");
}
?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>
<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
<div class="row" style="margin-top: 10vw;">
  <form id="enviarp" action="cadastraproj.php" method="post" enctype="multipart/form-data">
    <div class="input-field col s6">
      <input id="titulo" type="text" class="validate" name="titulo">
      <label for="titulo">Titulo:</label>
    </div>
    <div class="input-field col s6">
      <input id="autor" type="text" class="validate" name="autor">
      <label for="autor">Autor:</label>
    </div>
    <div class="input-field col s8">
      <input id="descricao" type="text" class="validate" name="descricao">
      <label for="descricao">Descrição:</label>
    </div>
    <div class="file-field input-field col s8">
      <div class="btn light-green accent-4">
        <span>Imagem</span>
        <input type="file" name="imagem">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <div class="file-field input-field col s8" style="margin-top: 60px;">
    <button class="btn btn-small light-green accent-4" id="btncad" type="submit" name="action">Enviar
 <i class="material-icons right">send</i>
</button>
</div>
  </form>
</div>
