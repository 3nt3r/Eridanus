<?php
  session_start();

  include "conexao.php";

  if(isset($_POST['nome_cad']) && isset($_POST['sobrenome_cad']) &&  isset($_SESSION['id'])){
    $nome = $_POST['nome_cad'];
    $sobrenome = $_POST['sobrenome_cad'];
    $id = (int) $_SESSION['id'];
    $update = "update usuario set nome = ?, sobrenome = ? where id = ?";
    $prepare = $banco->prepare($update);
    $prepare->bind_param("ssi", $nome, $sobrenome, $id);
    $prepare->execute();
  }else if(isset($_POST['senha']) && isset($_POST['senhaConf']) && isset($_POST['senhaNova']) && isset($_SESSION['id'])){
    $id = (int) $_SESSION['id'];
    $senha = md5($_POST['senha']);
    $senhaNova = md5($_POST['senhaNova']);
    $senhaConf = md5($_POST['senhaConf']);
    $consulta = 'select senha from usuario where id = ?';
    $prepare = $banco->prepare($consulta);
    $prepare->bind_param("i", $id);
    $prepare->bind_result($senhaB);
    $prepare->execute();
    $prepare->store_result();
    $prepare->fetch();
    if($senha == $senhaB){
      if($senhaConf == $senhaNova){
          $update = "update usuario set senha = ? where id = ?";
          $prepare = $banco->prepare($update);
          $prepare->bind_param("si", $senhaNova, $id);
          $prepare->execute();
          echo "certo";
          $_SESSION = array();
          session_destroy();
      }else{
        echo "As senhas não coincidem!";
        $banco->close();
      }
    }else{
      echo "Senha incorreta!";
      $banco->close();
    }
  }else{
      header("Location: login.php");
      $banco->close();
  }
?>
