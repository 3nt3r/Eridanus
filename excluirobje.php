<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

  if(isset($_POST["data"])){

    $id_obje = $_SESSION[$_POST["data"]];

    include "conexao.php";

    $excluir = "delete from objeto where id = ?";
    $prepare = $banco->prepare($excluir);
    $prepare->bind_param("i", $id_obje);
    $prepare->execute();
    $banco->close();

    echo "sucesso";

  }
?>
