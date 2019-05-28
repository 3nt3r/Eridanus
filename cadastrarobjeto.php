<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

  include 'controleDeLog.php';
  
  include "conexao.php";

  $id = (int) $_SESSION['id'];
  $nomeObj = $_POST["nome"];
  $descricao = $_POST["descricao"];
  $status = 'em avaliacao';
  $arquivo = $_FILES["imagem"];
  $nome = $arquivo["name"];
  $tmp = $arquivo["tmp_name"];
  $data_atual = date("Y-m-d");

  $extensao = explode(".", $nome);
  $ext = end($extensao);
  $novoNome = rand(12233, 999999).".$ext";
  move_uploaded_file($tmp, "imagens-objetos/".md5($_SESSION['email'])."/".$novoNome);

  $sql = "insert into objeto(nome, descricao, data_publicacao, status_atual, id_usuario, imagem) value(?, ?, ?, ?, ?, ?)";
  $prepare = $banco->prepare($sql);
  $prepare->bind_param("ssssis", $nomeObj, $descricao, $data_atual, $status, $id, $novoNome);

  if ($prepare->execute()){
    echo "
      <script>
        alert('Recebemos o seu objeto, agora vamos realizar a análise do mesmo!'); 
        window.location.href = 'acesse-conta.php';
      </script>
    ";
    inserirLog("O usuário realizou o envio de um objeto.");
  }else{
    echo "
      <script>
        alert('Erro ao cadastrar o objeto! Tente novamente mais tarde!'); 
        window.location.href = 'acesse-conta.php';
      </script>
    ";
    inserirLog("O usuário tentou realizar o envio de um objeto.");
  }

  $banco->close();

?>
