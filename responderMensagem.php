<?php
  session_start();
  if(isset($_SESSION['id']) && isset($_POST['remetente']) && isset($_POST['destinatario']) && isset($_POST['mensagem'])){
    $remetente = $_SESSION[$_POST["remetenteMensagem"]];
    $destinatario = $_SESSION[$_POST["destinatarioMensagem"]];
    $objeto = $_SESSION[$_POST["objetoMensagem"]];
    $mensagem = $_POST["mensagem"]; 

    include "conexao.php";

    $insert = "insert into mensagem (conteudo, id_emi, id_rec, id_objeto) value(?, ?, ?, ?)";
    $prepare = $banco->prepare($insert);
    $prepare->bind_param("siii", $mensagem, $remetente, $destinatario, $objeto);
    $prepare->execute();
    echo "sucesso";
  }else{
    header("Location: trocas.php");
  }
?>
