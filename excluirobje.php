<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

  include 'controleDeLog.php';
  
  if(isset($_POST["data"])){

    $id_obje = $_SESSION[$_POST["data"]];

    inserirLog("O usuário excluiu o objeto de id: $id_obje");

    include "conexao.php";

    $excluir = "update objeto set status_atual = ? where id = ?";
    $prepare = $banco->prepare($excluir);
    $status = "excluido";
    $prepare->bind_param("si", $status, $id_obje);
    $prepare->execute();
    $banco->close();

    echo "sucesso";

  }
  
?>
