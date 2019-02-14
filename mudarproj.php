<?php

  session_start();
  $id_proj = $_SESSION[$_POST["data"]];
  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }
  if(isset($_FILES["imagem"]) && isset($_POST["titulo"]) && isset($_POST["descricao"]) && isset($_POST["materiais"]) && isset($_POST["video"])){
    include "conexao.php";
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $status = 'em avaliacao';
    $arquivo = $_FILES["imagem"];
    $materiais = $_POST['materiais'];
    $video = $_POST['video'];
    if(!empty($arquivo["name"])){
      $nome = $arquivo["name"];
      $tmp = $arquivo["tmp_name"];
      $extensao = explode(".", $nome);
      $ext = end($extensao);
      $novoNome = md5($nome).".$ext";
      move_uploaded_file($tmp, "imagens-projetos/".$_SESSION['nome']."/".$novoNome);
      $sql = "update projeto set titulo = ?, descricao = ?, status_atual = ?, materiais = ?, video = ?, imagem = ? where codigo = ?";
      $prepare = $banco->prepare($sql);
      $prepare->bind_param("ssssssi", $titulo, $descricao, $status, $materiais, $video, $novoNome,$id_proj);
    }else{
      $sql = "update projeto set titulo = ?, descricao = ?, status_atual = ?, materiais = ?, video = ? where codigo = ?";
      $prepare = $banco->prepare($sql);
      $prepare->bind_param("sssssi", $titulo, $descricao, $status, $materiais, $video, $id_proj);
    }
    $prepare->execute();
    $banco->close();
    echo "<script>alert('Projeto atualizado com sucesso!'); window.location.href = 'acesse-conta.php';</script>";
  }else{
    $banco->close();
    header("Location: acesse-conta.php");
  }
?>
