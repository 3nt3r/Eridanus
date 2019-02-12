<?php

  session_start();
  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }
  if(isset($_POST["data"])){
    $id_proj = $_SESSION[$_POST["data"]];
    include "conexao.php";
    $excluir = "delete from projeto where codigo = ?";
    $prepare = $banco->prepare($excluir);
    $prepare->bind_param("i", $id_proj);
    $prepare->execute();
    echo "sucesso";
  }
?>
