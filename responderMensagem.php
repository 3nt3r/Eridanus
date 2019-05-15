<?php
  session_start();

  if(isset($_SESSION['email']) && isset($_POST['idMensagem'])){

    $mensagem = $_POST["mensagem"]; 
    $idMensagem = $_POST["idMensagem"];
    
    include "conexao.php";

    $insert = "insert into resposta (mensagem, idMensagem) value(?, ?)";
    $prepare = $banco->prepare($insert);
    $prepare->bind_param("si", $mensagem, $idMensagem);
    $prepare->execute();

    $altera = "UPDATE mensagem SET statusResposta = 'Respondida' WHERE id = $idMensagem";
    $prepare = $banco->prepare($altera);
    $prepare->execute();

    $banco->close();

    echo "sucesso";

    $banco->close();

  }else{
    header("Location: trocas.php");
  }
  
?>
