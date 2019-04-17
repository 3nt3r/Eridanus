<?php

  session_start();

  if(isset($_SESSION['email']) && isset($_POST['remetente']) && isset($_POST['destinatario']) && isset($_POST['mensagem'])){
    $remetente = $_POST["remetente"];
    $destinatario = $_POST["destinatario"];
    $objeto = $_POST["objeto"];
    $mensagem = $_POST["mensagem"]; 

    include "conexao.php";

    $insert = "insert into mensagem (conteudo, id_emi, id_rec, id_objeto) value(?, ?, ?, ?)";
    $prepare = $banco->prepare($insert);
    $prepare->bind_param("siii", $mensagem, $remetente, $destinatario, $objeto);
    $prepare->execute();
    $banco->close();
    echo "sucesso";
  }else{
    header("Location: trocas.php");
  }
  
?>
