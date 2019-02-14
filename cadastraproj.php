<?php

  session_start();

  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }

  include "conexao.php";


  $id = (int) $_SESSION['id'];
  $titulo = $_POST["titulo"];
  $autor = $_SESSION['nome'];
  $descricao = $_POST["descricao"];
  $status = 'em avaliacao';
  $arquivo = $_FILES["imagem"];
  $nome = $arquivo["name"];
  $tmp = $arquivo["tmp_name"];
  $materiais = $_POST['materiais'];
  $data_atual = date("Y-m-d");
  $video = $_POST['video'];

  $extensao = explode(".", $nome);
  $ext = end($extensao);
  $novoNome = rand(12233, 999999).".$ext";
  move_uploaded_file($tmp, "imagens-projetos/".$_SESSION['nome']."/".$novoNome);

  $sql = "insert into projeto(titulo, autor, descricao, data_publicacao, status_atual, id_usuario, imagem, materiais, video) value(?, ?, ?, ?, ?, ?,?,?,?)";
  $prepare = $banco->prepare($sql);
  $prepare->bind_param("sssssisss", $titulo, $autor, $descricao, $data_atual, $status, $id, $novoNome, $materiais, $video);
  $prepare->execute();
  $banco->close();
  echo "<script>alert('Projeto cadastrado com sucesso!'); window.location.href = 'acesse-conta.php';</script>"

?>
