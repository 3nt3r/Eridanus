<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

  include 'controleDeLog.php';
  inserirLog("O usuário excluiu um projeto.");

  if(isset($_POST["data"])){
    $id_proj = $_SESSION[$_POST["data"]];

    include "conexao.php";

    $excluir = "update projeto set status_atual = ? where codigo = ?";
    $status = "excluido";
    $prepare = $banco->prepare($excluir);
    $prepare->bind_param("si", $status, $id_proj);
    $prepare->execute();
    $banco->close();

    echo "sucesso";
    
  }
  
?>
