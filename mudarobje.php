<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

  include 'controleDeLog.php';
  inserirLog("O usuário modificou um objeto.");

  $id_obje = $_SESSION[$_POST["data"]];

  if(isset($_FILES["imagem"]) && isset($_POST["nome"]) && isset($_POST["descricao"])){

    include "conexao.php";

    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $status = 'em avaliacao';
    $arquivo = $_FILES["imagem"];

    if(!empty($arquivo["name"])){
      $nome = $arquivo["name"];
      $tmp = $arquivo["tmp_name"];
      $extensao = explode(".", $nome);
      $ext = end($extensao);
      $novoNome = md5($nome).".$ext";
      move_uploaded_file($tmp, "imagens-projetos/".md5($_SESSION['email'])."/".$novoNome);

      $sql = "update objeto set nome = ?, descricao = ?, status_atual = ?, imagem = ? where id = ?";
      $prepare = $banco->prepare($sql);
      $prepare->bind_param("ssssi", $nome, $descricao, $status, $novoNome, $id_obje);

    }else{
      $sql = "update objeto set nome = ?, descricao = ?, status_atual = ? where id = ?";
      $prepare = $banco->prepare($sql);
      $prepare->bind_param("sssi", $nome, $descricao, $status, $id_obje);

    }
    $prepare->execute();
    $banco->close();
    echo "<script>alert('Objeto Atualizado com Sucesso!'); window.location.href = 'acesse-conta.php';</script>";
  }else{
    $banco->close();
    header("Location: acesse-conta.php");
  }

?>
