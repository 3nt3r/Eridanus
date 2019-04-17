<?php

  session_start();

  if(isset($_SESSION['id']) && isset($_POST['verif1']) && isset($_POST['verif2']) && isset($_POST['mensagem'])){
    $id_rec = $_SESSION[$_POST["verif1"]];
    $id_objeto = $_SESSION[$_POST["verif2"]];
    $id_emi = $_SESSION['id'];
    $mensagem = $_POST["mensagem"];
    include "conexao.php";
    $insert = "insert into mensagem(conteudo, id_emi, id_rec, id_objeto) value(?,?,?,?)";
    $prepare = $banco->prepare($insert);
    $prepare->bind_param("siii", $mensagem, $id_emi, $id_rec, $id_objeto);
    $prepare->execute();
    echo "sucesso";
  }else{
    header("Location: trocas.php");
  }
  
?>
