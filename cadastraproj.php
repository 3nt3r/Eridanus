<?php
  session_start();
  if(!isset($_SESSION['email']) && !isset($_SESSION['senha'])){
    header("Location: login.php");
  }
  include "conexao.php";
  $id = (int) $_SESSION['id'];
  $titulo = $_POST["titulo"];
  $autor = $_POST["autor"];
  $descricao = $_POST["descricao"];
  $status = 'Em avaliação';
  $arquivo = $_FILES["imagem"];
  $nome = $arquivo["name"];
  $tmp = $arquivo["tmp_name"];
  $extensao = explode(".", $nome);
  $ext = end($extensao);
  $novoNome = md5($nome).".$ext";
  move_uploaded_file($tmp, "imagens-projetos/".$novoNome);
  $data_atual = date("Y-m-d");
  $sql = "insert into projeto(titulo, autor, descricao, data_publicacao, status_atual, id_usuario, imagem) value(?, ?, ?, ?, ?, ?,?)";
  $prepare = $banco->prepare($sql);
  $prepare->bind_param("sssssis", $titulo, $autor, $descricao, $data_atual, $status,$id, $novoNome);
  $prepare->execute();
  echo "<script>alert('Projeto cadastrado com sucesso!'); window.location.href = 'acesse-conta.php';</script>"
?>
