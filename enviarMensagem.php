<?php

  session_start();

  include 'controleDeLog.php';
  
  if(isset($_SESSION['id']) && $_POST['mensagemObjeto']){

    include "conexao.php";

    $email = $_GET['email'];

    $consultaEmail = "select id from usuario where email = ?";
    $prepare = $banco->prepare($consultaEmail);
    $prepare->bind_param('s', $email);
    $prepare->bind_result($destinatario);
    $prepare->execute();
    $prepare->store_result();
    $prepare->fetch();

    $mensagem = $_POST['mensagemObjeto'];
    $remetente = $_SESSION['id'];
    $objeto = $_GET['idObjeto'];
    
    $insert = "insert into mensagem(mensagem, remetente, destinatario, idObjeto, statusResposta) value(?,?,?,?,?)";
    $prepare = $banco->prepare($insert);
    $statusResposta = "Sem resposta";
    $prepare->bind_param("siiis", $mensagem, $remetente, $destinatario, $objeto, $statusResposta);

    if ($prepare->execute()){
      ?>
        <script type="text/javascript">
          alert("Mensagem enviada com sucesso!");
          history.go(-1);
        </script>
      <?php
      inserirLog("Foi enviada uma mensagem para o usuario: $destinatario do objeto: $objeto.");
    }else{
      ?>
        <script type="text/javascript">
          alert("Mensagem não enviada. Por favor, tente novamente!");
          history.go(-1);
        </script>
      <?php
      inserirLog("O usuário tentou enviar uma mensagem para o usuario: $destinatario do objeto: $objeto.");      
    }

  }else{
    header("Location: trocas.php");
  }

?>
